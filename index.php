<?php
session_start();
session_unset();
session_destroy();
include_once 'framework\template.php';
?>
<!DOCTYPE html>
<html>
<?php WriteHeaderNotLogIn(); ?>
    
    <body>
        <div id="mainBody">
            <br>
            <div id="wellcome">
                <h1>Wellcome to LightIT!</h1>
                <h2>Please, log in:</h2>
            </div>
            <div id="log_pass">
                <form action="resume.php" method="POST">
                    <input type="text" name="user_name" placeholder="Login" required autofocus><br>
                    <input type="password" name="pass" placeholder="Password" required><br>
                    <input type="submit" value="Log In" name="submit">
                </form>    
                <a href="registration.php">Registration</a><br>
            </div>
        </div>
    </body>
    
<?php WriteFooterNotLogIn(); ?>
</html>