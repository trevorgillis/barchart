<?php
/**
 * Created by PhpStorm.
 * User: tgillis
 * Date: 6/27/2017
 *
 */

require_once dirname(__FILE__) . "/../config.php";

// Add a stock to watchlist
if (isset($_POST['symbol'])) {
	$response = array(
		'success' => false,
		'message' => ''
	);

	$clean_symbol = mysqli_real_escape_string($link, trim(strtoupper($_POST['symbol'])));
	$sql = "SELECT `symbol` FROM quotes WHERE `symbol` = '{$clean_symbol}' LIMIT 1";
	$result = mysqli_query($link, $sql);
	if ($result && mysqli_num_rows($result) > 0) {
		$symbol = '';
		while ($row = mysqli_fetch_array($result)) {
			$symbol = $row['symbol'];
		}
		if (stock_is_being_watched($symbol)) {
			$response['message'] = 'This symbol has already been added to the watchlist';
		} else {
			$sql = "INSERT IGNORE INTO selected_quotes (`symbol`) VALUES ('{$symbol}')";
			if (mysqli_query($link, $sql)) {
				$response['success'] = true;
			}
		}

	} else {
		$response['message'] = "The given symbol does not exist.";
	}
	echo json_encode($response);
	exit;
}

// Search for a stock
if (isset($_POST['searchTerm'])) {
	$response = array();

	$clean_search_term = mysqli_real_escape_string($link, trim(strtoupper($_POST['searchTerm'])));
	$sql = "SELECT * FROM quotes WHERE `symbol` LIKE '%{$clean_search_term}%' OR `name` LIKE '%{$clean_search_term}%'";
	$result = mysqli_query($link, $sql);
	if ($result && mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$response[] = array(
				'id' => $row['symbol'],
				'label' => "{$row['symbol']} ({$row['name']})",
				'value' => $row['symbol']
			);
		}
	} else {
		$response[] = array(
			'id' => 0,
			'label' => 'No Results Found',
			'value' => ' '
		);
	}

	echo json_encode($response);
	exit;
}

// Refresh the ticker table
if (isset($_POST['refreshTable'])) {
	$response = array(
		'html' => ''
	);
	$data = array();

	$sql = "SELECT q.`symbol` FROM quotes AS q INNER JOIN selected_quotes AS sq ON q.`symbol` = sq.`symbol`";
	if (!empty($_POST['sortBy'])) {
		$sql .= " ORDER BY q.`" . mysqli_real_escape_string($link, $_POST['sortBy'] . "`");
		if (!empty($_POST['sortOrdering'])) {
			$sql .= " " . mysqli_real_escape_string($link, $_POST['sortOrdering']);
		}
	}
	$result = mysqli_query($link, $sql);
	if ($result && mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$data[] = new Stock($row['symbol']);
		}
	}
	$response['html'] = build_ticker_table_with_data($data);

	echo json_encode($response);
	exit;
}

// Delete stock from watchlist
if (isset($_POST['removeStock'])) {
	$response = array(
		'success' => false
	);

	$clean_symbol = mysqli_real_escape_string($link, trim(strtoupper($_POST['stockSymbol'])));
	$sql = "DELETE FROM selected_quotes WHERE symbol = '{$clean_symbol}'";
	if (mysqli_query($link, $sql)) {
		$response['success'] = true;
	}

	echo json_encode($response);
	exit;
}