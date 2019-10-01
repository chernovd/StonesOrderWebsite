<?php
/**
 * User: lukaskirchhoff
 * Date: 26.06.19
 */

function loginForm($DBConnect)
{
    ?>
    <form action="index.php" method="POST" name="LOGIN">
        <p><input type="text" name="userName" placeholder="Username"></p>
        <p><input type="password" name="userPass" placeholder="Password"></p>
        <p><input type="submit" name="login" value="Login"></p>
    </form>

    <?php
    if (isset($_POST['login']) && !empty($_POST['userName']) && !empty($_POST['userPass'])) {
        $userName = $_POST['userName'];
        $userPass = $_POST['userPass'];
        $loginQuery = "SELECT user_type FROM user WHERE user_name = ? && user_pass = ? LIMIT 1";

        if ($loginStatement = mysqli_prepare($DBConnect, $loginQuery)) {
            mysqli_stmt_bind_param($loginStatement, "ss", $userName, $userPass);
            if ($loginExecute = mysqli_stmt_execute($loginStatement)) {
                mysqli_stmt_bind_result($loginStatement, $user_type);
                mysqli_stmt_store_result($loginStatement);
                while (mysqli_stmt_fetch($loginStatement)) {
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['type'] = $user_type;
                    echo "<script>window.location.replace('index.php?page=order');</script>";
                }
            } else {
                echo "Username or password wrong<br>";
            }
            mysqli_stmt_close($loginStatement);
        } else {
            echo "cannot prepare";
        }
    }
}