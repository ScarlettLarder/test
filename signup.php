<?php
    include('connection.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
    }

        $sql = "INSERT INTO user (name, password) VALUES (?, ?)";  
        if($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            if(mysqli_stmt_execute($stmt)) {
                header("location:page.php");
        }
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>