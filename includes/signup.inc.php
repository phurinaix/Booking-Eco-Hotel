<?php
    require 'db.inc.php';
    
    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        
        if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
            echo "<script type='text/javascript'>alert('Please complete form');";
            echo "location='../signup.php?signup=empty';</script>";
        } else {
            if ($password !== $confirm_password) {
                echo "<script type='text/javascript'>alert('Password not matched');";
                echo "location='../signup.php?signup=passwordIncorrect';</script>";
            } else {
                $sql = "SELECT * FROM login WHERE email=:email";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(":email", $email);
                $email = $_POST["email"];
                $stmt->execute();
                $row_count = $stmt->rowCount();
                if ($row_count > 0) {
                    echo "<script type='text/javascript'>alert('User already taken');";
                    echo "location='../signup.php?signup=usertaken';</script>";
                } else {
                    $hash_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO login (name, email, password) VALUES (?, ?, ?)";
                    $stmt = $con->prepare($sql);
                    $stmt->execute(array($name, $email, $hash_password));
                    header("location: ../login.php");
                    exit();
                }
            }
        }
    } else {
        header("location: ../signup.php");
        exit();
    }