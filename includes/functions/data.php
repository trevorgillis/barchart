<?php
/**
 * Created by PhpStorm.
 * User: tgillis
 * Date: 6/27/2017
 *
 */

require_once dirname(__FILE__) . "/../config.php";

/**
 * @param $symbol
 * @return bool
 *
 * Determines whether or not that passed in symbol is a stock that is currently being watched
 */
function stock_is_being_watched($symbol) {
	global $link;

	$sql = "SELECT `id` FROM selected_quotes WHERE `symbol` = '{$symbol}'";
	$result = mysqli_query($link, $sql);
	if ($result && mysqli_num_rows($result) > 0) {
		return true;
	} else {
		return false;
	}
}

function build_ticker_table_with_data($data) {
	$html = '';
	if (is_array($data) && count($data) > 0) {
		$html .= '<table class="table table-striped" id="tickerTable">
                    <tr>
                      <th><a href="javascript:void(0);" onclick="refreshTickerTable(\'symbol\')">Symbol</a></th>
                      <th><a href="javascript:void(0);" onclick="refreshTickerTable(\'name\')">Symbol Name</a></th>
                      <th><a href="javascript:void(0);" onclick="refreshTickerTable(\'last\')">Last Price</a></th>
                      <th><a href="javascript:void(0);" onclick="refreshTickerTable(\'change\')">Change</a></th>
                      <th><a href="javascript:void(0);" onclick="refreshTickerTable(\'pctchange\')">% Change</a></th>
                      <th><a href="javascript:void(0);" onclick="refreshTickerTable(\'volume\')">Volume</a></th>
                      <th><a href="javascript:void(0);" onclick="refreshTickerTable(\'tradetime\')">Time</a></th>
                      <th></th>
                    </tr>';
		foreach ($data as $stock) {
			if (gettype($stock) == 'object') {
				$html .= "<tr>
						  <td>{$stock->symbol}</td>
						  <td>{$stock->name}</td>
						  <td>".number_format($stock->last, 2, '.', ',')."</td>
						  <td>".number_format($stock->change, 2, '.', ',')."</td>
						  <td>{$stock->pctchange}%</td>
						  <td>".number_format($stock->volume, 0, '.', ',')."</td>
						  <td>".date('n/j/y G:i', strtotime($stock->tradetime))."</td>
						  <td><a href='javascript:void(0);' onclick='removeFromWatchlist(\"{$stock->symbol}\");' class='btn btn-danger btn-xs'>X</a></td>
						</tr>";
			} else {
				$html .= '<tr><td>Unexpected type encountered: '.gettype($stock).'</td></tr>';
			}
		}
		$html .= '</table>';
	} else {
		$html .= '<table class="table table-striped" id="tickerTable">
                    <tr>
                        <th>There are no symbols in your watchlist, please add one</th>
                    </tr>
                </table>';
	}
	return $html;
}