<?php
/**
 * Created by PhpStorm.
 * User: tgillis
 * Date: 6/27/2017
 *
 */

require_once "includes/config.php";

?>
<!DOCTYPE html>
<html>
<head>
<?php include 'includes/head.php'; ?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Barchart Code Challenge</h1>
            <div>
                <input type="text" name="symbol" id="symbol" placeholder="Enter a symbol..." onkeyup="">
                <a class="btn btn-primary addSymbol" href="javascript:void(0);" onclick="addSymbol();">Add Symbol</a>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped" id="tickerTable">
                    <tr>
                        <th>There are no symbols in your watchlist, please add one</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
