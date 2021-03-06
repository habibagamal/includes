<?php
  require ('db.php');

  session_start();
  //echo ini_get('display_errors');

  if (!ini_get('display_errors')) 
  {
    //ini_set('display_errors', '1');
  }

  if ($conn)
  {
    //echo "connected"; 
  }

  //echo ini_get('display_errors');

  $sql = "SELECT * FROM OnlineAccount WHERE account_status = '1'";

  $result = mysqli_query($conn, $sql);

  if(mysqli_query($conn, $sql))
  {
    //echo "Fetched";
  } 
  else
  {
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
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

  <!-- Table -->
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Username</th>
      <th scope="col">ClientID</th>
      <th scope="col">AccountNum</th>
      <th scope="col">UserType</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while ($application = mysqli_fetch_assoc($result))
      {
        ?>
        <tr>
          <td><?php echo $application['username']; ?></td>
          <td><?php echo $application['clientID']; ?></td>
          <td><?php echo $application['AccountNum']; ?></td>
          <td><?php echo $application['userType']; ?></td>
          <td> <button name="submit" type="submit" class="btn btn-danger" ><a href="SpecificApplication.php?id=<?php echo $application['username'];?>" style="color:black">View</button></a>
        </tr>
      <?php
      }
      ?>  
  </tbody>
</table>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
