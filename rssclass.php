<?php

 class rss {

 var $feed;

 function rss($feed) 
  
  {
    $this->feed = $feed;
  }
  
 function parse() 
  
  {
    $rss = simplexml_load_file($this->feed);
	
    $rss_split = array();
	
	$count = 0;
	
	foreach ($rss->channel->item as $item) {
	
	  $title = (string) $item->title; // Title
      $link   = (string) $item->link; // Url Link
	  $author = (string) $item->author; // author
	  $desc = (string) $item->description; // description
	
	  $rss_split[$count] = array("title"=>$title, "author"=>$author, "desc"=>$desc, "link"=>$link, );

	  $count++;
    }
	
	asort($rss_split);
	
	$rss_output = array();

	foreach ($rss_split as $item){
	
		$link_output = $item["link"];
		$title_output = substr($item["title"], 0, -2);
		$author_output = $item["author"];
		$callnum_output = substr(strstr($item["desc"], 'Call number -'), 13) ;
	
	if (!empty($author_output)) {
	
	$rss_output[] = '

          <div class="rssdiv">
		  <li class="rssli">
          <a href="'.$link_output.'" target="_blank" title="" class="rsslink">
          '.$title_output.' 
          </a><br />'.$author_output.'<br />'.$callnum_output.'</li>
          </div>
	'; }

	else {
	
	$rss_output[] = '

          <div class="rssdiv">
		  <li class="rssli">
          <a href="'.$link_output.'" target="_blank" title="" class="rsslink">
          '.$title_output.' 
          </a><br />'.$callnum_output.'</li>
          </div>
	'; }
} 
	
 return $rss_output;
  }

function display()
  {
    $rss_output = $this->parse();

    $rss_data = '
		<div>
           <div>
         '.$head.'
           </div>
         <div><ul class="rssul">';

	foreach ($rss_output as $i)
	{
	  $rss_data .=$i;
    }
    $trim = str_replace('', '',$this->feed);
    $user = str_replace('&lang=en-us&format=rss_200','',$trim);
	
	$rss_data.='</ul></div></div>';
    
    return $rss_data;
  }
}
?>