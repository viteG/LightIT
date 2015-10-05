<?php
include_once 'framework\template.php';
PrivatePageInit();
include_once 'framework\db.php';
$userData = GetUserDetails();
?>
<!DOCTYPE html>
<html>
    <?php WriteHeader(); ?>

    <body>
        <?php echo $message; ?>
        <div class="row" id="cabinetBody">
            <div >
                <label class="cabdata" for="user_name">Login: <?php echo $userData['user_name'] ?></label><br>
                <label class="cabdata" for="email">Email: <?php echo $userData['email'] ?></label><br>
                <label class="cabdata" for="reg_date">Registry date: <?php echo $userData['reg_date'] ?></label><br><br>

                <form id="cabForm" action="cabinet_done.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <br>
                    <label for="name">Name*: </label>
                    <input class="cabinetFormInput" name="name" type="text" placeholder="Name" value="<?php echo $userData['name'] ?>" autofocus required>
                    <label for="second_name">Second Name*: </label>
                    <input class="cabinetFormInput" name="second_name" type="text" placeholder="Second Name" value="<?php echo $userData['second_name'] ?>" required>
                    <label for="specialty">Specialty: </label>
                    <input class="cabinetFormInput" name="specialty" type="text" placeholder="Specialty" value="<?php echo $userData['specialty'] ?>">

                    <label for="date_of_birth">Date of Birth*: </label>
                    <input class="cabinetFormInput" name="date_of_birth" type="date" placeholder="Date of Birth" value="<?php echo $userData['date_of_birth'] ?>" required>
                    <label for="sex">Sex: </label>
                    <input class="cabinetFormInput" name="sex" type="text" placeholder="Sex" value="<?php echo $userData['sex'] ?>">

                    <label for="family_status">Family status: </label>
                    <input class="cabinetFormInput" name="family_status" type="text" placeholder="Family status" value="<?php echo $userData['family_status'] ?>">
                    <label for="tel">Mob. #*: </label>
                    <input class="cabinetFormInput" name="tel" type="text" placeholder="Mob. #" value="<?php echo $userData['tel'] ?>" required>
                    <label for="adress">Adress: </label>
                    <input class="cabinetFormInput" name="adress" type="text" placeholder="Adress" value="<?php echo $userData['adress'] ?>">
                    <label for="city">City: </label>
                    <input class="cabinetFormInput" name="city" type="text" placeholder="City" value="<?php echo $userData['city'] ?>">
                    <label for="country">Country: </label>
                    <input class="cabinetFormInput" name="country" type="text" placeholder="Country" value="<?php echo $userData['country'] ?>">

                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                    <input type="hidden" name="type" value="general">
                    <input name="submit" class="cab_b btn btn-default" type="submit" value="Submit">
                </form>
                <br>
                <form id="cab_b_pwd" action="cabinet_done.php" method="post">
                    <label for="old_pass">Old Password: </label>
                    <input class="cabinetFormInput" name="old_pass" type="password" placeholder="Old Password"  maxlength="16" minlength="6">
                    <label for="ch_pass">New Password: </label>
                    <input class="cabinetFormInput" name="ch_pass" type="password" placeholder="New Password"  maxlength="16" minlength="6">
                    <label for="ch_c_pass">Confirm New Password: </label>
                    <input class="cabinetFormInput" name="ch_c_pass" type="password" placeholder="Confirm New Password" maxlength="16" minlength="6">
                    <input type="hidden" name="type" value="password">
                    <input name="submit" class="cab_b btn btn-default" type="submit" value="Change password">
                </form>
                <br>
                <form id="cab_b_del" action="cabinet_done.php" method="post">
                    <input type="hidden" name="type" value="delete">
                    <input name="submit" class="cab_b btn btn-default" type="submit" value="Delete profile">
                </form>
            </div>
        </div>

        <script src="js/script.js"></script>
    </body>
    <?php WriteFooter(); ?>
</html>
