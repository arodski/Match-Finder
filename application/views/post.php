<!DOCTYPE html>
<hmtl>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
  </head>
  <body>
    <?php
       require_once 'php-sdk/facebook.php';
       
       $appId = '260197100799449';
       $secret = 'ee50581d02918c372f0db304a9076ada';
       $permissions = 'manage_pages, publish_stream';
       
       $fb = new Facebook(array('appId'=>$appId, 'secret'=>$secret));
       $fbuser = $fb->getUser();
       
      if($fbuser) {
        if(isset($_POST['pageid'])) {
          try {
            if($user_score > $opponent_score)
              $outcome = "defeated ";
            else if($user_score < $opponent_score) 
              $outcome = "lost to ";
            else
              $outcome = " drew with ";

            $message = array(
              'message' => $user_email . " (" . $team . ") " . $outcome . $opponent_email . " (" . $opponent . ") Final Score: " . $user_score . "-" . $opponent_score
            );
            $posturl = '/'.$_POST['pageid'].'/feed';
            $result = $fb->api($posturl,'POST',$message);
            if($result){
              echo "<div style='text-align: center'>";
                echo '<h5>Successfully posted to Facebook Wall...</h5>';
                echo "<br/>";
                //$params = array( 'next' => 'http://matchfinder.web.engr.illinois.edu/main/home' );
                echo '<a href="'.$fb->getLogoutUrl() .'">Log out of Facebook</a>';
              echo "</div>";
            }
          } catch(FacebookApiException $e){
              $params = array('scope' => $permissions);
              echo '<a center" center" href="'. $fb->getLoginUrl($params) .'"><img src="../images/fb_btn.png"></a>';
              error_log($e->getType());
              error_log($e->getMessage());
            }
        }      
        else {
          try {
            $qry = 'select page_id, name from page where page_id in (select page_id from page_admin where uid ='.$fbuser.')';
            $pages = $fb->api(array('method' => 'fql.query','query' => $qry));
            
            if(empty($pages)) {
              echo 'The user does not have any pages.';
            }
            else {
              echo "<center>";
                echo "<div style='text-align: center; width: 40%' class='well'>";
                  echo '<form action="" method="post">';
                    echo '<div class="form-group">';
                      echo 'Select Page: <select name="pageid">';
                        foreach($pages as $page) {
                          echo '<option value="'.$page['page_id'].'">'.$page['name'].'</option>';
                        }
                      echo '</select>';
                    echo "</div>";
                    echo '<div class="form-group">';
                      echo '<input type="submit" class="form-control btn btn-default" value="Post to wall"/>';
                    echo "</div>";
                  echo '</form>';
                echo "</div>";
              echo "</center>";
            }   
          } catch(FacebookApiException $e){
              echo $e->getMessage();
            }
        }  
      }
      else {
        echo "<div style='text-align: center'>";
          echo "<h3>Share your match results with other people!</h3>";
          $params = array('scope' => $permissions);
          echo '<a center" center" href="'. $fb->getLoginUrl($params) .'"><img src="../images/fb_btn.png"></a>';
        echo "</div>";
      }
    ?>

    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../jquery-2.0.3.js"></script>
    <script src="../loadContent.js"></script>
  </body>
</html>
