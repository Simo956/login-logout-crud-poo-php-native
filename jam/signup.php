<?php 
session_start(); // Start the session

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_management";

//Create Connection
$connection = new mysqli($servername, $username, $password, $database);

//Check connection stablished or not!
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// Check if the form is submitted
// Check if the form is submitted
if(isset($_POST['submit'])) {
  // Check if email and password keys are set in the $_POST array
  if(isset($_POST['email']) && isset($_POST['password'])) {
      // Retrieve user input
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Your authentication logic...
      
      // Example query to check if the user exists in the database
      $query = "insert into users(email, password) values('$email','$password'";
      $result = $connection->query($query);
      // Check if the query was successful
      if($result) {
          // Check if a user was found with the provided credentials
          if($result->num_rows > 0) {
            $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['email'] = $row['email'];

              // User is authenticated, you can redirect to a dashboard or perform other actions
              header("Location: index.php");
            } else {
              echo "Invalid email or password";
          }
      } else {
          echo "Query failed: " . $connection->error;
      }
  } else {
      echo "Email and password not provided.";
  }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<!-- Section: Design Block -->
<section class=" text-center text-lg-start">
  <style>
    .container{
        margin-top: 150px;
    }
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
  <div class="container">
  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

         <form method="post" action="index.php">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input name="email" type="email" id="form2Example1" class="form-control" />
              <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input name="password" type="password" id="form2Example2" class="form-control" />
              <label class="form-label" for="form2Example2">Password</label>
            </div>
            <!-- Submit button -->
            <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

          </form>

        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- Section: Design Block -->
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
