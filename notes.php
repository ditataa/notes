<?php 
require_once('database.php');
$data=tampildata('notes');
$nomor=0;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php 
    session_start();
    if($_SESSION['status']!="Login"){
      header("Location:Login.php?msg=belum_Login");
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="login.php">NOTES</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="notes.php">Notes</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">API</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
          </form>
        </div>
      </nav>

<div class="container">
    <center><h1>Daftar Catatan</h1></center>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID </th>
      <th scope="col">Created at</th>
      <th scope="col">Note</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data as $item): ?>
  <?php $nomor++; ?>
  <tr>
    <td><?php echo $nomor ?></td>
    <td><?php echo $item['Id']; ?></td>
    <td><?php echo $item['created_at']; ?></td>
    <td><?php echo $item['notes']; ?></td>
    <td><?php echo "<a href='edit.php?id=$item[Id]'>EDIT</a> | <a href='javascript:hapusData(".$item['Id'].")'>Delete</a>"; ?></td>
  </tr>
  <?php endforeach ?>
  </tbody>
</table>
  </div>
  <script language="JavaScript" type="text/JavaScript">
    function hapusData(id){
      if (confirm("Apakah anda yakin akan menghapus data ini?")){
        window.location.href = 'delete.php?id=' + id;
      }
    }
  </script>
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
