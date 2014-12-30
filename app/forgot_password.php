<?php
/**
 * User: jbrooks
 * Date: 11/12/14
 * Time: 7:16 AM
 */

/** INCLUDES */
include 'inc/helpers/global_v.php';
include 'inc/ui/ui.php';
include "database.php";
include 'inc/helpers/sql/sql_auth.php';
include 'inc/helpers/mail.php';

/** VARIABLES */
$pageTitle = "Forgot your Password";
$sql = new sql_auth();


function send_new_password_email($pEMAIL, $pNEWPASSWORD) {
    if(isset($pEMAIL) and (isset($pNEWPASSWORD))) {
        $SUBJECT = "Your password has been reset";
        $MESSAGE = "Your temporary password is " . "\n\n" . $pNEWPASSWORD . "\n\n". "Login @ http://esvtimecardenv-6kpmvcbdam.elasticbeanstalk.com";
        send_basic_email($pEMAIL,$SUBJECT,$MESSAGE);
    }
}
function generateNewPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

/** UI STARTS */
include "inc/ui/header.php";

if (isset($_POST)) {

    $EMAIL = $_POST["email"];
    $ORIGIN = $_POST["origin"];

    if (isset($EMAIL)) {

        $QUERY = $CONNECTION->prepare($sql->get_user_email_exist_sql_str());
        $QUERY->bind_param("s", $EMAIL);
        $QUERY->execute();
        $QUERY->bind_result($rEMAIL);
        $QUERY->fetch();
        $QUERY->close();
        if (is_null($rEMAIL)) {
            echo ui_get_container_well_start_html(); ?>
            <h1>Your email was not found! :(</h1>
            <br/>
            <h4>You may have entered your email incorrectly and this is why your seeing this error. If you entered the correct email, then please contact your Administrator for further instructions.</h4>
            <br/>
            <form action="index.php?reset_pswd=failed"><button class="btn btn-warning">Try Again</button></form>
           <?php echo ui_get_container_well_end_html();

        } else {

            $NEWPASSWORD = generateNewPassword();
            $SQL = $SQL->get_user_password_reset_sql_str($EMAIL, $NEWPASSWORD);
            if ($CONNECTION->query($SQL) === TRUE) {
                send_new_password_email($EMAIL,$NEWPASSWORD);
                echo ui_get_container_well_start_html(); ?>
                <h1>Great Success!</h1>
                    <br/>
                <h4>Your password has been reset and your new password has been sent to (<?php echo $EMAIL; ?>)</h4>
                <form action="index.php?reset_pswd=success"><button class="btn btn-success">Go Back to Login</button></form>
             <?php  echo ui_get_container_well_end_html();
            } else {
                echo ui_get_container_well_start_html(); ?>
                <h1>Failed to send reset email :(</h1>
                <br/>
                    <h4>There was a issue resetting your password, Please try again :( </h4>
                <form action="index.php?reset_pswd=failed"><button class="btn btn-warning">Try Again</button></form>
                <?php echo ui_get_container_well_end_html();
            }
            $CONNECTION->close();
        }
    }
}

include "inc/ui/footer.php";