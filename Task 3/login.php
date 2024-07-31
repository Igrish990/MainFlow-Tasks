<?php
    $login=false;
    $showError=false;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require './assets/databasecon.php';
            $name = $_POST['name'];
            $pwd = $_POST['password'];
            
            $sql="select * from registation where name='$name' AND pwd='$pwd'";
            $result=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($result);
            if ($num==1) {
                $login=true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $name;
                header("location:./Task 2/index.html");
            } else {
            
                $showError="Invalid username or password";
            }     }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require './assets/navbar.php' ?>
    <?php
    if($login){
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully
        </strong> logged in
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
                }
    if($showError){
        echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error
        </strong> '.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
                }
    ?>
    <h1 class="text-center p-3">Welcome to Login Page</h1>
    <div class="container text-bg-dark p-3 w-25 border border-success ">

        <form action="/LoginSystem/login.php" method="post">
            <div class="mb-1 ">
                <label for="name" class="form-label">UserName</label>
                <input type="text" name="name" class="form-control" id="name" required>
                <div class="mb-1 ">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <button type="submit" class="btn btn-primary text-center w-25 m-1 ">Login</button>
        </form>
        <h6>If You don't have account then <a href="/LoginSystem/signup.php">Sign up</a> </h6>

    </div>
</body>

</html>