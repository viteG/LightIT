<?php
session_start();
if (!isset($_SESSION['user_id']))
{
    include_once 'framework\db.php';
    $message = LogIn();
    if ($message)
        header('Location: index.php');       //TODO: pass message to index to show error type in future
}
include_once 'framework\template.php';
?>
<!DOCTYPE html>
<html>
    <?php WriteHeader(); ?>

    <body>
        <?php WriteResumePdfStyle(); ?>
        <div class="row" id="resumeBody">
            <?php WriteResume();?>
            <form method="POST" action="cabinet.php">
                <input type="hidden" value="<?php echo $user_id; ?>">
            </form>
    </body>

<?php WriteFooter(); ?>
</html>