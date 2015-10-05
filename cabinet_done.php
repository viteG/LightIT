<?php
include_once 'framework\template.php';
PrivatePageInit();

include_once 'framework\db.php';
$type = $_POST['type'];
//$message = $type;
if ($type === "delete")
{
    $message = DeleteUserAccount();

    $message = "Profile was deleted!" . $message;
    session_unset();
    session_destroy();
    header('Location: index.php');
} elseif ($type === "password")
{
    if (isset($_POST['old_pass']) && isset($_POST['ch_pass']) && isset($_POST['ch_c_pass']))
    {
        if (!ctype_alnum($_POST['ch_pass']) || !ctype_alnum($_POST['ch_c_pass']))
            $message2 = 'New password must be a combination of alphabetic and numeric characters';
        elseif (!ctype_alnum($_POST['old_pass']))
            $message2 = 'Old paccword must be a combination of alphabetic and numeric characters';
        elseif (strlen( $_POST['ch_pass']) > 16 || strlen($_POST['ch_pass']) < 6)
            $message2 = 'Incorrect ength for new password';
        elseif (strlen( $_POST['ch_c_pass']) > 16 || strlen($_POST['ch_c_pass']) < 6)
            $message2 = 'Incorrect ength for new confirm password';
        elseif (strlen( $_POST['old_pass']) > 16 || strlen($_POST['old_pass']) < 6)
            $message2 = 'Incorrect ength for old password';
        elseif (($_POST['ch_pass']) !== ($_POST['ch_c_pass']))
            $message2 = 'Incorrect confirm password';
        else
            $message2 = UpdateUserPassword();
    }
} elseif ($type === "general")
{
    if (!isset($_POST['name'], $_POST['second_name'], $_POST['date_of_birth'], $_POST ['tel'], $_POST['specialty']))
    {
        $message = 'Please fill all required data';
    } elseif (($_POST['date_of_birth']) != true)
    {
        $message = 'Invalid birth date type';
    } elseif (ctype_alnum($_POST['name']) != true)
    {
        $message = 'Name must be a combination of alphabetic and numeric characters';
    }  elseif (ctype_alnum($_POST['second_name']) != true)
    {
        $message = 'Second name must be a combination of alphabetic and numeric characters';
    } elseif (ctype_digit($_POST['tel']) != true)
    {
        $message = 'Tel.# must be a combination of decimal digits';
    } else
    {

//phopo upload
        if ($_FILES['fileToUpload']['size'] != 0 && $_FILES['cover_image']['error'] == 0)
        {
            $target_dir = "photos/";
            $imageFileType = pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
            $file_name = com_create_guid() . '.' . $imageFileType;
            $target_file = $target_dir . $file_name;
            $uploadOk = 1;

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false)
            {
                $message3 = "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else
            {
                $message3 = "File is not an image.";
                $uploadOk = 0;
            }
// Check if file already exists
            if (file_exists($target_file))
            {
                $message3 = "Sorry, file already exists.";
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["fileToUpload"]["size"] > 5000000)
            {
                $message3 = "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
            {
                $message3 = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0)
            {
                $message3 = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else
            {
                if (move_uploaded_file($_FILES["fileToUpload"] ["tmp_name"], $target_file))
                {
                    $message3 = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                } else
                {
                    $message3 = "Sorry, there was an error uploading your file.";
                }
            }
            UpdateUserDetailsWithImage($file_name);
        } else
            UpdateUserDetails();
    }
}
?>
<!DOCTYPE html>
<html>
    <?php WriteHeader(); ?>
    <body>
        <div class="row" id="cabinetDoneBody">

            <div id="Thanks">
                <?php
                echo '<p>' . $message . '</p>';
                echo '<p>' . $message2 . '</p>';
                echo '<p>' . $message3 . '</p>';
                echo '<h2>Your profile data changed!</h2>';
                ?>
            </div>
            <div>
                <a href="cabinet.php" class="btn btn-default">Back to cabinet</a>
            </div>
        </div>

    </div>

</body>
<?php WriteFooter(); ?> 
</html>