<?php 
include 'server.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <style>
    body {
      background-image: url('wallpaper1.jpg');
    }
    li {
        text-decoration: none;
        list-style: none;
        margin-top : 2px;
    }
  </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mb-2">
            <li class="nav-item text-decoration-underline">
              <a class="nav-link active" aria-current="page" href="mainMenu.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pilihBeasiswa.php">Pilihan Beasiswa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daftar.php">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Hasil</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="card mt-4 mx-4">
      <h5 class="card-header">Beasiswa</h5>
      <div class="card-body">
        <h5 class="card-title">Pendaftaran Beasiswa Telah Dibuka</h5>
        <p class="card-text">Untuk mendaftar beasiswa klik di bawah ini</p>
        <form method="post" id="formBeasiswa" action="">
          <li>Nama</li>
            <li>
              <input id="nama" name="nama" type="text" class="form-control"/>
            </li>
            <li>Password</li>
            <li>
              <input id="password" name="password" type="password" class="form-control"/>
            </li>
        <button type="button" href="pilihBeasiswa.php?" class="btn btn-info mt-2" onclick="simpan()">Daftar</button>
        </form>
      </div>
    </div>
</body>
</html>

<script>
    function simpan() {
        var username = document.getElementById('nama').value;
        var pass = document.getElementById('password').value;

        if (username === "" || pass === "") {
            alert("Nama dan Password harus diisi!");
            return;
        }
        document.getElementById('formBeasiswa').submit();
    }
  </script>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST['nama'];
      $password = $_POST['password'];

      if(!empty($username) && !empty($password)) {
          $stmt = $conn->prepare("SELECT nama FROM users WHERE nama = ? AND pass = ?");
          $stmt->bind_param("ss", $username, $password);

          $stmt->execute();
          $result = $stmt->get_result();

          if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama = $row['nama'];
              echo "<script>window.location.href = 'daftar.php?nama=$nama';</script>";
          } else {
              echo "<script>alert('Nama atau Password salah!');</script>";
          }

      } else {
          echo "<script>alert('Mohon isi Nama dan Password.');</script>";
      }
  }
  ?>
