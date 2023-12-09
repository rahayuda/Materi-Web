<?php 
session_start();
$id_user = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pemrograman Web</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    html, body {
      height: 100%;
    }

    .card {
      border-radius: 0;
      border: 1px solid #343a40; /* Set the border color to dark */
    }

    .card img {
      border-radius: 0; /* Remove border radius from images */
    }

    .card-title {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 100%; /* Adjust this value based on your design */
    }

    .card-text {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 100%; /* Adjust this value based on your design */
    }

    .max-width-input {
      max-width: 50px;
    }
  </style>

</head>
<body class="container d-flex flex-column h-100">

  <?php

  if($_SESSION['status']=="login"){
  $user = $_SESSION['username'];
  ?>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
      <div class="container">
       <a class="navbar-brand" href="#">Pemrograman Web: <?php echo $_SESSION['username'] ?></a>
       <div class="row justify-content-between">
        <div class="col-10"></div>
        <div class="col-2 d-flex justify-content-end align-items-end">
         <a href="index.php" class="btn btn-dark">Home</a>
         &nbsp;              
         <a href="logout.php"><button class="btn btn-dark" type="button">Logout</button></a>
       </div>
     </div>
   </nav>
 </header>
 <?php } ?>

 <div class="container flex-grow-1" id="content">
  <br>
  <div class="row justify-content-between">
   <div class="col-10"><b>Pesanan </b></div>
   <div class="col-2 d-flex justify-content-end align-items-end">

   </div>
 </div>

 <hr>

 <table class="table table-sm border border-dark">
   <thead class="thead-dark">
    <tr>
     <th scope="col" width="5%">No</th>
     <th scope="col">Customer</th>
     <th scope="col">Produk</th>
     <th scope="col">Kategori</th>
     <th scope="col">Harga</th>
     <th scope="col">Jumlah</th>
     <th scope="col">Total</th>
     <th scope="col">Tanggal</th>
   </tr>
 </thead>
 <tbody>
  <?php

  include "sql.php";
  $que    = "SELECT * FROM detailpesanan 
  JOIN pesanan ON pesanan.id_pesanan = detailpesanan.id_pesanan
  JOIN user ON user.id_user = pesanan.id_user 
  JOIN produk ON produk.id_produk = detailpesanan.id_produk 
  JOIN kategori ON kategori.id_kategori = produk.id_kategori
  where pesanan.id_user = $id_user";
  
  $select = mysqli_query($con,$que);
  $dana   = 0;
  $nomor  = 0;

  while($data= mysqli_fetch_array($select)){
  $nomor  = $nomor + 1;  
  ?>

  <tr>
    <th scope="row"><?php echo $nomor; ?></th>
    <td><?php echo $data['username']; ?></td>
    <td><?php echo $data['nama_produk']; ?></td>
    <td><?php echo $data['nama_kategori']; ?></td>
    <td>
     <?php
     $uang = $data['harga'];
     $uang_format = number_format($uang, 0, ',', '.');
     echo "Rp. " . $uang_format;
     ?>         
   </td>
   <td><?php echo $data['jumlah']; ?></td>
   <td>
     <?php 
     $total = $data['jumlah'] * $data['harga']; 
     $total_format = number_format($total, 0, ',', '.');
     echo "Rp. " . $total_format;
     $dana = $dana + $total;
     ?>
   </td>
   <td><?php echo $data['tanggal_pesanan']; ?></td>
 </tr>
 <?php } ?>
</tbody>
</table>

<?php 
$dana_format = number_format($dana, 0, ',', '.');
?>

<hr>
<table class="table table-sm border border-dark">
 <tbody class="thead-dark">
  <tr>
   <td scope="col" width="5%">&nbsp;</td>
   <td scope="col"><?php echo "<b>Total Semua Pesanan</b> Rp. " . $dana_format; ?></td>
 </tr>
</tbody>
</table>
</div>

<footer class="bg-dark text-white p-3" >
 <a>&copy; 2023</a>
</footer>

</body>
</html>
