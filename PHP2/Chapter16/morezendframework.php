
<?php

require_once 'Zend/Loader/Autoloader.php';

// register auto-loader
$loader = Zend_Loader_Autoloader::getInstance();

// set data
$data = array(
  'C# 2010', 'SQL Server 2010', 'ASP.NET 4.0', 
  'SharePoint Server 2010', 'SharePoint Designer', 
	'InfoPath Form 2010', 'Exchange Server 2010',
  'The Flash', 'Dreamweaver', 'PHP', 'Adobe Photoshop',
  'MySQL', 'Joomla', 'PHPCake', 'Zend Framework'
);

// initialize pager with data set
$pager = new Zend_Paginator(new Zend_Paginator_Adapter_Array($data));

// set page number from request
$currentPage = isset($_GET['page']) ? (int) htmlentities($_GET['page']) : 1;
$pager->setCurrentPageNumber($currentPage);

// set number of items per page 
$pager->setItemCountPerPage(5);
?>

<html>
  <head></head>
  <body><a href="morezendframework.php?page=1">1</a> &nbsp;
<a href="morezendframework.php?page=2">2</a> &nbsp;
<a href="morezendframework.php?page=3">3</a> &nbsp;
    <div id="data">
      <table border="1">
      <?php foreach ($pager->getCurrentItems() as $item): ?>
        <tr> 
          <td><?php echo $item; ?></td>
        </tr>        
      <?php endforeach; ?>
      </table>
    </div>
  </body>
</html>
