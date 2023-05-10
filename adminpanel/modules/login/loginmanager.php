<?php 
session_start();
if(isset($_SESSION['type']) && $_SESSION['type']=='admin'){
    header("Location: ../dashboard/dashboardmanager.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      margin-top: 100px;
      border: none;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
    }
    .card-header {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
      text-align: center;
    }
    .form-control {
      border-radius: 0px;
    }
    .btn {
      border-radius: 0px;
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="card">
          <div class="card-header">
            <h4>Admin Login</h4>
          </div>
          <div class="card-body">
            <form id="loginform">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary btn-block"id="loginbtn" type="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script  src="loginmanager.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</body>


</html>