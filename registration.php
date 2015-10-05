<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <?php
    include_once 'framework\template.php';
    require_once "recaptchalib.php";
    WriteHeaderNotLogIn();
    ?>
    <?php 

        $form_token = md5(uniqid('auth', true));
        $_SESSION['form_token'] = $form_token;

        
    ?>
    <body>
        <div id="mainBody">
            
            <br>
            <h2>Please, enter registry information: </h2>
            <form id="regForm" method="POST" action="registration_done.php">
                
                <input class="regFormInput" name="name" type="text" placeholder="Name" required autofocus><br>
                <input class="regFormInput" name="second_name" type="text" placeholder="Second Name" required><br>
                <input class="regFormInput" name="user_name" type="text" placeholder="Login" required maxlength="16" minlength="6"><br>
                <input class="regFormInput" name="pass" type="password" placeholder="Password" required maxlength="16" minlength="6"><br>
                <input class="regFormInput" name="c_pass" type="password" placeholder="Confirm Password" required maxlength="16" minlength="6"><br>
                <input class="regFormInput" name="email" type="email" placeholder="Email" required><br>
                <input class="regFormInput" name="date_of_birth" type="date" placeholder="Date of Birth" required><br>
                <input class="regFormInput" name="tel" type="text" placeholder="Mob. #" required><br>
                
                <input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
                <div class="g-recaptcha" data-sitekey="6LeALw4TAAAAAGXaAZCIFFWeV-qqSc-N3UgPXax-"></div>
                <input type="submit" value="Submit" name="submit">
                
            </form>      
             
        </div>
           
        
    </body>
     <?php WriteFooterNotLogIn(); ?>
</html>

