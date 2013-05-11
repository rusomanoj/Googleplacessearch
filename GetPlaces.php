<?php


$searchadd = $_GET['searchaddress']; // creating a variable when user enters a value to be searched

$escapedsearchadd = str_replace(' ','%20', $searchadd); //creating a variable $escapesearchadd and escaping the string when the user enters a value, %20 is for space between two strings

$google_resp = simplexml_load_string(file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/xml?query=$escapedsearchadd&radius=1000&sensor=false&key=AIzaSyDVdJtIAvhmHE7e2zoxA_Y9qWRpp6eE2o8")); //creating a variable $google_resp for the url to be searched for places provided with radius 1000 and search variable $escapedsearchadd is the query sent by the user 


//DOM 

$doc = new DOMDocument; // creating a variable $doc to create a new DOMDocument object
$doc->loadXML($google_resp->asXML());// loading the $google_resp as XML and then it loaded with loadXML method 
  
$results = $doc->getElementsByTagName("result");// the result will fetch the Root element 'result' 

foreach( $results as $result ) //Within the result loop
  {

  $names = $result->getElementsByTagName("name");//name inside the root element
  $name = $names->item(0)->nodeValue; // $anme fetches the name value from the given result node
  
  $lats = $result->getElementsByTagName("lat");//latitude inside the root element
  $lat = $lats->item(0)->nodeValue; // $lat fetches the latitude value from the given result node
  
  $lngs = $result->getElementsByTagName("lng");//longitude inside the root element
  $lng = $lngs->item(0)->nodeValue; // $lng fetches the longitude value from the given result node
  
  echo "<li>$name<br/>$lat,&nbsp&nbsp$lng<br/><br/></li>"; // output for the name,latitude and longitude
  
  }
?>

