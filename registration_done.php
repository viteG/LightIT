<?php session_start(); ?>
<!DOCTYPE html>
<html>
 <?php
    include_once 'framework\template.php';
    WriteHeaderNotLogIn();
  ?>
  <?php
    $captcha;
    if(!isset($_POST['name'], $_POST['second_name'], $_POST['user_name'], 
            $_POST['pass'], $_POST['c_pass'], $_POST['email'], $_POST['date_of_birth'], 
            $_POST['tel'], $_POST['form_token'])) { 
        $message = 'Please enter valid data';
    
    } elseif ( $_POST['form_token'] != $_SESSION['form_token']) {
        $message = 'Invalid form submission';        
    } elseif (ctype_alnum($_POST['user_name']) != true) {
        $message ='User name must be a combination of alphabetic and numeric characters';
    } elseif (ctype_alnum($_POST['pass']) != true) {
      $message = 'Password must be a combination of alphabetic and numeric characters';  
    } elseif (strlen( $_POST['pass']) > 16 || strlen($_POST['pass']) < 6){
        $message = 'Incorrect Length for Username';
    } elseif (ctype_alnum($_POST['c_pass']) != true) {
      $message = 'Password must be a combination of alphabetic and numeric characters';  
    } elseif (strlen( $_POST['c_pass']) > 16 || strlen($_POST['c_pass']) < 6)
    {
        $message = 'Incorrect Length for Username';
    } elseif ($_POST['pass'] != $_POST['c_pass']) {
      $message = 'Incorrect confirm password';
    } elseif (isset($_POST['g-recaptcha-response'])) {
        $captcha=$_POST['g-recaptcha-response'];
    } else
        
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          header('Location: registration.php');
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeALw4TAAAAAHyR7JW2hW8Pc1nxjv_CnUCYPCiQ&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        
        if($response.success==false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
          header('Location: index.php');
        }else {
        
          echo '<h2>Thanks for registration.</h2>';
        
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $second_name = filter_var($_POST['second_name'], FILTER_SANITIZE_STRING);
        $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
        $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $date_of_birth = filter_var($_POST['date_of_birth'], FILTER_SANITIZE_STRING);
        $tel = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);
        $reg_date =  date("y-m-d");                       
        
        $pass = md5($pass); //sha1
                     
        $connection = mysql_connect("localhost", "db_user", "1234");
        $db = mysql_select_db("my_bd");

        if (!$connection || !$db) {
            exit($message = "Unable to connect database".mysql_error()); 
            
        }
        
        $query = "INSERT INTO userdata(name, second_name, user_name, pass, email, date_of_birth, tel, reg_date) "
                    . "VALUES"."('$name', '$second_name', '$user_name', '$pass', '$email', '$date_of_birth', '$tel', '$reg_date')";
            
        if (!mysql_query($query, $connection)) {
                    $message = "Data wsn't written:".mysql_error();}
            
        mysql_close();
        unset( $_SESSION['form_token'] );
        
            // the message
        $msg = "Congratulations!\n Registration was successful";

            // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        if (!mail($email,"LigthIT registration",$msg)) {
            $message = "mail trouble" + $email;
        }  
   
            
    }
?>
    <body> 
        <div id="mainBody">
           <br>
           <div id="Thanks">
               <?php 
                if ($message){
                    echo '<p>'.$message.'</p>';
                } else {
                    echo "<h2>Thank you for registration</h2>";
                    echo "<p>The letter with registry information is sent to your email address!</p>";
                }
               ?>
                
           </div>
        </div>
       </body>
    <?php WriteFooterNotLogIn(); ?>
</html>