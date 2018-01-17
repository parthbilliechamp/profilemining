<?php
function search_twitter($query)
{
  $url = "https://www.googleapis.com/customsearch/v1?key=AIzaSyBH-2FgzYAh2ekGNp7VL0tyX6yfpZ3YzXo&cx=006459419947969858029:sfwtu81wkci&q=" . urlencode( $query ) .  "&callback=handleResponse&prettyprint=true&num=10";

  $result = get_web_page_twitter( $url );

  // Exception handling
  if ( $result['http_code'] == 403 )
      echo "... error: daily limit exceeded ...";
  if ( $result['errno'] != 0 )
      echo "... error: bad url, timeout, redirect loop ...";
  if ( $result['http_code'] != 200 )
      echo "... error: no page, no permissions, no service ...";

  // Get and parse JSON output
  $page = $result['content'];
  $page = str_replace(");", "", $page);
  $page = str_replace("// API callback\nhandleResponse(", "", $page); // Updated on 29th May 2011
  //echo $page;
  $page=json_decode($page);

  // Print results
  $items = $page->items;

  for ($i = 0; $i < sizeof($items); $i++)
  {

      $item = $items[$i];

      //print("<font size=\"3\">" . "<a href=\"" . $item->link . "\" target=\"_blank\">" . $item->htmlTitle . "</a></font><br>");
      //print("<font size=\"2\" color=\"black\">" . $item->htmlSnippet . "</font><br>");
      //print("<font size=\"2\" color=\"green\">" . $item->displayLink . "</font><br>");      print("<br>");
      //echo $item;
      $url_twitter = $item->link;
      $imageurl_twitter = $item->pagemap->cse_thumbnail[0]->src;
      $name_twitter = $item->title;
      if(strpos($url_twitter,'hashtag') || strpos($url_twitter,'status') || strpos($url_twitter,'search')!== false)
      {continue;}
      echo "<hr>";
      echo "<img src='$imageurl_twitter' width='200' height='200' style='float:left;margin:5px;'> ";
      echo "<br>";
      echo " Twitter profile : ";
      echo "<a href='$url_twitter'>$url_twitter</a>";
      echo " <br>";
      echo "<br>";
      echo " Name :  ";
      echo $item->title;
      echo "<br><br>";
      echo "
      <form method='POST'>
      <input type='hidden' name='url_twitter' value='$url_twitter'>
      <input type='hidden' name='imageurl_twitter' value='$imageurl_twitter'>
      <input type='hidden' name='name_twitter' value='$name_twitter'>
      <input type='submit' name='submit' value='Save Twitter details to Database'>
      </form>
      ";
      echo "<br>";
      echo "
      <form method='POST'>
      <input type='hidden' name='url_twitter' value='$url_twitter'>
      <input type='hidden' name='imageurl_twitter' value='$imageurl_twitter'>
      <input type='hidden' name='name_twitter' value='$name_twitter'>
      <input type='submit' name='submit' value='Save Twitter details to Excel'>
      </form>
      ";
      echo "<br><br><br><br><br>";
      }

}

// Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an array containing the HTTP server response header fields and content.
function get_web_page_twitter( $url )
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
  $err     = curl_errno( $ch );
  $errmsg  = curl_error( $ch );
  $header  = curl_getinfo( $ch );
  curl_close( $ch );

  $header['errno']   = $err;
  $header['errmsg']  = $errmsg;
  $header['content'] = $content;
  return $header;
}
?>
