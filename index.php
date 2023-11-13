<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .login-container h2 {
            text-align: center;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .register-link {
            display: block;
            text-align: center;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action='' method='post'>
            <div class="form-group">
                <input type="text" name='username' class="form-control" placeholder="Username" >
            </div>
            <div class="form-group">
                <input type="password" name='password' class="form-control" placeholder="Password" >
            </div>
            <div class="form-group">
                <button type="submit" name='login'>Login</button>
            </div>
        </form>
        <a href="registration.php" class="register-link">Register a user</a>
    </div>
    <br>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    require 'conn_db.php';

    if (isset($_POST['login'])) {
        session_start();

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty($username) && !empty($password)) {
            
            $select = "SELECT username, password FROM user WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $select);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($username == $row['username'] && $password == $row['password']) {
                        $_SESSION['usernameSession'] = $username;
                        header('Location: home.php');
                    }else {
                        //echo "<script>alert('Invalid credentials');</script>";
                        echo "<script>
                             document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid credentials',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                </script>";
                    }
                }else {
                    //echo "<script>alert('Invalid credentials');</script>";
                    echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid credentials',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                </script>";
                }
            }else {
                //echo "<script>alert('Invalid credentials');</script>";
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid credentials',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                </script>";
            }
        }else {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Fill out all fields!',
                                showConfirmButton: false,
                                timer: 2000 
                            });
                        });
                    </script>";

        }
    }

?>