<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../uts_susanto/asset/css/bootstrap.min.css">
    <title>APLIKASI HITUNG NILAI</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark text-light h4 fw-bold">
        <div class="container-fluid">
            PROGRAM HITUNG NILAI
        </div>
    </nav>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col5" style="width:500px;">
                <label class="h5 fw-bold">FORM INPUT</label>
                <form action="" method="POST">
                    <table class="table table-hover table-borderless">
                        <hr style="width: 510px;">
                        <tr>
                            <td class=""><label for="nim" class="form-label fw-bold">NIM</label></td>
                            <td><input type="text" required name="nim" id="nim" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><label for="nama" class="form-label fw-bold">Nama</label></td>
                            <td><input type="text" required name="nama" id="nama" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td class=""><label for="absensi" class="form-label fw-bold">Nilai Absensi</label></td>
                            <td><input type="number" name="absensi" id="absensi" class="form-control" style="width:100px;"></td>
                        </tr>
                        <tr>
                            <td><label for="tugas" class="form-label fw-bold">Nilai Tugas & Quiz</label></td>
                            <td><input type="number" name="tugas" id="tugas" class="form-control" style="width:100px;"></td>
                        </tr>
                        <tr>
                            <td><label for="uts" class="form-label fw-bold">Nilai UTS</label></td>
                            <td><input type="number" name="uts" id="uts" class="form-control" style="width:100px;"></td>
                        </tr>
                        <tr>
                            <td><label for="uas" class="form-label fw-bold">Nilai UAS</label></td>
                            <td><input type="number" name="uas" id="uas" class="form-control" style="width:100px;"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn btn-primary fw-bold" name="proses" style="width: 500px;">HITUNG NILAI</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col5 offset-3" style="width:500px;">
                <?php if (isset($_POST['proses'])) :

                    $nim = $_POST['nim'];
                    $nama = $_POST['nama'];
                    $prodi;
                    $absen = $_POST['absensi'];
                    $tugas = $_POST['tugas'];
                    $uts = $_POST['uts'];
                    $uas = $_POST['uas'];

                    if (substr($nim, 0, 2) == '36') {
                        $prodi = 'Teknik Informatika';
                    } elseif (substr($nim, 0, 2) == '35') {
                        $prodi = 'Sistem Informasi';
                    }

                    $nilaiAkhir = ($absen * 10 / 100) + ($tugas * 20 / 100) + ($uts * 30 / 100) + ($uas * 40 / 100);
                    if ($nilaiAkhir > 90) {
                        $grade = "A";
                        $ket = "Memuaskan";
                    } elseif ($nilaiAkhir > 70) {
                        $grade = "B";
                        $ket = "Baik";
                    } elseif ($nilaiAkhir > 60) {
                        $grade = "C";
                        $ket = "Cukup";
                    } elseif ($nilaiAkhir > 55) {
                        $grade = "D";
                        $ket = "Kurang";
                    } else {
                        $grade = "<label style='color:red;'>E</label>";
                        $ket = "<label style='color:red;'>Tidak Lulus</label>";
                    }
                ?>
                    <label class="h5 fw-bold">HASIL</label>
                    <form action="" method="POST">
                        <table class="table table-hover table-borderless">
                            <hr style="width: 450px;">
                            <tr>
                                <td style="width:200px;"><label for="nim" class="form-label fw-bold">NIM</label></td>
                                <td>:</td>
                                <td><?= $nim; ?></td>
                            </tr>
                            <tr>
                                <td><label for="nama" class="form-label fw-bold">Nama</label></td>
                                <td>:</td>
                                <td style="width:300px;"><?= $nama; ?></td>
                            </tr>
                            <tr>
                                <td><label for="prodi" class="form-label fw-bold">Program Studi</label></td>
                                <td>:</td>
                                <td><?= $prodi; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width: 500px;">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td class=""><label for="nilaiakhir" class="form-label fw-bold">Nilai Akhir</label></td>
                                <td>:</td>
                                <td class="fw-bold"><?= $nilaiAkhir; ?></td>
                            </tr>
                            <tr>
                                <td><label for="grade" class="form-label fw-bold">Grade</label></td>
                                <td>:</td>
                                <td class="fw-bold"><?= $grade; ?></td>
                            </tr>
                            <tr>
                                <td><label for="ket" class="form-label fw-bold">Keterangan</label></td>
                                <td>:</td>
                                <td class="fw-bold"><?= $ket; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="ulang" class="form-label fw-bold">Coba Lagi ? (Y/N)</label></td>
                                <td><a href="index.php"><button class="btn btn-success fw-bold" name="ok">YA</button></a></td>
                                <td><a href="logout.php" class="btn btn-success fw-bold">TIDAK</a></td>
                            </tr>
                        </table>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

<script src=" ../uts_susanto/asset/js/bootstrap.min.js"></script>

</html>