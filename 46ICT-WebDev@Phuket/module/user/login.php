<?php
// session_start();
    include "../../config/config.php";
    include "../../template/header.php";

if (isset($_SESSION['user'])) {
    header("Location:" . $burl );
}


if(isset($_POST['submit'])){

    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if(empty($username)){
        sweet("Error!","Please Enter Username","error","login");
        exit;
    }
    if(empty($password)){
        sweet("Error!","Please Enter password","error","login");
        exit;
    }
    if (detectSQLInjection($username) || detectSQLInjection($password)) {
        sweet("Error!","ฮั่นแน่!! จะทำไรอ่ะ รู้น้าาาา~~~~~~","error","login");
        exit;
    }

        $sql = "SELECT * FROM user,role WHERE user.username = '".$username."' AND user.password = '".$password."' AND user.role_id = role.role_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        $arr = array(
            "userID" => $row['user_id'],
            "username" => $row['username'],
            "email" => $row['email'],
            "role_id" => $row['role_id'],
            "role_name" => $row['role_name'],
        );

        $_SESSION['user'] = $arr;
        // $_SESSION['user'] = $arr;
            sweet("Success!","Login Success","success","");
        }else{
            sweet("Error!","Login Failed","error","login");
                exit;
        }
    }
    ?>
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-card h4 {
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }
        .login-card input {
            margin-bottom: 15px;
        }
        .login-card .btn {
            width: 100%;
        }
        .login-card p {
            margin-top: 15px;
            text-align: center;
        }
        .login-card a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
    <center class="pt-5 pb-5">
<div class="login-card">
        <h4><i class="bi bi-music-note"></i> Music Shop Login</h4>
        <form class="form" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your Username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Login</button>
        </form>
        <p>Don't have an account? <a href="#">Sign up</a></p>
    </div>
    <br>
    <br>
    <br>
    </center>
  <?php
    // include "../../template/footer.php";
    ?>