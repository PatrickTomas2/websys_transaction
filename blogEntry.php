<?php
    require 'conn_db.php';
    session_start();
    if (isset($_SESSION['usernameSession'])) {
        if (isset($_POST['add_entry'])) {
            $blog_title = $_POST['blog_title'];
            $blog_content = $_POST['blog_content'];
            $blog_category = $_POST['blog_category'];

            $fileName = $_FILES['blog_picture']['name'];
            $fileType = $_FILES['blog_picture']['type'];
            $fileTempname = $_FILES['blog_picture']['tmp_name'];

            $uploadDirectory = 'images/';

            if (!empty($blog_title) && !empty($blog_content) && !empty($blog_category) && !empty($fileName)) {
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if ((in_array($fileType, $allowedTypes))) {

                    $targetPath = $uploadDirectory . $fileName; 

                    $blog_title = mysqli_real_escape_string($conn, $blog_title);
                    $blog_content = mysqli_real_escape_string($conn, $blog_content);
                    $blog_category = mysqli_real_escape_string($conn, $blog_category);
                    $targetPath = mysqli_real_escape_string($conn, $targetPath);

                    move_uploaded_file($fileTempname, $targetPath);

                    $insert_post = "INSERT INTO post (blog_title, blog_content, blog_category, blog_picture, blog_date_time) VALUES ('$blog_title', '$blog_content', '$blog_category', '$targetPath', NOW())";
                    
                    if (mysqli_query($conn, $insert_post)) {
                        //echo "<script>alert('Your blog has been posted');</script>";
                        echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                icon: 'success',
                                title: 'Successful',
                                text: 'Your blog has been posted',
                                showConfirmButton: false,
                                timer: 3000 
                                    });
                                });
                            </script>";
                    }else {
                        //echo "<script>alert('Error in posting');</script>";
                        echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Error in posting',
                                showConfirmButton: false,
                                timer: 2000 
                                    });
                                });
                            </script>";
                    }
                }else {
                    //echo "<script>alert('Only images are allowed (png, jpeg and jpg)');</script>";
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Only images are allowed (png, jpeg and jpg)',
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
                        text: 'Fill out all fields',
                        showConfirmButton: false,
                        timer: 2000 
                            });
                        });
                    </script>";
            }
        }
    }else {
        //echo "<script>alert('You have to login first');</script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You have to login first!',
                showConfirmButton: false,
                timer: 3000 
                    });
                });
                </script>";
        header('refresh: 3; URL=index.php');
        echo "Please wait...";
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Creation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #007bff;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href='home.php'>Home</a></li>
        <li><a href='blogEntry.php'>Create Blog Entry</a></li>
        <li><a href='logout.php'>Log out</a></li>
    </ul>

    <div class="container">
        <form action="" method='post' enctype="multipart/form-data">
            <div class="form-group">
                <label for="blog_title">Blog Entry:</label>
                <input type="text" class="form-control" name='blog_title' placeholder='Enter blog title'>
            </div>

            <div class="form-group">
                <label for="blog_content">Content:</label>
                <textarea class="form-control" name="blog_content" rows="4" placeholder='Enter content'></textarea>
            </div>

            <div class="form-group">
                <label for="blog_category">Choose a Category:</label>
                <select id="blog_category" name="blog_category">
                    <option value="Health and Wellness">Health and Wellness</option>
                    <option value="Tech Trends">Tech Trends</option>
                    <option value="Creative Arts">Creative Arts</option>
                    <option value="Science and Nature">Science and Nature</option>
                    <option value="Food and Cooking">Food and Cooking</option>
                    <option value="Personal Finance">Personal Finance</option>
                    <option value="Career Development">Career Development</option>
                    <option value="Parenting and Family">Parenting and Family</option>
                    <option value="Book Reviews and Literature">Book Reviews and Literature</option>
                    <option value="Entertainment News">Entertainment News</option>
                    <option value="Home Decor and DIY">Home Decor and DIY</option>
                    <option value="Travel and Adventure">Travel and Adventure</option>
                    <option value="Sports and Fitness">Sports and Fitness</option>
                    <option value="Music and Arts">Music and Arts</option>
                    <option value="Social Issues and Commentary">Social Issues and Commentary</option>
                    <option value="Automotive Enthusiast">Automotive Enthusiast</option>
                    <option value="Gaming and Technology">Gaming and Technology</option>
                    <option value="Education and Learning">Education and Learning</option>
                    <option value="Crafts and Hobbies">Crafts and Hobbies</option>
                    <option value="Relationships and Dating">Relationships and Dating</option>
                </select>
            </div>

            <div class="form-group">
                <label for="blog_picture">Blog Picture:</label>
                <input type="file" class="form-control-file" name='blog_picture'>
            </div>

            <input type="submit" class="btn btn-primary" name='add_entry' value='Add Entry'>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>