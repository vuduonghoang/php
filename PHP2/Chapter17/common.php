<?php
function int_divide($x, $y) {
    if ($x == 0) return 0;
    if ($y == 0) return FALSE;
    $result = $x/$y;
    $pos = strpos($result, '.');
    if (!$pos) {
        return $result;
    } else {
        return (int) substr($result, 0, $pos);
    }
} 
function replace($strtoreplace)
{
	return str_replace("'","''",$strtoreplace);
}
function getLink($page, $itemsPerPage, $label) 
{
  $q = http_build_query(array(
	  'page' => $page, 
	  'range' => $itemsPerPage
	)      
  );  
  return "<a href=\"?$q\">$label</a>";  
}
function getLinkCategory($page, $itemsPerPage, $category, $label) 
{
  $q = http_build_query(array(
	  'page' => $page, 
	  'range' => $itemsPerPage,
	  'categoryid' => $category
	)      
  );  
  return "<a href=\"?$q\">$label</a>";  
}
function getLinkSearchResult($page, $itemsPerPage, $label) 
{
  $q = http_build_query(array(
	  'page' => $page, 
	  'range' => $itemsPerPage
	)      
  );  
  return "<a href=\"javascript:searchpage('result.php?$q')\">$label</a>";  
}

function generateLink($pages,$itemsPerPage)
{
  $pageLinks = array();
  $pageLinks[] = getLink($pages->first, $itemsPerPage, '<<');        
  if (!empty($pages->previous)) 
  {
	$pageLinks[] = getLink($pages->previous, $itemsPerPage, '<');        
  }
  foreach ($pages->pagesInRange as $x) 
  {
	if ($x == $pages->current) 
	{
	  $pageLinks[] = $x;      
	} 
	else 
	{
	  $pageLinks[] = getLink($x, $itemsPerPage, $x);      
	}  
  } 
  if (!empty($pages->next)) 
  {
	$pageLinks[] = getLink($pages->next, $itemsPerPage, '>');        
  }  
  
  $pageLinks[] = getLink($pages->last, $itemsPerPage, '>>');  
  return $pageLinks; 
}
function generateLinkCategory($pages,$itemsPerPage, $category)
{
  $pageLinks = array();
  $pageLinks[] = getLinkCategory($pages->first, $itemsPerPage,$category,'<<');        
  if (!empty($pages->previous)) 
  {
	$pageLinks[] = getLinkCategory($pages->previous, $itemsPerPage, $category, '<');        
  }
  foreach ($pages->pagesInRange as $x) 
  {
	if ($x == $pages->current) 
	{
	  $pageLinks[] = $x;      
	} 
	else 
	{
	  $pageLinks[] = getLinkCategory($x, $itemsPerPage, $category, $x);      
	}  
  } 
  if (!empty($pages->next)) 
  {
	$pageLinks[] = getLinkCategory($pages->next, $itemsPerPage, $category, '>');        
  }  
  
  $pageLinks[] = getLinkCategory($pages->last, $itemsPerPage, $category, '>>');  
  return $pageLinks; 
}
function generateLinkSearchResult($pages,$itemsPerPage)
{
  $pageLinks = array();
  $pageLinks[] = getLinkSearchResult($pages->first, $itemsPerPage, '<<');        
  if (!empty($pages->previous)) 
  {
	$pageLinks[] = getLinkSearchResult($pages->previous, $itemsPerPage, '<');        
  }
  foreach ($pages->pagesInRange as $x) 
  {
	if ($x == $pages->current) 
	{
	  $pageLinks[] = $x;      
	} 
	else 
	{
	  $pageLinks[] = getLinkSearchResult($x, $itemsPerPage, $x);      
	}  
  } 
  if (!empty($pages->next)) 
  {
	$pageLinks[] = getLinkSearchResult($pages->next, $itemsPerPage, '>');        
  }  
  
  $pageLinks[] = getLinkSearchResult($pages->last, $itemsPerPage, '>>');  
  return $pageLinks; 
}
?>