<?php
  require ('db.php');

  session_start();

  $_SESSION['userType'] = '01';
  
  //echo ini_get('display_errors');

  if (!ini_get('display_errors')) 
  {
    ini_set('display_errors', '1');
  }

  if ($conn)
  {
    //echo "connected";
  }

  //echo ini_get('display_errors');

  if (isset($_POST['enter'])) 
  {
      header ("location:Accounts.php");
      $clientID = mysqli_real_escape_string($conn, $_POST['clientID']);
      $_SESSION['clientID'] = $clientID;
      exit();
  }

  if (isset($_POST['enter1'])) 
  {
      header ("location:Account.php");
      $accountNum = mysqli_real_escape_string($conn, $_POST['accountNum']);
      $_SESSION['accountNum'] = $accountNum;
      exit();
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
      html,body 
      {
        background-image: url("bank1.jpg");
        height: 400%;
    /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%
      }

    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <!-- NAVIGATION -->
       <div class="pos-f-t">
      <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class = "navbar-brand" href ="#"><img src = "logo.jpg" width="70" height = "70"></a>

            <button class="btn btn-secondary" onclick="goBack()">Go Back</button>
            <script>
              function goBack() 
              {
              window.history.back();
              }
            </script>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
      </nav>
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
        <button type="button" class="btn btn-success" ><a href="home.php" style="color:white">HOME</button></a>
        <button type="button" class="btn btn-warning" ><a href="home.php" style="color:white">LOGOUT</button></a>
        </div>
      </div>
    </div>

    <!--Cards-->
     <br>
      <br>
      <br>

      <div class="btn-group dropdown d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-secondary"><a href ="ChangePassword.php" style="color:white">Change Password</button></a>
      </div>

      <br>
      <br>
      <br>

      <div class="btn-group dropdown d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-secondary">View Accounts of Client</button>
        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu ">
          <form method = "POST" action = "#">
            <input name="clientID" type="Client's ID Number" class="form-control" id="exampleDropdownIDNUM2" placeholder="Client's ID Number">
            <button name = "enter" type="enter" class="btn btn-dark" >Enter</button>
        </form>
      </div>
    </div>
      <br>
      <br>
      <br>

      <div class="btn-group dropdown d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-secondary">View Account with Account Num</button>
        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu ">
          <form method = "POST" action = "#">
            <input name="accountNum" type="Client's ID Number" class="form-control" id="exampleDropdownIDNUM2" placeholder="Account Number">
            <button name = "enter1" type="enter" class="btn btn-dark" >Enter</button>
        </form>
      </div>
    </div>
      <br>
      <br>
      <br>

      <div class="btn-group dropdown d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-secondary"><a href ="OpenAccount.php" style="color:white">Create Account for Existing Client</button></a>
      </div>

      <br>
      <br>
      <br>

      <div class="btn-group dropdown d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-secondary"><a href="AddClient.php" style="color:white">Add New Client</button></a>
      </div>

      <br>
      <br>
      <br>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>