<?php 
error_reporting( E_ALL &amp; ~E_DEPRECATED &amp; ~E_NOTICE );
ob_start();
session_start();
 
define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'skugenerator');
 
define('PROJECT_NAME', 'SKU Generator');
/*$dboptions = array(
              PDO::ATTR_PERSISTENT =&gt; FALSE, 
              PDO::ATTR_DEFAULT_FETCH_MODE =&gt; PDO::FETCH_ASSOC, 
              PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_EXCEPTION,
              PDO::MYSQL_ATTR_INIT_COMMAND =&gt; 'SET NAMES utf8',
            );*/
 
try {
  $DB = new PDO(DB_DRIVER.':host='.DB_SERVER.';dbname='.DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD , $dboptions);  
} catch (Exception $ex) {
  echo $ex-&gt;getMessage();
  die;
}
 
//require_once 'functions.php';
 
//get error/success messages
if ($_SESSION["errorType"] != "" &amp;&amp; $_SESSION["errorMsg"] != "" ) {
    $ERROR_TYPE = $_SESSION["errorType"];
    $ERROR_MSG = $_SESSION["errorMsg"];
    $_SESSION["errorType"] = "";
    $_SESSION["errorMsg"] = "";
}
?>