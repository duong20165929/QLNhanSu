<?php
include('connect.php');

$id = $_GET['per_id'];
	$delete = $con->prepare("DELETE FROM tbl_personnel WHERE per_id = '$id'");
	$delete->execute();
	header('location:all_personnel.php');
?>