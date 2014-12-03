<?php
/**
 * Created by Jaison Brooks.
 * User: jbrooks
 * Date: 11/5/14
 * Time: 7:24 AM
 */

include("head.php");
//include("arrays.php");
$REV = 'Alpha 1.0';
$user_id = 0;
$authenticated = true;

?>
<header class="navbar-fixed-top">
    <?php if ($user_id == 999) {
        echo '<div class="navbar navbar-admin">';
    } else { echo ' <div class="navbar navbar-default">';
    }?>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="navbar-brand" class="navbar-brand" href="../index.php"><?php echo $appName ?></a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                        <li class="<?php if ($pageTitle == 'Home') { echo "active"; } ?>"><a href="../index.php">Home</a></li>
                    <li class="dropdown <?php if ($pageTitle == 'Photography') { echo "active"; } ?>">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Photography <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach (get_nav_items_photography() as $item) {
                                echo '<li id="'.$item["id"].'"><a href="'.$item["href"].'">'.$item["text"].'</a></li>';
                            }?>
                        </ul>
                    </li>
                    <li class="dropdown <?php if ($pageTitle == 'Videos') { echo "active"; } ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Videos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach (get_nav_items_videos() as $item) {
                                echo '<li id="'.$item["id"].'"><a href="'.$item["href"].'">'.$item["text"].'</a></li>';
                            }?>
                        </ul>
                    </li>
                        <li class="dropdown <?php if ($pageTitle == 'More') { echo "active"; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php
                                foreach (get_nav_items_more() as $item) {
                                    echo '<li id="'.$item["id"].'"><a href="'.$item["href"].'">'.$item["text"].'</a></li>';
                                }?>
                            </ul>
                        </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php if ($authenticated) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if (isset($LOGGED_IN_USERFULLNAME)) { echo '<small>Signed In as </small><strong>' . $LOGGED_IN_USERFULLNAME . '</strong>'; } else { echo "Not Signed In"; } ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Change Password</a></li>
                                <li><a href="#">Logout</a></li>
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