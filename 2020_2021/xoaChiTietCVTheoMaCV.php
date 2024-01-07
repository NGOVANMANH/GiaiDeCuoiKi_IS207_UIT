<?php
$maCV = $_POST['maCV'];
include './connect.php';
$conn->query("DELETE FROM CT_BD WHERE MACV='$maCV'");
$conn->close();
