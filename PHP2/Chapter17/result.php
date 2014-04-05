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
<script langauge=javascript>
	function searchpage(page)
	{
		document.search.action=page;
		document.search.submit();
	}
</script>
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
        KẾT QUẢ TÌM KIẾM
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
		<?php
        require("common.php");
		
		$keyword ="";
		$category = "";
		$author="";
		$publisher="";
		$readertype="";
		$language = "";
		$minprice = "";
		$maxprice="";
		
		$whereclause= "";
        $searchpage = "";
		if(isset($_POST["searchfrom"]))
			 $searchpage = $_POST["searchfrom"];
        switch($searchpage)
        {
            case "quick":
                $keyword = $_POST["keyword"];
                if($keyword !="")
                {
                    $whereclause = " and (ItemName like '%";
                    $whereclause.=replace($keyword);
                    $whereclause.="%' or Description like '%";
                    $whereclause.=replace($keyword)."%') ";
                }
                $category=$_POST["category"];
                if($category !="")
                    $whereclause.= " and CategoryId='".$category."' ";
                    
                break;
            case "basic":
                $keyword = $_POST["keyword"];
                if($keyword !="")
                {
                    $whereclause = " and (ItemName like '%";
                    $whereclause.=replace($keyword);
                    $whereclause.="%' or Description like '%";
                    $whereclause.=replace($keyword)."%') ";
                }
                $category=$_POST["category"];
                if($category !="")
                    $whereclause.= " and CategoryId='".$category."' ";
                    
                $author=$_POST["author"];
                if($author !="")
                    $whereclause.= " and AuthorId='".$author."' ";
                    
                $publisher=$_POST["publisher"];
                if($publisher !="")
                    $whereclause.= " and PublisherId='".$publisher."' ";
                break;
            case "advanced":
                $keyword = $_POST["keyword"];
                if($keyword !="")
                {
                    $whereclause = " and (ItemName like '%";
                    $whereclause.=replace($keyword);
                    $whereclause.="%' or Description like '%";
                    $whereclause.=replace($keyword)."%') ";
                }
                $category=$_POST["category"];
                if($category !="")
                    $whereclause.= " and CategoryId='".$category."' ";
                    
                $author=$_POST["author"];
                if($author !="")
                    $whereclause.= " and AuthorId='".$author."' ";
                    
                $publisher=$_POST["publisher"];
                if($publisher !="")
                    $whereclause.= " and PublisherId='".$publisher."' ";
                    
                $readertype=$_POST["readertype"];
                if($readertype !="")
                    $whereclause.= " and ReaderId='".$readertype."' ";
                    
                $language=$_POST["language"];
                if($language !="")
                    $whereclause.= " and LanguageId='".$language."' ";
                
                $minprice=$_POST["minprice"];
                if($minprice !="")
                    $whereclause.= " and Price >='".$minprice."' ";
                
                $maxprice=$_POST["maxprice"];
                if($maxprice !="")
                    $whereclause.= " and Price <='".$maxprice."' ";
                        
                break;
        }
        ?>
       
        <?php
		$pageSize = 4;
		$pageCount = 2;
		$currentPage = 1;
		$totalPages= 0;
	 	require("ZendProvider.php");
		 
		$zendProvider = new ZendProvider();
		$currentPage = isset($_GET['page']) ? (int) htmlentities($_GET['page']) : 1;
        try {  
			//echo $select;
             $column = array('ItemId', 'ItemName', 'Price', 'Size', 'PublishYear');
			 
		  $result = $zendProvider->FetchRowsPagingWhere("Items", $column, "1=1 ".$whereclause);
		  $result->setCurrentPageNumber($currentPage);
		  $itemsPerPage = isset($_GET['range']) ? (int) htmlentities($_GET['range']) : $pageSize;
		  
		  $result->setItemCountPerPage($itemsPerPage);
		  $result->setPageRange($pageCount);
		  $pages = $result->getPages('Sliding');
		  $separator = ' | ';
		  $pageLinks = generateLinkSearchResult($pages, $itemsPerPage);

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
			echo "<form name=search method=post ";
				echo "action='result.php'>";
            echo "<tr><td valign='top'><b>";
			echo implode($pageLinks, $separator);
			echo "</b></td><td valign='top'> Page ";
			echo $currentPage." of " .$totalPages;
			echo "<input name=searchfrom value='";
			echo $searchpage."' type='hidden'>";
			echo "<input name=keyword value='";
			echo $keyword."' type=hidden>";
			echo "<input name=category value='";
			echo $category."' type=hidden>";
			echo "<input name=publisher value='";
			echo $publisher."' type=hidden>";
			echo "<input name=author value='";
			echo $author."' type=hidden>";
			echo "<input name=readertype value='";
			echo $readertype."' type=hidden>";
			echo "<input name=language value='";
			echo $language."' type=hidden>";
			echo "<input name=minprice value='";
			echo $minprice."' type=hidden>";
			echo "<input name=maxprice value='";
			echo $maxprice."' type=hidden>";
			echo "</form></td></tr>";
		}
		else
           echo "<td><br>Không tìm thấy mẩu tin thoả tiêu chí tìm kiếm.</td></tr>";
      
        
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
 