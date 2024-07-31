<?php
    $showAlert=false;
    $showError=false;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $pwd = $_POST['password'];
            $email = $_POST['email'];
            require './assets/databasecon.php';
          $existSql="SELECT * FROM `registation` WHERE name='$name'";
          $result =mysqli_query($conn,$existSql);
          $numExistRows = mysqli_num_rows($result);
          if($numExistRows>0){
            $showError="Username already exists";
            }
            else{
            $sql=" INSERT INTO `registation` (`name`, `pwd`, `email`) VALUES ( '$name', '$pwd', '$email')";
            $result=mysqli_query($conn, $sql);
            if ($result) {
                $showAlert=true;
            } else {
            
                $showError="some of the things are required";
            }  
            }
          
              }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
        require './assets/navbar.php' 
    ?>
    <?php
    if($showAlert){
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successful
        </strong> You can Login Now.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
                }
    if($showError){
        echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Successful
        </strong> '.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
                }
    ?>
    <h1 class="text-center p-3">Welcome to Sign Up Page</h1>


    <div class="container text-bg-dark p-3 w-25 border border-success">
        <form action="/LoginSystem/signup.php" method="post">
            <div class="mb-1 ">
                <label for="name" class="form-label">UserName</label>
                <input type="text" name="name" class="form-control" id="name" required>

                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">

                <div class="mb-1 ">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary text-center w-25 m-1 ">Sign UP</button>
        </form>
        <h6>If You have account then <a href="/LoginSystem/login.php">Login</a> </h6>
    </div>



</body>

</html>