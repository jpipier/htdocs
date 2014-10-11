<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php 
$page = $_GET["page"].".php";
		include($page); ?>
<?php include('footer.php'); ?>

echo 'test';
