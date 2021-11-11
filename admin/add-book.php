<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
		header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addbook'])) {
  	$judul = $_POST['judul'];
  	$pengarang = $_POST['pengarang'];
  	$penerbit = $_POST['penerbit'];
  	
  	$gambar = explode('.', $_FILES['gambar']['name']);
  	$gambar = end($gambar); 
  	$gambar = $pengarang.date('Y-m-d-m-s').'.'.$gambar;

  	$query = "INSERT INTO `buku`(`judul`, `pengarang`, `penerbit`, `gambar`) VALUES ('$judul', '$pengarang', '$penerbit', '$gambar');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Book Inserted!</p>';
  		move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/'.$gambar);
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Book Not Inserted, please input right informations!</p>';
  	}
  }
?>
<h1 class="text-danger"><i class="fas fa-user-plus"></i>Add Book<small class="text-warning"> Add New Book!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard</a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Book</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Book Insert Alert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="judul">Judul buku</label>
		    <input name="judul" type="text" class="form-control" id="judul" value="<?= isset($judul)? $judul: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pengarang">Pengarang</label>
		    <input name="pengarang" type="text" value="<?= isset($pengarang)? $pengarang: '' ; ?>" class="form-control" id="pengarang" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="penerbit">Penerbit</label>
		    <input name="penerbit" type="text" value="<?= isset($penerbit)? $penerbit: '' ; ?>" class="form-control" id="penerbit" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="gambar">Gambar</label>
		    <input name="gambar" type="file" class="form-control" id="gambar" required="">
	  	</div>
		<br><br>
	  	<div class="form-group text-right">
		    <input name="addbook" value="Add Book" type="submit" class="btn btn-white">
	  	</div>
	 </form>
</div>
</div>