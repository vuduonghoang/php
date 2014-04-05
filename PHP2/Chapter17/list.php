<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
<style type="text/css">
<!--
a {
	color: #3399FF
}
.topmenu {
	font-family: Arial, Helvetica, sans-serif;
	font-style: normal;
	color: #FFFFFF;
}
.style1 {color: #CC6600}
-->
</style>
</head>

<body bottomMargin=0 leftMargin=0 topMargin=0 rightMargin=0>
<div align="center">
  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3" valign="top"><?php require("top.php");?></td>
    </tr>
    <tr>
      <td width="200"  valign="top"><?php require("left.php");?></td>
      <td width="548"  valign="top">
		 <br>
        KẾT QUẢ LIỆT KÊ
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
        <?php
		require("common.php");
		require("ZendProvider.php");
		 
		$zendProvider = new ZendProvider();
		$whereclause= "1=1 ";
		if(isset($_GET["categoryid"]))
		{
			$category = $_GET["categoryid"];
			 
			if($category !="")
				$whereclause.= " and CategoryId='".$category."' ";
        }
		 
		$pageSize = 4;
		$pageCount = 2;
		$currentPage = 1;
		$totalPages= 0;
	 
		$currentPage = isset($_GET['page']) ? (int) htmlentities($_GET['page']) : 1;
        try {  
			//echo $select;
             $column = array('ItemId', 'ItemName', 'Price', 'Size', 'PublishYear');
			 
		  $result = $zendProvider->FetchRowsPagingWhere("Items", $column, $whereclause);
		  $result->setCurrentPageNumber($currentPage);
		  $itemsPerPage = isset($_GET['range']) ? (int) htmlentities($_GET['range']) : $pageSize;
		  
		  $result->setItemCountPerPage($itemsPerPage);
		  $result->setPageRange($pageCount);
		  $pages = $result->getPages('Sliding');
		  $separator = ' | ';
		  $pageLinks = generateLinkCategory($pages, $itemsPerPage,  $category);

		} 
		catch(Exception $e) 
		{
		  die ('ERROR: ' . $e->getMessage());
		}

        $rows = 0;
        if($result!=null)
        {
            $rows = $result->getItemCountPerPage();
            $totalPages = $result->count();
            $i=0;
            foreach($result  as $key => $item) 
             {
                if($i==0)
                {
                    echo "<td valign=top width='50%' >";
                    echo "<table width='100%' border='0'";
                    echo " cellspacing='2' cellpadding='2'>";
                }
                if( int_divide($rows,2)==$i)
                {
                    echo "</table></td>";
                    echo "<td  valign=top width='50%' >";
                    echo "<table width='100%' border='0' ";
                    echo "cellspacing='2' cellpadding='2'>";
                }
                echo "<form name=cart action=addcart.php method=post>";
                echo "<tr><td rowspan=4 valign='top'>";
                echo "<img width=80px height=100px src='books/";
                echo $item[0].".jpg'></td>";
                echo "<td valign='top'><a href='details.php?id=";
                echo $item[0]. "'>";
                echo $item[1] ; 
                echo "</a></td></tr>";
                echo "<tr><td valign='top'>Price: ";
                echo $item[2] . "</td></tr>";
                echo "<tr><td valign='top'>Size: ";
                echo $item[3] . "</td></tr>";
                echo "<tr><td valign='top'>Weight: ";
                echo $item[4] . "</td></tr>";
				echo "<tr><td valign='top' colspan=2>";
                echo "<input name=quantity value=1 size=5>";
				echo "<input value='Add to Cart' type=submit>";
				echo "<input name=itemid value='";
				echo $item[0]."' type='hidden'>";
				echo "<input name=itemname value='";
				echo $item[1]."' type=hidden>";
				echo "<input name=price value='";
				echo $item[2]."' type=hidden>";
				echo "<br><br></td></tr>";
				echo "</form>";
                $i++;
            }  
            echo "</table></td></tr>";
            echo "<tr><td valign='top'><b>";
			echo implode($pageLinks, $separator);
			echo "</b></td><td valign='top'> Page ";
			echo $currentPage." of " .$totalPages;
			echo "</td></tr>";
        }
        else
            echo "<td>Không tìm thấy mẩu tin.</td></tr>";
        
        ?>
          <!--end body-->
          </table>
      </td>
      <td width="242"  valign="top"><?php require("right.php");?></td>
    </tr>
    <tr>
      <td colspan="3"  valign="top"><?php include("bottom.htm");?></td>
    </tr>
  </table>
</div>
</body>
</html>

 