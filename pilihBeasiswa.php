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
  </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mb-2">
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="mainMenu.php">Home</a>
            </li>
            <li class="nav-item text-decoration-underline">
              <a class="nav-link active" href="#">Pilihan Beasiswa</a>
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
        <h5 class="card-title">Pilih Beasiswa</h5>
        <p class="card-text">Untuk mendaftar beasiswa klik di bawah ini</p>
        <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Jenis Beasiswa
        </button>
        <ul class="dropdown-menu">
            <li><button class="dropdown-item" type="button"  onclick="kirim()">Beasiswa Akademik</button></li>
            <li><button class="dropdown-item" type="button" onclick="kirim()">Beasiswa Non Akademik</button></li>
            <li><button class="dropdown-item" type="button" onclick="kirim()">Beasiswa Kurang Mampu</button></li>
            <li><button class="dropdown-item" type="button" onclick="kirim()">Beasiswa Mitra</button></li>
        </ul>
        </div>
      </div>
    </div>


</body>
</html>
<script>
    function kirim(){
        window.location.href = "daftar.php?ipk="
    }
</script>