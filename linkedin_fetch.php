
<?php
function search_linkedin($query)
{
  $url = "https://www.googleapis.com/customsearch/v1?key=AIzaSyCkMH_eo7MjWXRclmM8FMkp1ZkpJPUrS4U&cx=006459419947969858029:xk5xqzy_nsu&q=" . urlencode( $query ) .  "&callback=handleResponse&prettyprint=true&num=10";

  $result = get_web_page_linkedin( $url );

  // Exception handling
  if ( $result['http_code'] == 403 )
      echo "... error: daily limit exceeded ...";
  if ( $result['errno'] != 0 )
      echo "... error: bad url, timeout, redirect loop ...";
  if ( $result['http_code'] != 200 )
      echo "... error: no page, no permissions, no service ...";
      //echo "hgeloo worl";
  // Get and parse JSON output
  $page = $result['content'];
  $page = str_replace("// API callback\nhandleResponse(", "", $page); // Updated on 29th May 2011
  $page = str_replace(");", "", $page);
  //echo $page;
  $page=json_decode($page);

  // Print results
  $items = $page->items;

  for ($i = 0; $i < sizeof($items); $i++)
  {

      $item = $items[$i];

      //url_linkedin imageurl_linkedin name_linkedin details_linkedin role_linkedin location_linked

      //print("<font size=\"3\">" . "<a href=\"" . $item->link . "\" target=\"_blank\">" . $item->htmlTitle . "</a></font><br>");
      //print("<font size=\"2\" color=\"black\">" . $item->htmlSnippet . "</font><br>");
      //print("<font size=\"2\" color=\"green\">" . $item->displayLink . "</font><br>");      print("<br>");
      //echo $item;
      $url_linkedin = $item->link;
      $name_linkedin = strtolower($item->pagemap->hcard[0]->fn);
      if(strpos($url_linkedin,'pulse'))
      {
        continue;
      }
      $check_name =  strtolower($_SESSION['v_user']);
      $check_last = $_SESSION['v_last'];

      if(strpos($name_linkedin,$check_name) !== 0)
      {
        continue;
      }
      $imageurl_linkedin = $item->pagemap->cse_thumbnail[0]->src;
      $details_linkedin = $item->pagemap->hcard[0]->title;
      $role_linkedin = $item->pagemap->person[0]->role;
      $location_linkedin =$item->pagemap->person[0]->location;

      echo "<img src='$imageurl_linkedin' width='200' height='230' style='float:left;margin:5px;'> ";

			echo"
			<div class='row'>
      LinkedIn profile : ";
      echo "<a href='$url_linkedin'>$url_linkedin</a>";
			echo "</div>";
			echo "";
      echo "<br>";
	echo "
	<div class='row'>
	 Name :";
         echo $name_linkedin;
	echo "
	</div>";
	echo "<br>";
	echo "
	<div class='row'>
	 Details :";
         echo $item->pagemap->hcard[0]->title;
	echo "
	</div>";
	echo "<br>";
	echo "
	<div class='row'>
	 Location :";
         echo $item->pagemap->person[0]->location;
	echo "
	</div>";
	echo "<br>";

	echo "
	<div class='row'>
	 Role :";
         echo $item->pagemap->person[0]->role;
	echo "
	</div>";
	echo "<br><br>";
	echo"
      <form method='POST' style='float:left'>
      <input type='hidden' name='url_linkedin' value='$url_linkedin'>
      <input type='hidden' name='imageurl_linkedin' value='$imageurl_linkedin'>
      <input type='hidden' name='name_linkedin' value='$name_linkedin'>
      <input type='hidden' name='details_linkedin' value='$details_linkedin'>
      <input type='hidden' name='role_linkedin' value='$role_linkedin'>
      <input type='hidden' name='location_linkedin' value='$location_linkedin'>
      <input type='submit' name='submit' value='Save LinkedIn details to Database'>
      </form>
      ";

			echo"
		      <form method='POST' style='margin-left:-10px;'>
		      <input type='hidden' name='url_linkedin' value='$url_linkedin'>
		      <input type='hidden' name='imageurl_linkedin' value='$imageurl_linkedin'>
		      <input type='hidden' name='name_linkedin' value='$name_linkedin'>
		      <input type='hidden' name='details_linkedin' value='$details_linkedin'>
		      <input type='hidden' name='role_linkedin' value='$role_linkedin'>
		      <input type='hidden' name='location_linkedin' value='$location_linkedin'>
		      <input type='submit' name='submit' value='Save LinkedIn details to Excel'>
		      </form>
		      ";

      echo "<br><br>";
      echo "<hr>";
  }

}




function get_web_page_linkedin( $url )
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
