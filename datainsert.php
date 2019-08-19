<?php
# datainsert.php
require_once 'dbconfig.php';
try {
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password,
array(
\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $conn->prepare("
?>