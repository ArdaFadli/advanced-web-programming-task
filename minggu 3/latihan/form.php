<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM PENDATAAN</title>
</head>

<body>
<form action="" method="POST" name="submit">

    <table border="1">
        <tr>
            <td>Nim</td>
            <td>
                <input type="text" name="nim" placeholder="NIM" autofocus>
            </td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>
                <select name="prodi" id="">
                    <option value="" selected>PILIH DATA</option>
                    <option value="A11">Teknik Informatika S1</option>
                    <option value="A12">Sistem Informasi S1</option>
                    <option value="A22">Teknik Informatika D3</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nilai Tugas</td>
            <td>
                <input type="number" max="100" name="ntugas">
            </td>
        </tr>
        <tr>
            <td>Nilai UTS</td>
            <td>
                <input type="number" max="100" name="nuts">
            </td>
        </tr>
        <tr>
            <td>Nilai UAS</td>
            <td>
                <input type="number" max="100" name="nuas">
            </td>
        </tr>
        <tr>
            <td>Catatan Khusus</td>
            <td>
                    <li><input type="checkbox" name="catatan[]" value="Kehadiran >= 70 %">Kehadiran >= 70 %</li>
                    <li><input type="checkbox" name="catatan[]" value="Interaktif dikelas">Interaktif dikelas</li>
                    <li><input type="checkbox" name="catatan[]" value="Tidak terlambat mengumpulkan tugas">Tidak terlambat mengumpulkan tugas</li>
                </ul>
            </td>
        </tr>
    </table>
    <button type="submit" value="">Simpan</button>
    <br><br>
</form>
<table border="1">
    <tr>
        <td>NIM</td>
        <td>Program Studi</td>
        <td>Nilai Akhir</td>
        <td>Status</td>
        <td>Catatan Khusus</td>
    </tr>
    <?php
    if (isset($_POST["nim"])) {
        $prodi = "";

        if ($_POST['prodi'] == "A11") {
            $prodi = "Teknik Informatika S1";
        } elseif ($_POST['prodi'] == "A12") {
            $prodi = "Sistem Informasi S1";
        } else {
            $prodi = "Teknik Informatika D3";
        }

        $nilai = ($_POST['ntugas'] / 40 * 100) + ($_POST['nuts'] / 30 * 100) + ($_POST['nuas'] / 30 * 100);
        if ($nilai > 60) {
            $lulus = "LULUS";
        } else {
            $lulus = "TIDAK LULUS";
        }

        $catatan = ("");

        for ($i = 0; $i <= (count($_POST['catatan']) - 1); $i++) {
            $catatan .= $_POST['catatan'][$i];
        }

        ?>
        <tr>
            <td><?= $prodi; ?></td>
            <td><?= $_POST['nim']; ?></td>
            <td><?= $nilai; ?></td>
            <td><?= $lulus; ?></td>
            <td><?= $catatan; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>


</html>