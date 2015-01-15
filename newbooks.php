
<?php
error_reporting(0);
?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Collins Library - New Books</title>
	<style>
		.rssdiv {font-family:UniversCondensed,Univers,sans-serif;color:#747578;}
		.rssli {padding-bottom:10px;}
		.rsslink {color:#660000;text-decoration:none;}
		.rssul {list-style: disc outside none;}
	</style>
 </head>
  <body>
  <div>
  <?php
  
include('rssclass.php');
  
$i =  $_GET['feed'];

switch ($i) {

case 30:
	$feedlist = new rss('https://na01.alma.exlibrisgroup.com/rep/getFile?institution_code=01ALLIANCE_UPUGS&file=collinsnewbooks30&type=rss');
	break;
case 60;
	$feedlist = new rss('https://na01.alma.exlibrisgroup.com/rep/getFile?institution_code=01ALLIANCE_UPUGS&file=collinsnewbooks60&type=rss');
	break;
case 90;
	$feedlist = new rss('https://na01.alma.exlibrisgroup.com/rep/getFile?institution_code=01ALLIANCE_UPUGS&file=collinsnewbooks90&type=rss');
	break;
}

echo $feedlist->display();
  
 
?> 

    </div>
	
     
	
  </body>
</html>