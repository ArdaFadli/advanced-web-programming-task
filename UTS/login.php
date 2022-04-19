<?php
    include "connection.php";
    session_start();

    if(isset($_SESSION["login_user"])){
        header("location:user.php");
    }

    if(isset($_POST["action"])){
        $action = $_POST["action"];

        if($action == "submit"){
            $qry = mysqli_query($conn, "SELECT * FROM user where USER_EMAIL = '". $_POST["email"] ."' AND USER_PASSWORD = '". $_POST["password"] ."' ");
            if(mysqli_num_rows($qry) < 1){
                header("location:login.php");
            }else{
                $qry = $qry->fetch_assoc();
                $_SESSION["login_user"] = $qry;
                header("location:home.php");
            }
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


    <div class="container-fluid mt-5">
        <form action="login.php" method="POST">

                <div align="center">
                    <div class="col-4">
                        <div class="text-center">
                            <h4 class="content-group"><b>LOGIN TOKO ABC</b></h4>
                        </div>
                        <br>

                        <input type="hidden" name="action" value="submit">

                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email" required="true" autocomplete="off"/>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="true" autocomplete="off" />
                        </div>

                        <div class="text-center form-group">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                        </div>
                    </div>

            </div>
        </form>
    </div>


    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script type="text/javascript">



    </script>

  </body>
</html>
