<?php
include('connect.php');

$id = $_GET['gass_id'];
	$delete = $con->prepare("DELETE FROM tbl_gass_rank WHERE gass_id = '$id'");
	$delete->execute();
	header('location:gass_rank_table.php');
?>