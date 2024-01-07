<?php
$servername = 'localhost';
$port = '3307';
$username = 'root';
$password = '';
$dbname = 'quanlybaoduongxe';
$conn = new mysqli($servername, $username, $password, $dbname, 3307);
if ($conn->connect_error) {
    die("Connect failed: " . $conn->connect_error);
}
