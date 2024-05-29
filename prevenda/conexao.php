<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
include_once __DIR__."/../config.php";

include_once(ROOT.'/prevenda/database/mysql.php');
include_once(ROOT.'/prevenda/database/api.php');

include_once(ROOT.'/prevenda/database/functions.php');
include_once(ROOT.'/prevenda/database/progress.php');

?>
