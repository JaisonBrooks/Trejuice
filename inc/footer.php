<?php
/**
 * User: jbrooks
 * Date: 11/5/14
 * Time: 7:24 AM
 */

date_default_timezone_set('America/Los_Angeles');

?>

<footer>
    <div class="footer">
        <div class="container">
            <div class="row row-centered">
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <h5 class="footer-headings text-muted"><strong>Extra Things</strong></h5>
                    <a href="../app/login.php?tag=footer" class="link-admin">Admin</a>
                    <a href="../app/login.php?tag=footer" class="link-admin">Maybe</a>
                    <a href="../app/login.php?tag=footer" class="link-admin">Some</a>
                    <a href="../app/login.php?tag=footer" class="link-admin">More</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4">
                    <h5 class="footer-headings text-muted"><strong>Follow TREJUICE</strong></h5>
                    <div class="row row-centered">
                        <?php
                        foreach (get_footer_social_icons() as $item) {?>
                            <div class="col-lg-3 col-md-3 col-social">
                                <a href="<?php echo $item['href'] ?>" target="_blank">
                                    <img src="<?php echo $item['img'] ?>" alt="<?php echo $item['text'] ?>" class="social-icon">
                                </a>
                            </div>

                       <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <h5 class="footer-headings text-muted"><strong>Site Credit</strong></h5>
                    <h6 class="text-muted ">Copyright &copy; <?php echo date('Y') ?> Jaison Brooks<br>All rights reserved </h6>
                    <h6 class="text-muted ">Copyright &copy; <?php echo date('Y') ?> Trevor Atkinson<br>All rights reserved </h6>

                </div>

            </div>
        </div>
  </div>
</footer>

<?php include("js_scripts.php") ?>
</body>
</html>