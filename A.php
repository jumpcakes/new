<?php 
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); 
?>

<div class="container container--main" <?php echo $is_review ? 'itemscope itemtype="http://data-vocabulary.org/Review"' : ''; ?>>

    <div class="grid">

       
          
<?php if(in_category("blog-posts")){ ?>
 <div class="grid__item  main  float--left  lap-and-up-two-thirds">
          <div id="trendCatTitle"><div class="redBg"><?php the_title(); ?></div></div>

         
            <?php the_content(); ?>
        </div>
        <div class="grid__item  one-third  palm-one-whole  sidebar">
                <?php get_sidebar(); ?>
            </div>
            <?php
         } else {
            ?>
             <div class="grid__item  main  float--left  lap-and-up-two-thirds">

        <div id="trendCatTitle"><div class="redBg"><?php the_title(); ?></div></div>

            <div class="featured-image-2">
            <div class="quote"><?php the_content(); ?></div>
            <?php
            
          
            


          if( class_exists( 'kdMultipleFeaturedImages' ) ) {
            kd_mfi_the_featured_image( 'featured-image-2', 'post', 'full' );
            }
            ?>
        </div>
        <div class="catLinks">
            <span class="bttn1">Button1</span>
            <a href="#" class="scroll1">Link1</a>
            <a href="#" class="scroll2">Link2</a>
            <a href="#" class="scroll3">Link3</a>
            <a href="#" class="scroll4">Link4</a>

           <img src="/wp-content/uploads/2014/02/scroll.jpg">
        </div>
        </div>
        <div class="rightContent">
     <img style="width:100%;" src="/wp-content/themes/bucket/images/happyhouradd.jpg">

        <?php 
$pageTitle = NULL;
$pageTitle = get_the_title();

                 trend_feed($pageTitle);
            
            ?>
        </div>

  <div id="businessLogos">
    <div class="businessLabel"><div class="businssCat"><?php the_title(); ?></div></div>
<?php 

$userList = "";
$sql = "SELECT users.username, users.avatar, users.country, users.website from users LEFT JOIN trend_cats_users ON users.id=trend_cats_users.user_id WHERE trend_cats_users.page_name='$pageTitle'";
include_once('php_includes/db_conx.php');
$user_friends_query = mysqli_query($db_conx, $sql);
$numrows = mysqli_num_rows($user_friends_query);
if($numrows > 0){
    while($row = mysqli_fetch_array($user_friends_query, MYSQLI_ASSOC)) {
        $friend_username = $row["username"];
        $avatar = $row['avatar'];
        $category = $row['country'];
        $website = $row['website'];
        if($avatar != ""){
            $friend_pic = '/user/'.$friend_username.'/'.$avatar.'';
        }
        else {
            $friend_pic = '/images/avatardefault.jpg';
        }
        $userList .= '<div class="userAccounts"><a href="/user.php?u='.$friend_username.'"><img id="friendImages" src="'.$friend_pic.' "></a>
        <div class="infoCon"><div class="userInfo">'.$category.'</div><div class="bizTitle">'.$friend_username.'</div></div></div>';
     

    }
    
 
}
else {
    $userList = "Stay Tuned !";
}
echo $userList;
?>
</div>
<?php 
}
?>


    </div>
</div>
    
<?php get_footer(); ?>