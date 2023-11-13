<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="" method='post'>
        <label for="fname">First Name:</label>
        <input type="text" name='fname' placeholder='Enter first name' class="form-control">

        <label for="mname">Middle Name:</label>
        <input type="text" name='mname' placeholder='Enter middle Name' class="form-control" maxlength='1'>

        <label for="lname">Last Name:</label>
        <input type="text" name='lname' placeholder='Enter last Name' class="form-control">
        
        <label for="age">Age:</label>
        <input type="number" name='age' placeholder='Enter age' class="form-control">
        
        <label for="sex">Sex:</label>
        <div class="form-check">
            <input type="radio" name='sex' id='male' value='Male' checked class="form-check-input">
            <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" name='sex' id='female' value='Female' class="form-check-input">
            <label class="form-check-label" for="female">Female</label>
        </div>
        
        <label for="username">Username:</label>
        <input type="text" name='username' placeholder='Enter username' class="form-control">
        
        <label for="password">Password:</label>
        <input type="password" name='password' placeholder='Enter password' class="form-control">
        
        <button type='submit' name='register' class="btn btn-primary">Register</button>
    </form>

    <p class="mt-3 text-center">Already have an account? <a href="index.php">Login</a></p>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>


<?php
    require 'conn_db.php';
    if (isset($_POST['register'])) {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        if (!empty($fname) && !empty($mname) && !empty($lname) && !empty($age) && !empty($sex) && !empty($username) && !empty($password)) {
            $insert = "INSERT INTO user VALUES ('$username', '$password', '$fname', '$mname', '$lname', '$age', '$sex')";

            if (mysqli_query($conn, $insert)) {
                // echo "<script>alert('Registered successfully');</script>";
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                            icon: 'success',
                            title: 'Successful',
                            text: 'You have register an account',
                            showConfirmButton: false,
                            timer: 3000 
                        });
                    });
                </script>";
                header('Refresh: 2; URL=index.php');
            }else {
                // echo 'Error in inserting';
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error in inserting records, try again',
                            showConfirmButton: false,
                            timer: 2000 
                        });
                    });
                </script>";
            }
        }else {
            //echo "<script>alert('Fill out all fields');</script>";
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