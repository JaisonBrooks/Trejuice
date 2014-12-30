<?php
/**
 * Created by Jaison Brooks.
 * User: jbrooks
 * Date: 11/5/14
 * Time: 7:24 AM
 */

include("head.php");
$REV = 'Alpha 1.0';
?>
<header class="navbar-fixed-top">
        <div class="navbar <?php if ($logged_user_id == 1){echo 'navbar-admin';}else {echo 'navbar-default';}?>">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="navbar-brand" class="navbar-brand" href="../app/index.php"><?php echo $appName ?></a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                        <li class="<?php if ($pageTitle == 'Home') { echo "active"; } ?>"><a href="../app/index.php">Home</a></li>
                    <li class="dropdown <?php if ($pageTitle == 'Photography') { echo "active"; } ?>">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Photography <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach (get_nav_items_photography() as $item) {
                                echo '<li id="'.$item["id"].'"><a href="../app'.$item["href"].'">'.$item["text"].'</a></li>';
                            }?>
                        </ul>
                    </li>
                    <li class="dropdown <?php if ($pageTitle == 'Videos') { echo "active"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Videos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach (get_nav_items_videos() as $item) {
                                echo '<li id="'.$item["id"].'"><a href="../app'.$item["href"].'">'.$item["text"].'</a></li>';
                            }?>
                        </ul>
                    </li>
                        <li class="dropdown <?php if ($pageTitle == 'More') { echo "active"; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php
                                foreach (get_nav_items_more() as $item) {
                                    echo '<li id="'.$item["id"].'"><a href="../app'.$item["href"].'">'.$item["text"].'</a></li>';
                                }?>
                            </ul>
                        </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php if ($authenticated) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if (isset($logged_user_name)) { echo '<small>Signed In as </small><strong>' . $logged_user_name . '</strong>'; } else { echo "Not Signed In"; } ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="../app/change_password.php">Change Password</a></li>
                                <li><a href="../app/logout.php">Logout</a></li>
                                <li class="nav-divider"></li>
                                <li><a href="#" class="text-version">Version: <?php echo $REV; ?></a></li>
                            </ul>
                        </li>
                  <?php  } else { ?>
                        <li><a href="#" class="text-version">Version: <?php echo $REV; ?></a></li>
                   <?php }?>
                </ul>
            </div>
        </div>
    </div>
</header>