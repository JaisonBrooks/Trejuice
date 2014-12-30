<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/2/14
 * Time: 10:55 PM
 */
echo " You made it the login page";

/** INCLUDES */
include "../inc/arrays.php";
include "../inc/header.php";
include "../inc/uielements.php";
include "../inc/sql_auth.php";

/** VARIABLES */
$username = null; $password = null;
$pageTitle = "Login";
date_default_timezone_set('America/Los_Angeles');
$sql = new sql_auth();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require('../inc/database.php');

    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = $CONNECTION->prepare($sql->get_user_auth_sql_str());
        $query->bind_param("ss", $username, $password);
        $query->execute();
        $query->bind_result($logged_user_id, $logged_user_email, $logged_user_name);
        $query->fetch();
        $query->close();

        if(!empty($logged_user_id)) {
            session_start();
            $session_key = session_id();
            $query = $CONNECTION->prepare($sql->get_sessions_push_sql_str());
            $query->bind_param("isss", $logged_user_id, $session_key, $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'] );
            $query->execute();
            $query->close();

            header('Location: index.php?welcome=true');
        }
        else {
            header('Location: login.php?status=failed');
        }
    } else {
        header('Location: login.php?status=failed');
    }
} else {

    /** UI STARTS */
    include('../inc/header.php');
    ?>
    <section>
        <div class="container">
            <div class="row row-centered">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-centered">
                    <div class="form-wrap well well-trans">
                        <h1>Log In to continue</h1>
                        <hr>
                        <?php if ($_GET["status"] == "failed") { ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Uh-Oh!</strong> The username and/or password combination you entered was incorrect.<strong> Please try again</strong>
                            </div>
                        <?php } ?>
                        <form class="form-horizontal" id="login" method="post">
                            <div class="form-group">
                                <label class="col-lg-3 control-label form-label-heading" for="username">Email </label>
                                <div class="col-lg-9">
                                    <input class="form-control input-text-size" id="username" name="username" type="email"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label form-label-heading" for="password">Password </label>
                                <div class="col-lg-9">
                                    <input class="form-control input-text-size" id="password" name="password" type="password"
                                           required>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" onclick="showPassword()"> Show Password
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
                                    <button class="btn btn-primary btn-lg" type="submit">Login</button>
                                    <a class="btn btn-warning btn-lg" data-toggle="modal" data-target=".forget-modal" type="button">Forgot Password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h3 class="modal-title">Recover Password</h3>
                </div>
                <form action="forgot_password.php" method="post" role="form">
                    <div class="modal-body">
                        <label for="email">What's your Email?</label>
                        <input type="email" name="email" id="email" class="form-control"
                               autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                    <input type="hidden" name="origin" value="login.php">
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <script>
        function showPassword() {
            var key_attr = $('#password').attr('type');
            if (key_attr != 'text') {
                $('#password').attr('type', 'text');

            } else {
                $('#password').attr('type', 'password');
            }
        }
    </script>
<?php include('../inc/footer.php');

}?>

