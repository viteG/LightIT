<?php

function DbConnect()
{
    /*     * * connect to database ** */
    /*     * * mysql hostname ** */
    $mysql_hostname = 'localhost';

    /*     * * mysql username ** */
    $mysql_username = 'db_user';

    /*     * * mysql password ** */
    $mysql_password = '1234';

    /*     * * database name ** */
    $mysql_dbname = 'my_bd';
    $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
    /*     * * $message = a message saying we have connected ** */

    /*     * * set the error mode to excptions ** */
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

function LogIn()
{
    if (isset($_SESSION['user_id']))/*     * * check if the users is already logged in ** */
    {
        $message = 'Users is already logged in';
    } elseif (!isset($_POST['user_name'], $_POST['pass']))/*     * * check that both the username, password have been submitted ** */
    {
        $message = 'Please enter a valid username and password';
    } elseif (strlen($_POST['user_name']) > 20 || strlen($_POST['user_name']) < 4)/*     * * check the username is the correct length ** */
    {
        $message = 'Incorrect Length for Username';
    } elseif (strlen($_POST['pass']) > 20 || strlen($_POST['pass']) < 4)/*     * * check the password is the correct length ** */
    {
        $message = 'Incorrect Length for Password';
    } elseif (ctype_alnum($_POST['user_name']) != true)/*     * * check the username has only alpha numeric characters ** */
    {
        $message = "Username must be alpha numeric";
    } elseif (ctype_alnum($_POST['pass']) != true) /*     * * check the password has only alpha numeric characters ** */
    {
        $message = "Password must be alpha numeric";
    } else
    {
        /*         * * if we are here the data is valid and we can insert it into database ** */
        $username = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
        $pwd = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

        /*         * * now we can encrypt the password ** */
        $pwd = md5($pwd);

        try
        {

            $dbh = DbConnect();
            /*             * * prepare the select statement ** */

            $stmt = $dbh->prepare("SELECT id, img, name, second_name FROM userdata WHERE user_name=:username AND pass=:pass");

            /*             * * bind the parameters ** */
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pwd, PDO::PARAM_STR);

            /*             * * execute the prepared statement ** */
            $stmt->execute();

            /*             * * check for a result ** */
            $user_id = $stmt->fetch(PDO::FETCH_BOTH);

            /*             * * if we have no result then fail boat ** */
            if ($user_id == false)
            {
                $message = 'Login Failed';
            } else/*             * * if we do have a result, all is well ** */
            {
                $img = $user_id[1];
                $name = $user_id[2];
                $sname = $user_id[3];
                /*                 * * set the session user_id variable ** */
                $_SESSION['user_id'] = $user_id[0];
                $_SESSION['img'] = $img;
                $_SESSION['name'] = $name;
                $_SESSION['second_name'] = $sname;
            }
        } catch (Exception $e)
        {
            /*             * * if we are here, something has gone wrong with the database ** */
            $message = 'We are unable to process your request. Please try again later.';
        }
    }
    return $message;
}

function GetUserDetails()
{
    if (!isset($_SESSION['user_id']))/*     * * check if the users is not logged in ** */
    {
        $message = 'Users is not logged in';
    } else
    {
        try
        {
            $dbh = DbConnect();
            /*             * * prepare the select statement ** */

            $stmt = $dbh->prepare("SELECT img,user_name,date_of_birth,tel,email,name,second_name,sex,adress,city,country,family_status,specialty,reg_date FROM userdata WHERE id=:userid");

            /*             * * bind the parameters ** */
            $stmt->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_STR);

            /*             * * execute the prepared statement ** */
            $stmt->execute();

            /*             * * check for a result ** */
            $user = $stmt->fetch(PDO::FETCH_BOTH);

            return $user;
        } catch (Exception $e)
        {
            /*             * * if we are here, something has gone wrong with the database ** */
            $message = 'We are unable to process your request. Please try again later. '.$e;
        }
    }
}

function DeleteUserAccount()
{
    if (!isset($_SESSION['user_id']))/*     * * check if the users is not logged in ** */
    {
        $message = 'Users is not logged in';
    } else
    {
        try
        {
            $dbh = DbConnect();
            /*             * * prepare the select statement ** */

            $stmt = $dbh->prepare("DELETE FROM userdata WHERE id=:userid");

            /*             * * bind the parameters ** */
            $stmt->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_STR);

            /*             * * execute the prepared statement ** */
            $stmt->execute();
        } catch (Exception $e)
        {
            /*             * * if we are here, something has gone wrong with the database ** */
            $message = 'We are unable to process your request. Please try again later. '.$e;
        }
        return $message;
    }
}

function UpdateUserDetailsWithImage($image)
{
    if (!isset($_SESSION['user_id']))/*     * * check if the users is not logged in ** */
    {
        $message = 'Users is not logged in';
    } else
    {
        $specialty = NULL;
        $adress = NULL;
        $city = NULL;
        $country = NULL;
        $sex = NULL;
        $family_status = NULL;
        $message = '';

        if (isset($_POST['specialty']) && ctype_alnum($_POST['specialty']))
            $specialty = filter_var($_POST['specialty'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Speciality must be a combination of alphabetic and numeric characters';

        if (isset($_POST['adress']) && ctype_alnum($_POST['adress']))
            $adress = filter_var($_POST['adress'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Adress must be a combination of alphabetic and numeric characters';

        if (isset($_POST['city']) && ctype_alnum($_POST['city']))
            $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'City must be a combination of alphabetic and numeric characters';

        if (isset($_POST['country']) && ctype_alnum($_POST['country']))
            $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Coutry must be a combination of alphabetic and numeric characters';

        if (isset($_POST['sex']) && ctype_alnum($_POST['sex']))
            $sex = filter_var($_POST['sex'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Sex must be a combination of alphabetic and numeric characters';

        if (isset($_POST ['family_status']) && ctype_alnum($_POST['family_status']))
            $family_status = filter_var($_POST['family_status'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Family status must be a combination of alphabetic and numeric characters';

        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $second_name = filter_var($_POST['second_name'], FILTER_SANITIZE_STRING);
        $date_of_birth = filter_var($_POST['date_of_birth'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $tel = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);

        try
        {
            $dbh = DbConnect();
            /*             * * prepare the select statement ** */

            $stmt = $dbh->prepare("UPDATE userdata SET img=:img, date_of_birth=:dob, tel=:tel, name=:name, second_name=:sname, sex=:sex, adress=:adr, city=:city, country=:country, family_status=:fam, specialty=:spec WHERE id=:userid");

            /*             * * bind the parameters ** */
            $stmt->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_STR);

            $stmt->bindParam(':dob', $date_of_birth, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':sname', $second_name, PDO::PARAM_STR);

            $stmt->bindParam(':sex', $sex, PDO::PARAM_STR);
            $stmt->bindParam(':adr', $adress, PDO::PARAM_STR);
            $stmt->bindParam(':city', $city, PDO::PARAM_STR);
            $stmt->bindParam(':country', $country, PDO::PARAM_STR);
            $stmt->bindParam(':fam', $family_status, PDO::PARAM_STR);
            $stmt->bindParam(':spec', $specialty, PDO::PARAM_STR);

            $stmt->bindParam(':img', $image, PDO::PARAM_STR);

            /*             * * execute the prepared statement ** */
            $stmt->execute();
            
            $_SESSION['img'] = $image;
        } catch (Exception $e)
        {
            /*             * * if we are here, something has gone wrong with the database ** */
            $message = 'We are unable to process your request. Please try again later. '.$e;
        }
        return $message;
    }
}

function UpdateUserDetails()
{
    if (!isset($_SESSION['user_id']))/*     * * check if the users is not logged in ** */
    {
        $message = 'Users is not logged in';
    } else
    {
        $specialty = NULL;
        $adress = NULL;
        $city = NULL;
        $country = NULL;
        $sex = NULL;
        $family_status = NULL;
        $message = '';

        if (isset($_POST['specialty']) && ctype_alnum($_POST['specialty']))
            $specialty = filter_var($_POST['specialty'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Speciality must be a combination of alphabetic and numeric characters';

        if (isset($_POST['adress']) && ctype_alnum($_POST['adress']))
            $adress = filter_var($_POST['adress'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Adress must be a combination of alphabetic and numeric characters';

        if (isset($_POST['city']) && ctype_alnum($_POST['city']))
            $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'City must be a combination of alphabetic and numeric characters';

        if (isset($_POST['country']) && ctype_alnum($_POST['country']))
            $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Coutry must be a combination of alphabetic and numeric characters';

        if (isset($_POST['sex']) && ctype_alnum($_POST['sex']))
            $sex = filter_var($_POST['sex'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Sex must be a combination of alphabetic and numeric characters';

        if (isset($_POST ['family_status']) && ctype_alnum($_POST['family_status']))
            $family_status = filter_var($_POST['family_status'], FILTER_SANITIZE_STRING);
        else
            $message = $message . 'Family status must be a combination of alphabetic and numeric characters';

        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $second_name = filter_var($_POST['second_name'], FILTER_SANITIZE_STRING);
        $date_of_birth = filter_var($_POST['date_of_birth'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $tel = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);

        try
        {
            $dbh = DbConnect();
            /*             * * prepare the select statement ** */

            $stmt = $dbh->prepare("UPDATE userdata SET date_of_birth=:dob, tel=:tel, name=:name, second_name=:sname, sex=:sex, adress=:adr, city=:city, country=:country, family_status=:fam, specialty=:spec WHERE id=:userid");

            /*             * * bind the parameters ** */
            $stmt->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_STR);

            $stmt->bindParam(':dob', $date_of_birth, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':sname', $second_name, PDO::PARAM_STR);

            $stmt->bindParam(':sex', $sex, PDO::PARAM_STR);
            $stmt->bindParam(':adr', $adress, PDO::PARAM_STR);
            $stmt->bindParam(':city', $city, PDO::PARAM_STR);
            $stmt->bindParam(':country', $country, PDO::PARAM_STR);
            $stmt->bindParam(':fam', $family_status, PDO::PARAM_STR);
            $stmt->bindParam(':spec', $specialty, PDO::PARAM_STR);

            /*             * * execute the prepared statement ** */
            $stmt->execute();
        } catch (Exception $e)
        {
            /*             * * if we are here, something has gone wrong with the database ** */
            $message = 'We are unable to process your request. Please try again later. '.$e;
        }
        return $message;
    }
}

function UpdateUserPassword()
{
    if (!isset($_SESSION['user_id']))/*     * * check if the users is not logged in ** */
    {
        $message = 'Users is not logged in';
    } else
    {
        $pwd1 = md5(filter_var($_POST['ch_pass'], FILTER_SANITIZE_STRING));
        $pwd2 = md5(filter_var($_POST['ch_c_pass'], FILTER_SANITIZE_STRING));
        $old_pwd = md5(filter_var($_POST['old_pass'], FILTER_SANITIZE_STRING));

        try
        {
            $dbh = DbConnect();
            /*             * * prepare the select statement ** */

            $stmt = $dbh->prepare("UPDATE userdata SET pass=:pwd1 WHERE id=:userid AND pass=:old_pwd AND :pwd1=:pwd2");

            /*             * * bind the parameters ** */
            $stmt->bindParam(':userid', $_SESSION['user_id'], PDO::PARAM_STR);

            $stmt->bindParam(':pwd1', $pwd1, PDO::PARAM_STR);
            $stmt->bindParam(':pwd2', $pwd2, PDO::PARAM_STR);
            $stmt->bindParam(':old_pwd', $old_pwd, PDO::PARAM_STR);

            /*             * * execute the prepared statement ** */
            $stmt->execute();
        } catch (Exception $e)
        {
            /*             * * if we are here, something has gone wrong with the database ** */
            $message = 'We are unable to process your request. Please try again later. '.$e;
        }
        return $message;
    }
}

?>