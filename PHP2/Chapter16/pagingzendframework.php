<?php
// include auto-loader class
require_once 'Zend/Loader/Autoloader.php';
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';

// register auto-loader
$loader = Zend_Loader_Autoloader::getInstance();

$pageSize=5;
$pageCount= 2;
try {  
  // connect to database and get data set
  $db = Zend_Db::factory('Pdo_Mysql', 
  array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname'   => 'marketohome'));
  $db->query("SET NAMES 'utf8'");

  $db->setFetchMode(Zend_Db::FETCH_NUM);
  

  // initialize pager with data set
  $pager = new Zend_Paginator(
    new Zend_Paginator_Adapter_DbSelect(
    $db->select()
         ->from('Items', 
              array('ItemId', 'ItemName', 'Price', 'Size', 'PublishYear'))
    )

  );
 
  // set page number from request
  $currentPage = isset($_GET['page']) ? (int) htmlentities($_GET['page']) : 1;
  $pager->setCurrentPageNumber($currentPage);
  
  // set number of items per page from request
  $itemsPerPage = isset($_GET['counter']) ? (int) htmlentities($_GET['counter']) : $pageSize;
  $pager->setItemCountPerPage($itemsPerPage);
  
  // set number of pages in page range
  $pager->setPageRange($pageCount);
  
  // get page data
  $pages = $pager->getPages('Sliding');

  // create page links
  $pageLinks = array();
  $separator = ' | ';
  
  // build first page link
  $pageLinks[] = getLink($pages->first, $itemsPerPage, '<<');        
    
  // build previous page link
  if (!empty($pages->previous)) {
    $pageLinks[] = getLink($pages->previous, $itemsPerPage, '<');        
  }
  
  // build page number links
  foreach ($pages->pagesInRange as $x) {
    if ($x == $pages->current) {
      $pageLinks[] = $x;      
    } else {
      $pageLinks[] = getLink($x, $itemsPerPage, $x);      
    }  
  } 
  
  // build next page link
  if (!empty($pages->next)) {
    $pageLinks[] = getLink($pages->next, $itemsPerPage, '>');        
  }  
  
  // build last page link
  $pageLinks[] = getLink($pages->last, $itemsPerPage, '>>');        
  
} catch(Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}

function getLink($page, $itemsPerPage, $label) {
  $q = http_build_query(array(
      'page' => $page, 
      'ccounter' => $itemsPerPage
    )      
  );  
  return "<a href=\"?$q\">$label</a>";  
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Market To Home</title>
</head>
<body bottomMargin=0 leftMargin=0 topMargin=0 rightMargin=0>
  <body>
    <div id="data">
      <table border="1">
        <tr> 
          <th>Item Id</th>
          <th>Item Name</th>
          <th>Price</th>
          <th>Size</th>
          <th>PublishYear</th>
        </tr>        
      <?php foreach($pager  as $key => $item) {?>
        <tr> 
          <td><?php echo $item[0]; ?></td>
          <td><?php echo $item[1]; ?></td>
          <td><?php echo $item[2]; ?></td>
          <td><?php echo $item[3]; ?></td>
          <td><?php echo $item[4]; ?></td>
        </tr>        
      <?php }  ?>
      </table>
    </div>

    <br/>
    
    <div id="links">
    Pages: <?php echo implode($pageLinks, $separator); ?>
    </div>
  </body>
</html>