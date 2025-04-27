<?php
require 'config.php';
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("DB Connection Failed: " . $conn->connect_error);
echo "Success! DB Connected!";
?>