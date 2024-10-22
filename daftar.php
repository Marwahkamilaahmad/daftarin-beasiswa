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
    .center-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            <li class="nav-item ">
              <a class="nav-link " href="pilihBeasiswa.php">Pilihan Beasiswa</a>
            </li>
            <li class="nav-item text-decoration-underline">
              <a class="nav-link active" href="daftar.php">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hasil.php">Hasil</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<?php
if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
    $stmt = $conn->prepare("SELECT nama,email, semester, ipk, noHp FROM users WHERE nama = ? ");
    $stmt->bind_param("s", $nama);

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $nama = $row['nama'];
?>

<div class="center-card">
    <div class="card" style="width: ;padding-left: 1.5rem; padding-right: 1.5rem; margin-top:5rem;">
        <div class="card-body">
            <h5 class="card-title text-center">Form Beasiswa</h5>
            <p class="card-text text-center">Isi Data Diri Kamu :</p>
            
            <form method="post">
                <div class="form-group">
                    <li>Masukkan Nama <span class="text-danger">*</span></li>
                    <li>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $row['nama'] ?>" />
                    </li>
                    <li>Masukkan Email <span class="text-danger">*</span></li>
                    <li>
                        <input type="email" name="email" id="email" class="form-control" require/>
                    </li>
                    <li>Masukkan No Hp <span class="text-danger">*</span></li>
                    <li>
                        <input type="number" name="noHp" id="noHp" class="form-control" require />
                    </li>
                    <li>Semester Saat Ini <span class="text-danger">*</span></li>
                <li>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" >
                        <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2" >
                        <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3" >
                        <label class="form-check-label" for="inlineRadio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4" >
                        <label class="form-check-label" for="inlineRadio4">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5">
                        <label class="form-check-label" for="inlineRadio5">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="6" >
                        <label class="form-check-label" for="inlineRadio6">6</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio7" value="7" >
                        <label class="form-check-label" for="inlineRadio7">7</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio8" value="8">
                        <label class="form-check-label" for="inlineRadio8">8</label>
                    </div>
                </li>

                    <li>IPK Saat Ini <span class="text-danger">*</span></li>
                    <li><input type="number" id="ipk" class="form-control"  value="<?= $row['ipk'] ?>"/></li>
                    <li>
                    <label for="beasiswa">Jenis Beasiswa <span class="text-danger">*</span></label>
                        <select class="form-control" id="beasiswa" require >
                            <option value="">Jenis Beasiswa</option>
                            <option value="akademik">Beasiswa Akademik</option>
                            <option value="non-akademik">Beasiswa Non-Akademik</option>
                            <option value="penelitian">Beasiswa Penelitian</option>
                        </select>
                    </li>
                    <li>Unggah Berkas (PDF, JPG, ZIP)</li>
                    <li><input id="dokumen" type="file" class="form-control" accept=".pdf, .jpg, .zip" /></li>
                    <div class=" mt-4">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary" id="daftar" onclick="kirim(event, this.form)" >Daftar</button>
                            <button type="button" class="btn btn-secondary" id="cancel">Cancel</button>
                        </div>
                    </div>
                    <?php
                    }
                   } ?>
                </div>               
            </form>
        </div>
    </div>
</div>

<script>

        var ipkKolom = document.getElementById('ipk').value;
        var beasiswa = document.getElementById('beasiswa');
        var daftar = document.getElementById('daftar');
        var dokumen = document.getElementById('dokumen');

        var ipk = parseFloat(ipkKolom);
        
        if (ipk >= 3) {
            beasiswa.removeAttribute('disabled');
            daftar.removeAttribute('disabled');
            dokumen.removeAttribute('disabled');
        } else {
            beasiswa.setAttribute('disabled', true);
            daftar.setAttribute('disabled', true);
            dokumen.setAttribute('disabled', true);
        }
    

    function kirim(event, form){
      event.preventDefault();
      var email = document.getElementById('email').value;
      var noHp = document.getElementById('noHp').value;
      if(email == "" || noHp == "" ){
        alert('kosong');
      }else{
      form.action = "hasil.php";
      form.submit();
      }
    }
</script>


</body>
</html>
