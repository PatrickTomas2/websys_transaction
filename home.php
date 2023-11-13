<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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

        h1 {
            color: #007bff;
        }

        .blog-post {
            max-width: 850px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .blog-title {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            text-decoration: none;
        }

        .blog-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }

        .blog-content {
            margin-top: 10px;
        }

        .comment-section {
            margin-top: 20px;
        }

        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        .btn-comment {
            background-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-comment:hover {
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

    <?php
    require 'conn_db.php';
    session_start();
    if (isset($_SESSION['usernameSession'])) {
        $user_name = $_SESSION['usernameSession'];
        $select_post = "SELECT blog_id, blog_title, blog_content, blog_category, blog_picture,  DATE_FORMAT(blog_date_time, '%m/%d/%Y %h:%i %p') AS formatted_blog_time FROM post";
        $result = mysqli_query($conn, $select_post);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='blog-post'>";
                echo "<a class='blog-title' href='?change=" . $row['blog_id'] . "'>" . $row['blog_title'] . "</a>";
                echo "<img class='blog-img' src='{$row['blog_picture']}' alt='picture'>";
                echo "<p class='blog-content'>" . $row['blog_content'] . "</p>";
                echo "<p><b>" . $row['blog_category'] . "</b>" . " | Date: " . $row['formatted_blog_time'] . "</p>";

                // Check if the 'change' parameter matches the current post ID
                if (isset($_GET['change']) && $_GET['change'] == $row['blog_id']) {
                    echo "<h3 class='comment-section'>Comment</h3>";
                    echo "<form action='' method='post'>";
                    echo "<textarea name='comment' cols='15' rows='10'></textarea><br>";
                    echo "<input class='btn-comment' type='submit' name='submit_comment' value='Comment'><br><br>";
                    echo "</form>";

                    $select_comment = "SELECT user.username, comment, DATE_FORMAT(comment_date_time, '%m/%d/%Y %h:%i %p') 
                                        AS formatted_time FROM user 
                                        INNER JOIN comment ON user.username = comment.username 
                                        INNER JOIN post ON post.blog_id = comment.blog_id 
                                        WHERE post.blog_id = '" . $row['blog_id'] . "'";
 
                    $result_comment = mysqli_query($conn, $select_comment);
                    if ($result_comment) {
                        while ($row_comment = mysqli_fetch_assoc($result_comment)) {
                            echo "<b>" . $row_comment['username'] . ": " . "</b>" . $row_comment['comment'] . "<br><br>";
                            echo $row_comment['formatted_time'];
                            echo "<br><br>";
                            echo "<hr>";
                        }
                    }

                    if (isset($_POST['submit_comment'])) {
                        $comment = $_POST['comment'];
                        $user_id = $row['blog_id'];
                        if (!empty($comment)) {
                            echo "<br>" . "<b>" . $user_name . ": " . "</b>" . $comment;
                        

                        $comment = mysqli_real_escape_string($conn, $comment);
                        $insert_comment = "INSERT INTO comment (blog_id, username, comment, comment_date_time) VALUES ($user_id, '$user_name', '$comment', NOW())";
                        (mysqli_query($conn, $insert_comment));
                        }
                    }
                }

                echo "</div>";
            }
        }

    } else {
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
        header('refresh: 2; URL=index.php');
        echo "Please wait...";
    }
    ?>
</body>
</html>