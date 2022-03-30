
<?php
function Rate_stars($stars){
$rating =(int)$stars;
$color = 'checked';
for ($x = 0; $x < $rating ; $x++) {
echo '<i class="fas fa-star ' .$color.'"></i>';
}
for ($x = 0; $x < 5-$rating ; $x++) {
echo '<i class="fas fa-star"></i>';
}
}
function shortTitle($title,$num){
   if(strlen($title) >= $num){
      $title = substr($title,0,$num);
   }
   return $title;
}
function get_user_ip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        echo $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        echo $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        echo $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function pagination($page_num,$link,$adjacent,$total_num_of_pages){
   $next = $page_num + 1;
   $prev = $page_num - 1;
   $second_last = $total_num_of_pages - 1;
   if ($page_num > 1) {
       echo ' <li><a href="store/apps/category.php?id=tools&page=1"><i class="fas fa-angle-double-left"></i></a></li>';
   }
   ?>
   <li <?php if ($page_num <= 1) echo "class='disabled'"; ?>>
       <a href="<?php if ($page_num > 1) echo "$link&page=$prev" ?>"><i class="fas fa-chevron-left"></i></a>
   </li>
   <?php
   if($total_num_of_pages <= 10){
                                       
      for($counter =1; $counter <= $total_num_of_pages ;$counter ++ ){
          if($page_num == $counter){
              $active = 'active';
          }
          else{
              $active ='';
          }
          echo "<li class='$active'><a href='$link&page=$counter'>$counter</a></li>";
      }
  }
  elseif($total_num_of_pages <= 4){
      
      for($counter = 1; $counter <8; $counter++){
          if($counter == $page_num){
              echo "<li class='active'><a>$counter</a></li>";	
          }
          else{
              echo "<li><a href='$link&page=$counter'>$counter</a></li>";
          }
         

      }
      echo "<li><a>...</a></li>";
      echo "<li><a href='$link&page=$second_last'>$second_last</a></li>";
      echo "<li><a href='$link&page=$total_num_of_pages'>$total_num_of_pages</a></li>";
  }
  elseif($page_num > 4 && $page_num < $total_num_of_pages - 4) {		 
      echo "<li><a href='$link&page=1'>1</a></li>";
      echo "<li><a href='$link&page=2'>2</a></li>";
      echo "<li><a>...</a></li>";     
      for (
           $counter = $page_num - $adjacent;
           $counter <= $page_num + $adjacent;
           $counter++
           ) {		
           if ($counter == $page_num) {
          echo "<li class='active'><a>$counter</a></li>";	
          }else{
              echo "<li><a href='$link&page=$counter'>$counter</a></li>";
                }                  
             }
      echo "<li><a>...</a></li>";
      echo "<li><a href='$link&page=$second_last'>$second_last</a></li>";
      echo "<li><a href='$link&page=$total_num_of_pages'>$total_num_of_pages</a></li>";
      }
      else {
          echo "<li><a href='$link&page=1'>1</a></li>";
          echo "<li><a href='$link&page=2'>2</a></li>";
          echo "<li><a>...</a></li>";     
              for (
               $counter = $total_num_of_pages - 6;
               $counter <= $total_num_of_pages;
               $counter++
               ) {
               if ($counter == $page_num) {
              echo "<li class='active'><a>$counter</a></li>";	
              }else{
                  echo "<li><a href='$link&page=$counter'>$counter</a></li>";
              }                   
               }
          }
          
      
  ?>
  <li <?php if ($page_num >= $total_num_of_pages) echo "class='disabled'"; ?>>
      <a href="<?php if ($page_num < $total_num_of_pages) echo "$link&page=$next" ?>"><i class="fas fa-angle-right"></i></a>
  </li>
  <?php
  if($page_num < $total_num_of_pages){
      echo "<li><a href='$link&page=$total_num_of_pages'><i class=\"fas fa-angle-double-right\"></i></a></li>";

  }
}
