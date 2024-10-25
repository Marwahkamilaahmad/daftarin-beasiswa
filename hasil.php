<?php 
include 'server.php';
if (isset($_GET['id'])) {
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT status, nama, email, noHp, semester, ipk, jenis_beasiswa FROM users WHERE id = ? ");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body {
      background-image: url('wallpaper3.jpg');
    }
  </style>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-light">Data Pendaftar Beasiswa</h2>
        <table class="table table-bordered table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Semester</th>
                    <th>IPK</th>
                    <th>Jenis Beasiswa</th>
                    <th>Status</th>
                </tr>
            </thead>
            <?php $row = $result->fetch_assoc(); ?>
            <tbody>
                    <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['noHp']; ?></td>
                        <td><?php echo $row['semester']; ?></td>
                        <td><?php echo $row['ipk']; ?></td>
                        <td><?php echo $row['jenis_beasiswa']; ?></td>
                        <td><?php echo $row['status'] == 1 ? 'Belum Diverifikasi' : 'Telah Terverifikasi'; ?></td>
                    </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
