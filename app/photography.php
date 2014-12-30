<?php //require_once '../inc/authenticate.php';
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/2/14
 * Time: 10:23 PM
 */
$pageTitle = "Photography";
include "../inc/arrays.php";
include "../inc/header.php";
include "../inc/uielements.php";
//require_once '../inc/database.php';

if (isset($_GET)) {
    if (isset($_GET["type"])) {
        global $TYPE; $TYPE = $_GET["type"];
        echo get_starting_card_dark_html();
        echo get_starting_card_dark_body_html();
        echo '<h1>' . ucfirst($TYPE) .'</h1>';
//        $sql = $CONNECTION->prepare('SELECT `id`,`user_id`,`url`,`title`,`full_name`,`posted_date`,`description`, `category` FROM `photos` WHERE `category` = "' . $TYPE . '"');
//        $sql->execute();
//        $sql->bind_result($id,$user_id,$url,$title,$full_name,$posted_date,$description,$category);
//        $sql->fetch();
//        $sql->close();







        if ($TYPE == 'upload') {?>






        <form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Upload new Photo</legend>
                <div class="form-group">
                    <label for="userfile" class="col-lg-2 control-label">File</label>
                    <div class="col-lg-10">
                        <input type="text" readonly="" class="form-control input-text" placeholder="Select an image">
<!--                        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />-->
                        <input type="file" id="userfile" name="userfile" multiple="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control input-text" id="title" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control input-text" rows="2" id="description" name="description"></textarea>
<!--                        <span class="help-block">Describe the photo you are uploading, whats it about, who's in it, etc.</span>-->
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Category</label>
                    <div class="col-lg-10">
                        <select name="category" class="form-control input-text" id="select">
                            <?php foreach (get_photography_categories() as $photo) {
                                    echo '<option value="' . $photo['value'] . '">' . $photo['text'] . '</option>';
                             } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>


        <?php  } ?>







<?php
//        echo $id . "\n";
//        echo $user_id. "\n";
//        echo $url. "\n";
//        echo $friendly_name . "\n";
//        echo $full_name . "\n";
//        echo $posted_date . "\n";
//        echo $description . "\n";
//        echo $category . "\n"; ?>

<!--        <form class="form-horizontal" action="../inc/upload.php" method="post" enctype="multipart/form-data">-->
<!---->
<!--            <div class="form-control">-->
<!--                <label for="fileToUpload" class="col-lg-2 control-label">Select Image</label>-->
<!--                <div class="col-lg-10">-->
<!--                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-control">-->
<!--                <label for="friendly_name" class="col-lg-2 control-label">Friendly Name</label>-->
<!--                <div class="col-lg-10">-->
<!--                    <input class="form-control" type="text" name="friendly_name" id="friendly_name" />-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-control">-->
<!--                <label for="description" class="col-lg-2 control-label">Description</label>-->
<!--                <div class="col-lg-10">-->
<!--                    <input class="form-control" type="text" name="description" id="description" />-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-control">-->
<!--                <label for="category" class="col-lg-2 control-label">Category</label>-->
<!--                <div class="col-lg-10">-->
<!--                    <input class="form-control" type="text" name="category" id="category" />-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <input type="hidden" name="user_id" id="user_id" value="--><?php //echo $logged_user_id;?><!--" />-->
<!--            <input type="submit" value="Upload Image" name="submit">-->
<!--        </form>-->
<!---->
<!--        --><?php
        echo get_ending_card_body_html();
        echo get_ending_card_html();
    }
}



include "../inc/footer.php";