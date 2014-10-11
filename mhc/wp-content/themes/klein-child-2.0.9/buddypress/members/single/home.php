<div id="buddypress">

<?php if( !is_user_logged_in()){
                  echo __('<span class="content-notLog" >
                      YOU HAVE TO <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">LOGIN</a> TO SEE<br/>
                      OR POST REVIEWS<br/>
                      Not member ? <a href="#klein_login_modal" data-toggle="modal" id="klein-login-btn">Sign in</a>
                  </span>');
                    } else {

   do_action( 'bp_before_member_home_content' ); ?>

  
  <div id="item-header" role="complementary" class="titleProfil">

    <div class="col-md-12" id="content-header">
      <h1 class="entry-title" id="bp-klein-page-title">
        Choicer Zone
      </h1>
    </div>

    <?php //if(function_exists('bcn_display')){ ?>
      <div class="klein-breadcrumbs col-md-12">
        <?php //bcn_display(); ?>
      </div>
    <?php //} ?>

    <?php bp_get_template_part( 'members/single/member-header' ) ?>

  </div><!-- #item-header -->

            <div id="tabContainerProfil" class="">
                <div class="tabs">
                  <ul>
                    <li id="tabHeader_1"><?php echo __('Home'); ?></li>
                    <li id="tabHeader_2"><?php echo __('Members'); ?></li>
                    <li id="tabHeader_3"><?php echo __('FAQ'); ?></li>
                    <li id="tabHeader_4"><?php echo __('Contact us'); ?></li>
                  </ul>
                </div>
                <div class="tabscontentProfil <?php if( !is_user_logged_in() ){ echo 'notlog'; } ?>">
                  <div class="tabpage" id="tabpage_1">
                    <h2>
                      <?php echo __('My Review ') ?><?php

                          $id = bp_displayed_user_id();
                          $argsCount = array(
                            'user_id' => "$id", // use user_id
                                  'count' => true //return only the count
                          );

                        printf( 
                          _nx( __('(1)','klein'), 
                             __('(%1$s)', 'klein'), 
                            get_comments($argsCount), 
                            'comments title', 
                            'klein' 
                          ),
                          number_format_i18n( get_comments($argsCount) ), 
                            '<span>' . get_the_title() . '</span>' 
                          );
                      ?> 
                    </h2>   

                    <div>
                     <?php
                        $args = array(
                          'user_id' => "$id", // use user_id
                          'count' => false
                        );
                        $comments = get_comments($args);
                        echo '<ul>';
                          //var_dump($comments);
                          foreach($comments as $comment) :
                            echo '<li>';
                              date('M, d, Y', strtotime($comment->comment_date));
                              $outout = get_avatar($comment->comment_author_email, 80);

                              echo $outout;
                              echo '<span class="auteurProfil">'. $comment->comment_author .'</span> - ';
                              echo '<span class="dateProfil">'. get_comment_date( "", $comment) .'</span>';
                              echo '<p class="commentProfil">'.$comment->comment_content .'</p>';
                            echo '</li>';
                            echo '<span class="clearfix"></span>';

                          endforeach;
                        echo '</ul>';

                      ?>

                    </div>      
                  </div>
                  <div class="tabpage" id="tabpage_2">

                      <?php echo get_option('Members');?>

                  </div>
                  <div class="tabpage" id="tabpage_3">
                    
                      <?php echo get_option('faq');?>
 
                  </div>
                  <div class="tabpage" id="tabpage_4">
                    
                      <?php echo get_option('contact');?>
 
                  </div>
                </div>
            </div>
            <?php } ?>

<?php bp_get_template_part( 'members/single/settings' ); ?>
<?php //bp_get_template_part( 'members/single/profil' ); ?>

</div> <!-- end #buddypress -->


  <?php do_action( 'bp_after_member_home_content' ); ?>


<script>
  window.onload=function() {

    // get tab container
    var container = document.getElementById("tabContainerProfil");
      // set current tab
      var navitem = container.querySelector(".tabs ul li");
      //store which tab we are on
      var ident = navitem.id.split("_")[1];
      navitem.parentNode.setAttribute("data-current",ident);
      //set current tab with class of activetabheader
      navitem.setAttribute("class","tabActiveHeader");

      //hide two tab contents we don't need
      var pages = container.querySelectorAll(".tabpage");
      for (var i = 1; i < pages.length; i++) {
        pages[i].style.display="none";
      }

      //this adds click event to tabs
      var tabs = container.querySelectorAll(".tabs ul li");
      for (var i = 0; i < tabs.length; i++) {
        tabs[i].onclick=displayPage;
      }
  }

  // on click of one of tabs
  function displayPage() {
    var current = this.parentNode.getAttribute("data-current");
    //remove class of activetabheader and hide old contents
    document.getElementById("tabHeader_" + current).removeAttribute("class");
    document.getElementById("tabpage_" + current).style.display="none";

    var ident = this.id.split("_")[1];
    //add class of activetabheader to new active tab and show contents
    this.setAttribute("class","tabActiveHeader");
    document.getElementById("tabpage_" + ident).style.display="block";
    this.parentNode.setAttribute("data-current",ident);
  }
</script>

