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

    .card-title,
    .card-text {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 100%; /* Adjust this value based on your design */
    }

    .max-width-input {
      max-width: 50px;
    }

    /* Tambahkan properti margin-top pada elemen notifikasi */
    #customNotification {
      margin-top: 10px; /* Sesuaikan dengan besar margin yang diinginkan */
    }
  </style>
</head>
<body class="container d-flex flex-column h-100">

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
      <div class="container">
        <?php
        session_start();
        if(!isset($_SESSION['status'])) {
          ?>
          <a class="navbar-brand" href="#">Pemrograman Web</a>
          <div class="row justify-content-between">
            <div class="col-10"></div>
            <div class="col-2 d-flex justify-content-end align-items-end">
              <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#loginModal">Login</button>
              &nbsp;
              <button class="btn btn-dark" data-toggle="modal" data-target="#registerModal">Register</button>
            </div>
          </div>
          <?php  
        } else if ($_SESSION['status'] == "login") {
          $user = $_SESSION['username'];
          ?>
          <a class="navbar-brand" href="#">Pemrograman Web: <?php echo $_SESSION['username'] ?></a>
          <div class="row justify-content-between">
            <div class="col-10"></div>
            <div class="col-2 d-flex justify-content-end align-items-end">
              <a href="pesanan.php"><button class="btn btn-dark" type="button">Pesanan</button></a>
              &nbsp;
              <a href="logout.php"><button class="btn btn-dark" type="button">Logout</button></a>
            </div>
          </div>
        <?php } else if ($_SESSION['status'] == "logout") {
          $user = "nama_nim";
          ?>
          <a class="navbar-brand" href="#">Pemrograman Web</a>
          <div class="row justify-content-between">
            <div class="col-10"></div>
            <div class="col-2 d-flex justify-content-end align-items-end">
              <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#loginModal">Login</button>
              &nbsp;
              <button class="btn btn-dark" data-toggle="modal" data-target="#registerModal">Register</button>
            </div>
          </div>
        <?php } ?>
      </div>
    </nav>
  </header>

  <div class="container flex-grow-1" id="content">
    <?php
    if (isset($_GET['notification'])) {
      $notification = urldecode($_GET['notification']);
      echo '<div id="customNotification" class="alert alert-dark">' . $notification . '</div>';
    }
    ?>

    <div class="row row-cols-1 row-cols-md-4 g-3 p-3">
      <?php
      include "sql.php";
      $que    = "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori order by id_produk";
      $select = mysqli_query($con, $que);

      while ($data = mysqli_fetch_array($select)) {
        ?>
        <form action="pesanan-add.php" method="post">
          <div class="col">
            <div class="card h-100">
              <img src="images/<?php echo $data['gambar']; ?>" class="card-img-top" alt="..." width="300" height="200">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data['nama_produk']; ?></h5>
                <p class="card-text"><?php echo $data['nama_kategori']; ?> | Stok: <?php echo $data['stok']; ?></p>
                <hr>
                <form>
                  <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">
                  <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                  <input type="hidden" name="stok" value="<?php echo $data['stok']; ?>">
                  <div class="form-group d-flex">
                    <input class="form-control form-control-sm max-width-input" type="number" name="jumlah">&nbsp;
                    <?php if(isset($_SESSION['status'])) { ?>
                      <?php if ($_SESSION['status'] == "login") { ?>
                        <input class="btn btn-dark btn-sm ml-2" type="submit" name="submit" value="beli">
                      <?php } ?>                      
                    <?php } else if(!isset($_SESSION['status'])) { ?>
                      <a href="index.php" class="btn btn-dark btn-sm ml-2">beli</a>
                    <?php } ?>  
                  </div>
                </form>
              </div>
            </div>
          </div>
        </form>
      <?php } ?>
    </div>
  </div>

  <footer class="bg-dark text-white p-3" >
   <a>&copy; 2023</a>
 </footer>

 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
      </div>
      <div class="modal-body">
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <br>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <br>
          <button type="submit" class="btn btn-dark">login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register</h5>
      </div>
      <div class="modal-body">
        <form action="register.php" method="post">
          <div class="form-group">
            <label for="username1">Username:</label>
            <input type="text" class="form-control" id="username1" name="username1" required>
          </div>
          <br>
          <div class="form-group">
            <label for="password1">Password:</label>
            <input type="password" class="form-control" id="password1" name="password1" required>
          </div>
          <br>
          <div class="form-group">
            <label for="role1">Role:</label>
            <select class="form-control" id="role1" name="role1" required>
              <option value="Admin">Admin</option>
              <option value="Customer">Customer</option>
            </select>
          </div>
          <br>
          <div class="form-group">
            <label for="password1">Role Password:</label>
            <input type="password" class="form-control" id="r_password1" name="r_password1" required>
          </div>
          <br>
          <button type="submit" class="btn btn-dark">register</button>             
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
      // Hilangkan notifikasi setelah beberapa detik
      setTimeout(function(){
        document.getElementById('customNotification').style.display = 'none';
      }, 5000); // Ubah nilai 5000 menjadi durasi yang diinginkan dalam milidetik
    </script>

  </body>
  </html>
