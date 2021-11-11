<?php 
session_start();
if (isset($_SESSION['user_login'])) {
	$id_buku = base64_decode($_GET['id_buku']);
	$gambar = base64_decode($_GET['gambar']);
	if(mysqli_query($db_con,"DELETE FROM `buku` WHERE `id_buku` = '$id_buku'")){
		unlink('admin/images/'.$gambar);
		header('Location: index.php?page=all-book&delete=success');
	}else{
		header('Location: index.php?page=all-book&delete=error');
	}
}else{
	header('Location: login.php');
 }
