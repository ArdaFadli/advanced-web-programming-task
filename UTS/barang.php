<?php
	include "connection.php";
    include "validate.php";

    $qry = mysqli_query($conn, "SELECT * FROM barang");


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TOKO ABC</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="css/font-nunito.css">

    </head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark overlap-bg-navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="home.php">HOME</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="user.php">USER</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="barang.php">BARANG</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn active overlap-bg-white">
                    <a href="logout.php" class="link-menu">LOGOUT</a>
                </label>
              </div>
          </div>
        </div>
    </nav>


    <div class="container-fluid mt-3">
        <div class=" jumbotron bg-lightblue">
        	<h3>Management Barang</h3>
            <a href="barang-add.php"><button type="submit" class="btn btn-primary">TAMBAH</button></a>
            <br><br>
        	<table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Stok</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while($data = $qry->fetch_assoc()){
                            $html = "
                                <tr>
                                    <th scope='row'>". $i ."</th>
                                    <td>". $data["BRG_NAMA"] ."</td>
                                    <td>". $data["BRG_HARGA"] ."</td>
                                    <td><img src='". $data["BRG_GAMBAR"] ."' height='80' weight='80'></td>
                                    <td>". $data["BRG_STOK"] ."</td>
                                    <td>
                                        <a href='barang-edit.php?kode=". $data["BRG_KODE"] ."'><button type='submit' class='btn btn-info'>EDIT</button></a>
                                        <a href='barang-delete.php?kode=". $data["BRG_KODE"] ."'><button type='submit' class='btn btn-danger'>HAPUS</button></a>
                                    </td>
                                </tr>
                            ";
                            echo $html;
                            $i++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script type="text/javascript">



    </script>

  </body>
</html>
