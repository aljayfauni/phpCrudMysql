
<?php
$host = "localhost:3307";
$username = "root";
$password = "";
$database = "php_crud";

$db = new mysqli($host,$username, $password, $database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
