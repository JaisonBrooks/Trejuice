<?php
/**
 * Created by PhpStorm.
 * User: jbrooks
 * Date: 12/2/14
 * Time: 9:50 PM
 */


function get_nav_items_photography() {
    $navitems[0] = array (
        "id" => "header_photography_nature",
        "href" => "/photography.php?type=nature",
        "text" => "Nature"
    );
    $navitems[1] = array (
        "id" => "header_photography_landspace",
        "href" => "/photography.php?type=landspace",
        "text" => "Landspace"
    );
    $navitems[2] = array (
        "id" => "header_photography_life",
        "href" => "/photography.php?type=life",
        "text" => "Life"
    );
    $navitems[4] = array (
        "id" => "header_photography_food",
        "href" => "/photography.php?type=food",
        "text" => "Food"
    );
    $navitems[5] = array (
        "id" => "header_photography_skateboarding",
        "href" => "/photography.php?type=skateboarding",
        "text" => "Skateboarding"
    );
    $navitems[6] = array (
        "id" => "header_photography_all",
        "href" => "/photography.php?type=all",
        "text" => "All"
    );
    $navitems[7] = array (
        "id" => "header_photography_upload",
        "href" => "/photography.php?type=upload",
        "text" => "Upload"
    );
    //Sort Array
    sort($navitems);
    return $navitems;
}
function get_nav_items_videos() {
    $navitems[0] = array (
        "id" => "header_videos_tredays",
        "href" => "/videos.php?type=tredays",
        "text" => "Tredays"
    );
    $navitems[1] = array (
        "id" => "header_videos_steadily_stacking",
        "href" => "/videos.php?type=steadily_stacking",
        "text" => "Steadily Stacking"
    );
    $navitems[2] = array (
        "id" => "header_videos_random",
        "href" => "/videos.php?type=random",
        "text" => "Random"
    );
    $navitems[3] = array (
        "id" => "header_videos_timelapses",
        "href" => "/videos.php?type=timelapses",
        "text" => "Timelapses"
    );
    $navitems[4] = array (
        "id" => "header_videos_nature",
        "href" => "/videos.php?type=nature",
        "text" => "Nature"
    );
    $navitems[5] = array (
        "id" => "header_videos_all",
        "href" => "/videos.php?type=all",
        "text" => "All"
    );
    //Sort array
    sort($navitems);
    return $navitems;
}
function get_nav_items_more() {
    $navitems[0] = array (
        "id" => "header_more_about",
        "href" => "/more.php?type=about",
        "text" => "About TreJuice"
    );
    $navitems[1] = array (
        "id" => "header_more_blog",
        "href" => "/more.php?type=blog",
        "text" => "Blog"
    );
    $navitems[2] = array (
        "id" => "header_more_contact",
        "href" => "/more.php?type=contact",
        "text" => "Contact"
    );
    $navitems[3] = array (
        "id" => "header_more_feedback",
        "href" => "/more.php?type=feedback",
        "text" => "Feedback"
    );
    #sort
    sort($navitems);
    return $navitems;
}
function get_footer_social_icons() {
    $socialitems[0] = array (
        "text" => "Facebook",
        "href" => "https://www.facebook.com/trevor.atkinson.16",
        "img" => "../img/fb.png"
    );
    $socialitems[1] = array (
        "text" => "Google +",
        "href" => "https://plus.google.com/110144197292589958296",
        "img" => "../img/google_plus.png"
    );
    $socialitems[2] = array (
        "text" => "Vimeo",
        "href" => "http://vimeo.com/user1741817",
        "img" => "../img/vimeo.png"
    );
    $socialitems[3] = array (
        "text" => "Youtube",
        "href" => "https://www.youtube.com/user/TreJuice09",
        "img" => "../img/youtube.png"
    );
    sort($socialitems);
    return $socialitems;
}

function get_photography_categories() {
    $categories[0] = array (
      "text" => "Food", "value" => "food"
    );
    $categories[1] = array (
        "text" => "Landspace", "value" => "landspace"
    );
    $categories[2] = array (
        "text" => "Life", "value" => "life"
    );
    $categories[3] = array (
        "text" => "Nature", "value" => "nature"
    );
    $categories[4] = array (
        "text" => "Skateboarding", "value" => "skateboarding"
    );
    sort($categories);
    return $categories;
}