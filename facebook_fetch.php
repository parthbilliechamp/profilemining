<?php
function search_facebook($query)
{
  //echo $query;
  $url_facebook = "https://graph.facebook.com/v2.11/search?fields=id,name,gender,email,picture,cover%20&type=user&q=" . $query . "&access_token=EAACEdEose0cBAJWiofC7Dx8GrZAzRtGB8KsjhcJt1MlZCexDIZC0v7imOf0v07h28HBYT5kHnXaEz28yvYg36Nf4LkGkCz0IydlXwstTVFc15ScyQXgZCeoJj8h3ykI7pk2D5cC2XHJTuB49DZBDNA1sO6lzhR6mSSGgGoStqJ8LdRiINGTqkVNZB8PSj3BaZA5PF3lMH9ZCCQZDZD";
  $result = get_web_page_facebook( $url_facebook );
}
function get_web_page_facebook( $url )
{
  $options = array(
      CURLOPT_RETURNTRANSFER => true,     // return web page
      CURLOPT_HEADER         => false,    // don't return headers
      CURLOPT_FOLLOWLOCATION => true,     // follow redirects
      CURLOPT_ENCODING       => "",       // handle all encodings
      CURLOPT_USERAGENT      => "spider", // who am i
      CURLOPT_AUTOREFERER    => true,     // set referer on redirect
      CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
      CURLOPT_TIMEOUT        => 120,      // timeout on response
      CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
  );

  $ch      = curl_init( $url );
  curl_setopt_array( $ch, $options );
  $content = curl_exec( $ch );
  //echo $content;
  $result = json_decode($content);
  for($i=0;$i<sizeof($result->data);$i++){
    $id_facebook = $result->data[$i]->id;
    $name_facebook = $result->data[$i]->name;
    $imageurl_facebook = "https://graph.facebook.com/$id_facebook/picture?type=large";
    //$gender = $result->data[$i]->gender;
    //$hometown = $result->data[$i]->hometown->name;
    //$birthday = $result->data[$i]->birthday;
    //$location = $result->data[$i]->location->name;
    //$gender = $result->data[$i]->gender;
    //$age_range = $result->data[$i]->min;
    $url_facebook = "https://www.facebook.com/$id_facebook/";
  //echo $pic_uri;

  echo "<img src='$imageurl_facebook' height='240' width='200' style='float:left;margin-right:5px;'>";
  echo"
  <div class='row'>
  Facebook ID : ";
  echo $result->data[$i]->id;
  echo "</div>";
  echo "";
  echo "<br>";


  echo"
  <div class='row'>
  Facebook Name : ";
  echo $result->data[$i]->name;
  echo "</div>";
  echo "";
  echo "<br>";

  echo"
  <div class='row'>
  Facebook Profile : ";
  echo "<a href='$url_facebook'>$name_facebook</a>";
  echo "</div>";
  echo "";
  echo "<br>";


  echo"
  <div class='row'>
  Location : ";
  echo "<a href=''></a>";
  echo "</div>";
  echo "";
  echo "<br>";


  echo"
  <div class='row'>
  Education : ";
  echo "<a href=''></a>";
  echo "</div>";
  echo "";
  echo "<br>";




/*

  echo "Facebook ID : ";
  echo $result->data[$i]->id;
  echo "<br><br>";
  echo "Facebook Name : ";
  echo $result->data[$i]->name;
  echo "<br>";
  echo "<br><br>";
  echo "Facebook Profile : ";
  echo "<a href='$url_facebook'>$name_facebook</a>";
  echo "<br><br><br><br><br>";
*/
  echo "<br>";
  echo "
  <form method='POST' style='float:left;'>
  <input type='hidden' name='id_facebook' value='$id_facebook'>
  <input type='hidden' name='name_facebook' value='$name_facebook'>
  <input type='hidden' name='url_facebook' value='$url_facebook'>
  <input type='hidden' name='imageurl_facebook' value='$imageurl_facebook'>
  <input type='submit' name='submit' value='Save Facebook details to Database'>
  </form>
  ";
  echo "
  <form method='POST' style='float:left;'>
  <input type='hidden' name='id_facebook' value='$id_facebook'>
  <input type='hidden' name='name_facebook' value='$name_facebook'>
  <input type='hidden' name='url_facebook' value='$url_facebook'>
  <input type='hidden' name='imageurl_facebook' value='$imageurl_facebook'>
  <input type='submit' name='submit' value='Save Facebook details to Excel'>
  </form>
  ";
  echo "<br><br>";
  echo "<hr>";
}
}




?>
