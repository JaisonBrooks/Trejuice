<?php require_once '../inc/authenticate.php';
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 11/12/14
 * Time: 2:20 PM
 */

/** INCLUDES */

/** VARIABLES */

if(count($_POST)>0) {

        include '../inc/sql_general.php';
        $sql = new sql();

        if ($_POST["current"]) {
            $CURRENT = $_POST["current"];
        }
        if ($_POST["newer"]) {
            $NEWER = $_POST["newer"];
        }
        if ($_POST["confirm"]) {
            $CONFIRM = $_POST["confirm"];
        }

        if (isset($CURRENT) and isset($NEWER) and isset($CONFIRM)) {

//            $QUERY = $CONNECTION->prepare($sql->get_validate_pass_via_pass_sql_str());
//            $QUERY->bind_param("ss", $CURRENT,$logged_user_id);
//            $QUERY->execute();
//            $QUERY->bind_result($rUSER_CHANGE_PASSWORD_COUNTER);
//            $QUERY->fetch();
//            $QUERY->close();

            if ($NEWER == $CONFIRM) {

                if ($CONNECTION->query($sql->get_update_pass_sql_str($NEWER,$logged_user_id)) === TRUE) {

                    //if ($rUSER_CHANGE_PASSWORD_COUNTER == 1) {
                    //    header("Location: index.php?welcome=true");
                    //} else {
                        header("Location: index.php?pass_reset=true");
                    //}

                } else {
                    header("Location: change_password.php?status=failed_updating");
                    //echo "Problem updating password";
                }

            } else {
                if ($NEWER != $CONFIRM) {
                    header("Location: change_password.php?status=passwords_didnt_match");
                } else {
                    header("Location: change_password.php?status=wrong_password");
                }
            }
        }

} else {

    $pageTitle = "Update password";

    /** UI STARTS */
//    include "../inc/uielements.php";
    include "../inc/arrays.php";
    include "../inc/header.php"; ?>
    <div class="container">
        <div class="row row-centered">
            <div class="col-xs-12 col-md-8 col-centered">
                <div class="form-wrap well">
                    <h1>Update your password</h1>
                    <hr>
                        <?php if ($_GET['status'] == "wrong_password") { ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Error!</strong> The password you entered did not match our records.<strong> Please try again</strong>
                        </div>
                        <?php } ?>
                        <?php if ($_GET['status'] == "passwords_didnt_match") { ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>OOPS!</strong> The new passwords you entered did not match each other.<strong> Please try again</strong>
                            </div>
                        <?php } ?>

                        <?php if(isset($message)) { ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Uh-Oh!</strong><?php echo $message ?>
                                    </div>
                       <?php  } ?>
                    <form class="form-horizontal" method="post" onsubmit="return onSubmit()">
                    <div class="form-group" id="form_current">
                            <label for="current_password"  class="col-lg-4 control-label form-label-heading">Current Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control input-text-size" id="current" name="current" >
                            </div>
                          </div>
                    <div class="form-group" id="form_new">
                            <label for="new_password"  class="col-lg-4 control-label form-label-heading">New Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control input-text-size"  id="newer" name="newer" >
                            </div>
                          </div>
                    <div class="form-group" id="form_confirm">
                            <label for="confirm_password" class="col-lg-4 control-label form-label-heading">Confirm Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control input-text-size" id="confirm" name="confirm" >
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" onclick="showPasswords()"> Show Passwords
                                    </label>
                                </div>
                            </div>
                          </div>

                    <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-3">
                                <button type="submit" name="submit"  class="btn btn-primary btn-lg">Submit</button>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }
?>
<?php include "../inc/footer.php"; ?>
<script>
    function showPasswords() {
        var key_attr1 = $('#newer').attr('type');
        var key_attr2 = $('#confirm').attr('type');
        var key_attr3 = $('#current').attr('type');
        if ((key_attr1 != 'text') && (key_attr2 != 'text') && (key_attr3 != 'text')) {
            $('#confirm').attr('type', 'text');
            $('#newer').attr('type', 'text');
            $('#current').attr('type', 'text');
        } else {
            $('#confirm').attr('type', 'password');
            $('#newer').attr('type', 'password');
            $('#current').attr('type', 'password');
        }
    }
</script>
<script>
    function onSubmit() {
        var output;
        if (!$("#current").val()) {
            $("#form_current").addClass("has-warning");
            output = false;
        }
        if (!$("#newer").val()) {
            $("#form_new").addClass("has-warning");
            output = false;
        }
        if (!$("#confirm").val()) {
            $("#form_confirm").addClass("has-warning");
            output = false;
        }
//        if ($("#newer").val() != $("#confirm").val()) {
//            console.log("Doesnt match");
//            output = false;
//        }
        return output;
    }
</script>




