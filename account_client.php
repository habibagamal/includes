<?php
  require ('db.php');

  session_start();

  if(isset($_GET['id']) && $_GET['id'] !== '')
  {
    $accountNum = $_GET['id'];
    $_SESSION['accountNum'] = $accountNum;
    echo $accountNum;
  } 
  else 
  {
    echo "failed";
  }

  echo ini_get('display_errors');

  if (!ini_get('display_errors')) 
  {
    ini_set('display_errors', '1');
  }

  if ($conn)
    echo "connected";

  echo ini_get('display_errors');

  $sql = "SELECT * FROM bankAccount WHERE accountNum = '".$accountNum."'";
  $result = mysqli_query($conn, $sql);
  $account = mysqli_fetch_assoc($result);

  if (isset($_POST['transfer'])) 
  {

    header ("location:Transactions.php");
    $tAmount = mysqli_real_escape_string($conn, $_POST['tAmount']);
    $tAccount = mysqli_real_escape_string($conn, $_POST['tAccount']);

    $accountNumINT = (int) $accountNum;
    if ($account['balance'] >= $tAmount)
    {
    
        $sql = "INSERT INTO acc_transaction (accountNum, amount, transaction_date, transaction_time, transaction_type, transfer_recepient) VALUES ($accountNumINT, $tAmount, CURDATE(),CURTIME(), 'transfer', $tAccount)"; 
      if(mysqli_query($conn, $sql))
      {
        echo "transaction added";
        //require_once ('sms.php');
      } 
      else
      {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      } 

      $sql2 = "UPDATE bankAccount SET balance = balance - '".$tAmount."' WHERE accountNum = '".$accountNumINT."'"; 

      if(mysqli_query($conn, $sql2))
      {
        echo "balance decreased";
      } 
      else
      {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      } 

      $sql3 = "UPDATE bankAccount SET balance = balance + '".$tAmount."' WHERE accountNum = '".$tAccount."'"; 

      if(mysqli_query($conn, $sql3))
      {
        echo "balance increased";
      } 
      else
      {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      } 

    }
    exit();

    mysqli_close($conn);
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
        <button type="button" class="btn btn-secondary">Create Transfer</button>
        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu">
          <form method = "POST" action = "#">
            <input name="tAmount" type="number" Amount" class="form-control" id="exampleDropdownDeposit" placeholder="Transfer Amount">
            <input name="tAccount" type="number" class="form-control" id="exampleDropdownDeposit" placeholder="Transfer Account">
          <div class=" d-flex justify-content-center align-items-center">
            <button name="transfer" type="enter" class="btn btn-dark" >transfer</button></a>
          </div>
        </form>
        </div>
      </div>

      <br>
      <br>
      <br>

      <div class="btn-group dropdown d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-secondary"><a href="Transactions.php" style="color:white">Transactions</button></a>
      </div>

      <br>
      <br>
      <br>

      <div class="btn-group dropdown d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-secondary">Balance</button>
        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu">
             <p> <?php echo $account['balance']?></p>
        </div>
        </div>
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
