<?php
include "../components/db/db_connect.php";
// include "../components/error/error.php";
// include "../components/login/session.php";
//include end

//if logged in -> index.php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
}

if (isset($_POST['submit'])){
    if (empty(trim($_POST['user']))){
        echo "Please fill in your username";
    }else{
        $username = trim($_POST['user']);
        if (empty(trim($_POST['pass']))){
            echo "Please fill in your password";
        }else{
            $pass = trim($_POST['pass']);
            $TbNameU = "user";
            $check_user_qr = "SELECT user_id, user_name, user_pass, user_type 
            FROM $TbNameU 
            WHERE user_name = ?";

            if($stmt = mysqli_prepare($con, $check_user_qr)){
                mysqli_stmt_bind_param($stmt, 's', $param_username);
                $param_username = $username;
                //execute sql
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    //check if username exists
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        //bind result vars
                        mysqli_stmt_bind_result($stmt, $user_id, $user_name, $hashed_pass, $user_type);
                        if (mysqli_stmt_fetch($stmt)){
                            if(password_verify($pass, $hashed_pass)){
                                session_start();

                                $_SESSION['loggedIn'] = true;
                                $_SESSION['id'] = $user_id;
                                $_SESSION['username'] = $user_name;
                                $_SESSION['type'] = $user_type;

                                header("location: ../index.php");
                            }
                        }
                    }
                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        }   
    }    
}

?>