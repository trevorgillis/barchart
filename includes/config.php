<?php
/**
 * Created by PhpStorm.
 * User: tgillis
 * Date: 6/27/2017
 *
 */

error_reporting(E_ERROR);

// Database Connection
define('DATABASE_HOST', 'localhost');
define('DATABASE_USERNAME', '_uname_');
define('DATABASE_PASSWORD', '_password_');
define('DATABASE_DB', 'barchart');

$link = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_DB);

if (!$link) {
	echo "Error: Unable to connect to MySQL.<br>";
	echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
	echo "Debugging error: " . mysqli_connect_error() . "<br>";
	exit;
}

// General-purpose functions
include_once 'functions/data.php';

// Autoloader
spl_autoload_register(function ($class) {
	include dirname(__FILE__) . "/classes/class.{$class}.php";
});