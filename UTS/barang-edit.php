<?php
	include "connection.php";
    include "validate.php";

    if(isset($_POST["action"])){
        $action = $_POST["action"];

        if($action == "submit"){


            if(isset($_FILES["foto"]) && $_FILES["foto"]["tmp_name"] != ""){
                $target_dir = "img/";
                $target_file = $target_dir . basename($_FILES["foto"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["foto"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                  }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["foto"]["size"] > 500000) {
                  echo "Sorry, your file is too large.";
                  $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                  echo "Sorry, only JPG, JPEG, or PNG files are allowed.";
                  $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                  if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " has been uploaded.";
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
                }

            }else{
                $target_file = $_POST["nama_file"];
            }


            $qry = mysqli_query($conn, "UPDATE barang SET BRG_NAMA = '". $_POST["nama"] ."', BRG_HARGA = ". $_POST["harga"] .", BRG_GAMBAR = '". $target_file ."', BRG_STOK = '". $_POST["stok"] ."' WHERE BRG_KODE = '". $_POST["kode"] ."'  ");

            if(mysqli_affected_rows($conn) > 0){

            }else{

            }
            header("location:barang.php");
        }
    }

    $qry = mysqli_query($conn, "SELECT * FROM barang where BRG_KODE = '". $_GET["kode"] ."' ");
    if(mysqli_num_rows($qry) < 1){
        header("location:barang.php");
    }else{
        $qry = $qry->fetch_assoc();
    }

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
        	<h4 class="card-title">Edit Barang</h4>
              <br>
              <form action="barang-edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="submit">
                <input type="hidden" name="kode" value="<?php echo $qry["BRG_KODE"] ?>">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control"  placeholder="Nama" required="true" value="<?php echo $qry["BRG_NAMA"] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control"  placeholder="Rp xxx" required="true" value="<?php echo $qry["BRG_HARGA"] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" required="true" value="<?php echo $qry["BRG_STOK"] ?>">
                </div>
                <input type="hidden" name="nama_file" value="<?php echo $qry["BRG_GAMBAR"] ?>">
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto">
                </div> 
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>                           
                </div>                                  
              </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script type="text/javascript">



    </script>

  </body>
</html>
