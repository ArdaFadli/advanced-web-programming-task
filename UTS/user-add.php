<?php
	include "connection.php";
    include "validate.php";

    if(isset($_POST["action"])){
        $action = $_POST["action"];

        if($action == "submit"){
            $qry = mysqli_query($conn, "INSERT INTO user (USER_NAMA, USER_EMAIL, USER_TELP, USER_PERAN, USER_PASSWORD) VALUES ('". $_POST["nama"] ."', '". $_POST["email"] ."', '". $_POST["telp"] ."', '". $_POST["peran"] ."', '". $_POST["password"] ."') ");

            if(mysqli_affected_rows($conn) > 0){

            }else{

            }
            header("location:user.php");
        }
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
                <li class="nav-item active">
                    <a class="nav-link" href="user.php">USER</a>
                </li>
                <li class="nav-item">
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
        	<h4 class="card-title">Tambah User</h4>
              <br>
              <form action="user-add.php" method="post">
              	<input type="hidden" name="action" value="submit">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control"  placeholder="Nama" required="true">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"  placeholder="nama@example.com" required="true">
                </div>
                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telp" class="form-control"  placeholder="08xxx" required="true">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required="true">
                </div>
                <div class="mb-3">
                    <label class="form-label">Peran</label>
                    <select class="form-control" name="peran">
				    	<option value="ADMIN">Admin</option>
				    </select>
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
