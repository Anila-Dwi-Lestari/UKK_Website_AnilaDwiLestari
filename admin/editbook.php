<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id_buku = base64_decode($_GET['id_buku']);
	$oldgambar = base64_decode($_GET['gambar']);
	if (isset($_POST['userbuku'])) {
  	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
  	$penerbit = $_POST['penerbit'];
	  
	$gambar = explode('.', $_FILES['gambar']['name']);
  	$gambar = end($gambar); 
  	$gambar = $pengarang.date('Y-m-d-m-s').'.'.$gambar;

	$query = "UPDATE `buku` SET `judul`='$judul', `pengarang`='$pengarang', `penerbit`='$penerbit', `gambar`='$gambar' WHERE `id_buku`= $id_buku";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Buku Updated!</p>';
		  move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/'.$gambar);
  		header('Location: index.php?page=all-book&edit=success');
  	}else{
  		header('Location: index.php?page=all-book&edit=error');
  	}
	}
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>Edit Book Informations!<small class="text-warning"> Edit Book!</small></h1>
<nav aria-label="breadcrumb">
   <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard</a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-book">All Book</a></li>
     <li class="breadcrumb-item active" aria-current="page">Edit Book</li>
  </ol>
</nav>

	<?php
		if (isset($id_buku)) {
			$query = "SELECT `id_buku`, `judul`, `pengarang`, `penerbit`, `gambar` FROM `buku` WHERE `id_buku`=$id_buku";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="judul">Judul</label>
		    <input name="judul" type="text" class="form-control" id="judul" value="<?php echo $row['judul']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pengarang">Pengarang</label>
		    <input name="pengarang" type="text" class="form-control" id="pengarang" value="<?php echo $row['pengarang']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="penerbit">Penerbit</label>
		    <input name="penerbit" type="text" class="form-control" id="penerbit" value="<?php echo $row['penerbit']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="gambar">Gambar</label>
		    <input name="gambar" type="file" class="form-control" id="gambar">
	  	</div>
	  	
	  	<div class="form-group text-center">
		    <input name="userbuku" value="Update Buku" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>