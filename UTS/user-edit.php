<?php
	include "connection.php";
    include "validate.php";

    if(isset($_POST["action"])){
        $action = $_POST["action"];

        if($action == "submit"){
            $qry = mysqli_query($conn, "UPDATE user SET USER_NAMA = '". $_POST["nama"] ."', USER_EMAIL = '". $_POST["email"] ."', USER_TELP = '". $_POST["telp"] ."', USER_PASSWORD = '". $_POST["password"] ."', USER_PERAN = '". $_POST["peran"] ."' WHERE USER_KODE = '". $_POST["kode"] ."'  ");

            if(mysqli_affected_rows($conn) > 0){

            }else{

            }
            header("location:user.php");
        }
    }

    $qry = mysqli_query($conn, "SELECT * FROM user where USER_KODE = '". $_GET["kode"] ."' ");
    if(mysqli_num_rows($qry) < 1){
        header("location:user.php");
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
        	<h4 class="card-title">Edit User</h4>
              <br>
              <form action="user-edit.php" method="post">
              	<input type="hidden" name="action" value="submit">
              	<input type="hidden" name="kode" value="<?php echo $qry["USER_KODE"]; ?>">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control"  placeholder="Nama" required="true" value="<?php echo $qry["USER_NAMA"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"  placeholder="nama@example.com" required="true" value="<?php echo $qry["USER_EMAIL"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telp" class="form-control"  placeholder="08xxx" required="true" value="<?php echo $qry["USER_TELP"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required="true" value="<?php echo $qry["USER_PASSWORD"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Peran</label>
                    <select class="form-control" name="peran">
				    	<option value="Admin">ADMIN</option>
				    </select>
                </div>          
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">UPDATE</button>                           
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
