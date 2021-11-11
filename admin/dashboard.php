<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<h1><a href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item active"></i>Dashboard</li>
  </ol>
</nav>

<div class="row book">
  <div class="col-sm-4">
     <div class="card text-white bg-primary mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $stu=mysqli_query($db_con,'SELECT * FROM `buku`'); $stu= mysqli_num_rows($stu); echo $stu; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Total Book</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <div class="row">
          <div class="col-sm-8">
            <p class="">All Book</p>
          </div>
          <div class="col-sm-4">
            <a href="all-book.php"><i class="fa fa-arrow-right float-sm-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class="card text-white bg-info mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $tusers=mysqli_query($db_con,'SELECT * FROM `users`'); $tusers= mysqli_num_rows($tusers); echo $tusers; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Total Users</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="index.php?page=all-users">
        <div class="row">
          <div class="col-sm-8">
            <p class="">All Users</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
     <div class="card text-white bg-warning mb-3">
      <div class="card-header">
        <div class="row">
          <?php $usernameshow = $_SESSION['user_login']; $userspro = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$usernameshow';"); $userrow=mysqli_fetch_array($userspro); ?>
          <div class="col-sm-6">
            <img class="showimg" src="images/<?php echo $userrow['photo']; ?>">
            <div style="font-size: 20px"><?php echo ucwords($userrow['name']); ?></div>
          </div>
          <div class="col-sm-6">
            
            <div class="clearfix"></div>
            <div class="float-sm-right">Welcome!</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <a href="index.php?page=user-profile">
        <div class="row">
          <div class="col-sm-8">
            <p class="">Your Profile</p>
          </div>
          <div class="col-sm-4">
            <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>  
</div>
<hr>
<h3>New Book</h3>
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Judul</th>
      <th scope="col">Pengarang</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Gambar</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query=mysqli_query($db_con,'SELECT * FROM `buku` ORDER BY `buku`.`created_at` DESC;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo '<td>'.$i.'</td>
          <td>'.ucwords($result['judul']).'</td>
          <td>'.$result['pengarang'].'</td>
          <td>'.ucwords($result['penerbit']).'</td>
          <td><img src="images/'.$result['gambar'].'" height="220px"></td>';?>
      </tr>  
     <?php $i++;} ?>
  </tbody>
</table>