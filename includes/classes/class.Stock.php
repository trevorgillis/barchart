<?php

/**
 * Created by PhpStorm.
 * User: tgillis
 * Date: 6/27/2017
 *
 */
class Stock {
	public $symbol;
	public $name;
	public $last;
	public $change;
	public $pctchange;
	public $volume;
	public $tradetime;

	public function __construct($symbol) {
		global $link;

		$sql = "SELECT * FROM quotes WHERE `symbol` = '{$symbol}' LIMIT 1";
		$result = mysqli_query($link, $sql);
		if ($result && mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) {
				$this->symbol = $row['symbol'];
				$this->name = $row['name'];
				$this->last = $row['last'];
				$this->change = $row['change'];
				$this->pctchange = $row['pctchange'];
				$this->volume = $row['volume'];
				$this->tradetime = $row['tradetime'];
			}
		}
	}
}