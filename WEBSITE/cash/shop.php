<?php 
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['char'])){
header("Location: index.php");
} else {
include "left.php";
}
?>
<?php include "config.php";?>
<?php 
	if (!isset($_GET['categories']) || !isset($_GET['pages'])){
	header("Location: ?categories=1&pages=1");
	} else {
		$page = $_GET['pages'];
		$topic = $_GET['categories'];
		
		// 1.Creating a Connection.
		$con = mysql_connect($server,$username,$password);
		if (!$con){
		die("Database connection failed: " . mysql_error());
		}
	
		//Selecting a Database CS.
		$csdb = mysql_select_db($db, $con);
		if (!$csdb){
		die("Database selection failed: " . mysql_error());
		}	
	
		//Perform database query on CS shop
		$shop = mysql_query("SELECT * FROM shop WHERE pages='$page' and category='$topic'", $con);
		if (!$shop) {
			die("Database query failed: " . mysql_error());
		}

		//Use returned data on CS
		$row[0] = mysql_fetch_array($shop);
		$row[1] = mysql_fetch_array($shop);
		$row[2] = mysql_fetch_array($shop);
		$row[3] = mysql_fetch_array($shop);
		$row[4] = mysql_fetch_array($shop);
		$row[5] = mysql_fetch_array($shop);
		$row[6] = mysql_fetch_array($shop);
		$row[7] = mysql_fetch_array($shop);
		$row[8] = mysql_fetch_array($shop);
		//Item for Row 1 List on Pages
		$id_row_1 = $row[0]['id'];
		$costs_row_1 = $row[0]['cost'];
		$itemid_row_1 = $row[0]['itemid'];
		$info_row_1 = $row[0]['info'];
		$counts_row_1 = $row[0]['count'];
		$item_name_row_1 = $row[0]['name'];
		$format_row_1 = $row[0]['format'];
		//Item for Row 2 List on Pages
		$id_row_2 = $row[1]['id'];
		$costs_row_2 = $row[1]['cost'];
		$itemid_row_2 = $row[1]['itemid'];
		$info_row_2 = $row[1]['info'];
		$counts_row_2 = $row[1]['count'];
		$item_name_row_2 = $row[1]['name'];
		$format_row_2 = $row[1]['format'];
		//Item for Row 3 List on Pages
		$id_row_3 = $row[2]['id'];
		$costs_row_3 = $row[2]['cost'];
		$itemid_row_3 = $row[2]['itemid'];
		$info_row_3 = $row[2]['info'];
		$counts_row_3 = $row[2]['count'];
		$item_name_row_3 = $row[2]['name'];
		$format_row_3 = $row[2]['format'];
		//Item for Row 4 List on Pages
		$id_row_4 = $row[3]['id'];
		$costs_row_4 = $row[3]['cost'];
		$itemid_row_4 = $row[3]['itemid'];
		$info_row_4 = $row[3]['info'];
		$counts_row_4 = $row[3]['count'];
		$item_name_row_4 = $row[3]['name'];
		$format_row_4 = $row[3]['format'];
		//Item for Row 5 List on Pages
		$id_row_5 = $row[4]['id'];
		$costs_row_5 = $row[4]['cost'];
		$itemid_row_5 = $row[4]['itemid'];
		$info_row_5 = $row[4]['info'];
		$counts_row_5 = $row[4]['count'];
		$item_name_row_5 = $row[4]['name'];
		$format_row_5 = $row[4]['format'];
		//Item for Row 6 List on Pages
		$id_row_6 = $row[5]['id'];
		$costs_row_6 = $row[5]['cost'];
		$itemid_row_6 = $row[5]['itemid'];
		$info_row_6 = $row[5]['info'];
		$counts_row_6 = $row[5]['count'];
		$item_name_row_6 = $row[5]['name'];
		$format_row_6 = $row[5]['format'];
		//Item for Row 7 List on Pages
		$id_row_7 = $row[6]['id'];
		$costs_row_7 = $row[6]['cost'];
		$itemid_row_7 = $row[6]['itemid'];
		$info_row_7 = $row[6]['info'];
		$counts_row_7 = $row[6]['count'];
		$item_name_row_7 = $row[6]['name'];
		$format_row_7 = $row[6]['format'];
		//Item for Row 8 List on Pages
		$id_row_8 = $row[7]['id'];
		$costs_row_8 = $row[7]['cost'];
		$itemid_row_8 = $row[7]['itemid'];
		$info_row_8 = $row[7]['info'];
		$counts_row_8 = $row[7]['count'];
		$item_name_row_8 = $row[7]['name'];
		$format_row_8 = $row[7]['format'];
		//Item for Row 9 List on Pages
		$id_row_9 = $row[8]['id'];
		$costs_row_9 = $row[8]['cost'];
		$itemid_row_9 = $row[8]['itemid'];
		$info_row_9 = $row[8]['info'];
		$counts_row_9 = $row[8]['count'];
		$item_name_row_9 = $row[8]['name'];
		$format_row_9 = $row[8]['format'];
		
		/*
		echo "----------------------------------------------------------------------<br />";
		echo "----------------------------------ONE---------------------------------<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "ITEM NAME: " .$item_name_row_1 ."<br />";
		echo "ID: " .$id_row_1 ."<br />";
		echo "ITEM ID: " .$itemid_row_1 ."<br />";
		echo "COST: " .$costs_row_1 ."<br />";
		echo "COUNT: " .$counts_row_1 ."<br />";
		echo "INFO: " .$info_row_1 ."<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "------------------------------------TWO-------------------------------<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "ITEM NAME: " .$item_name_row_2 ."<br />";
		echo "ID: " .$id_row_2 ."<br />";
		echo "ITEM ID: " .$itemid_row_2 ."<br />";
		echo "COST: " .$costs_row_2 ."<br />";
		echo "COUNT: " .$counts_row_2 ."<br />";
		echo "INFO: " .$info_row_2 ."<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "-----------------------------------THREE------------------------------<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "ITEM NAME: " .$item_name_row_3 ."<br />";
		echo "ID: " .$id_row_3 ."<br />";
		echo "ITEM ID: " .$itemid_row_3 ."<br />";
		echo "COST: " .$costs_row_3 ."<br />";
		echo "COUNT: " .$counts_row_3 ."<br />";
		echo "INFO: " .$info_row_3 ."<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "------------------------------------FOUR------------------------------<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "ITEM NAME: " .$item_name_row_4 ."<br />";
		echo "ID: " .$id_row_4 ."<br />";
		echo "ITEM ID: " .$itemid_row_4 ."<br />";
		echo "COST: " .$costs_row_4 ."<br />";
		echo "COUNT: " .$counts_row_4 ."<br />";
		echo "INFO: " .$info_row_4 ."<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "------------------------------------FIVE------------------------------<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "ITEM NAME: " .$item_name_row_5 ."<br />";
		echo "ID: " .$id_row_5 ."<br />";
		echo "ITEM ID: " .$itemid_row_5 ."<br />";
		echo "COST: " .$costs_row_5 ."<br />";
		echo "COUNT: " .$counts_row_5 ."<br />";
		echo "INFO: " .$info_row_5 ."<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "------------------------------------SIX-------------------------------<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "ITEM NAME: " .$item_name_row_6 ."<br />";
		echo "ID: " .$id_row_6 ."<br />";
		echo "ITEM ID: " .$itemid_row_6 ."<br />";
		echo "COST: " .$costs_row_6 ."<br />";
		echo "COUNT: " .$counts_row_6 ."<br />";
		echo "INFO: " .$info_row_6 ."<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "------------------------------------SEVEN-----------------------------<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "ITEM NAME: " .$item_name_row_7 ."<br />";
		echo "ID: " .$id_row_7 ."<br />";
		echo "ITEM ID: " .$itemid_row_7 ."<br />";
		echo "COST: " .$costs_row_7 ."<br />";
		echo "COUNT: " .$counts_row_7 ."<br />";
		echo "INFO: " .$info_row_7 ."<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "------------------------------------EIGTH-----------------------------<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "ITEM NAME: " .$item_name_row_8 ."<br />";
		echo "ID: " .$id_row_8 ."<br />";
		echo "ITEM ID: " .$itemid_row_8 ."<br />";
		echo "COST: " .$costs_row_8 ."<br />";
		echo "COUNT: " .$counts_row_8 ."<br />";
		echo "INFO: " .$info_row_8 ."<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "------------------------------------NINE------------------------------<br />";
		echo "----------------------------------------------------------------------<br />";
		echo "ITEM NAME: " .$item_name_row_9 ."<br />";
		echo "ID: " .$id_row_9 ."<br />";
		echo "ITEM ID: " .$itemid_row_9 ."<br />";
		echo "COST: " .$costs_row_9 ."<br />";
		echo "COUNT: " .$counts_row_9 ."<br />";
		echo "INFO: " .$info_row_9 ."<br />";
		*/
}
?>

<?php 
		if (!isset($_GET['detail'])){
		} else {
		$num = $_GET['detail'];
	
		//Perform database query on CS shop info
		$item_info = mysql_query("SELECT * FROM shop WHERE itemid='$num'", $con);
		if (!$item_info) {
			die("Database query failed: " . mysql_error());
		}
		
		//Use returned data on CS
		$view = mysql_fetch_array($item_info);
		}
		?>
<html>
<head>
<title>shopBLUE2</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script language="javascript" src="images/func.js"></script>
<style>
body {  font-size: 12px; color: #666666; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; padding-top: 0px}
table {  font-size: 12px; color: #000000; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; padding-top: 0px}

.com { font-family: "µ¸¿ò", "Arial", "verdana"; font-size: 12px; color: #ffffff; line-height: 14px; padding-top: 5px; padding-bottom: 5px; font-weight: bold}
.sign { font-family: "µ¸¿ò", "verdana", "Arial"; font-size: 11px; color: #333333 ; padding-left: 15px}
.gpo { font-family: "µ¸¿ò", "Arial", "verdana"; font-size: 12px; color: #FDF100; line-height: 14px; padding-top: 5px; padding-bottom: 5px; font-weight: bold}
.gpo2 { font-family: "µ¸¿ò", "Arial", "verdana"; font-size: 11px; color: #FDF100; line-height: 11px; padding-top: 5px; padding-bottom: 
5px; font-weight: bold} 
</style>
</head><body leftmargin="0" topmargin="0" onLoad="MM_preloadImages('images/shopmain2_02.gif','images/shopmain2_03.gif','images/shopmain2_04.gif','images/shopmain2_05.gif','images/shopmain2_06.gif','images/shopmain2_07.gif','images/shopmain2_08.gif','images/shopmain2_21.gif','images/shopmain2_22.gif','images/shopmain2_23.gif')" bgcolor="#ffffff" marginheight="0" marginwidth="0">
<table width="790" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td colspan="2">
			<img src="images/shopmain_01.gif" alt="" width="129" height="73"></td>
		
    <td colspan="3"> <a href="?categories=7&pages=1" onMouseOver="MM_swapImage('Image1','','images/shopmain2_02.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_02.gif" alt="" name="Image1" id="Image1" width="68" border="0" height="73"></a></td>
		
    <td> <a href="?categories=6&pages=1" onMouseOver="MM_swapImage('Image2','','images/shopmain2_03.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_03.gif" alt="" name="Image2" id="Image2" width="97" border="0" height="73"></a></td>
		
    <td colspan="2"> <a href="?categories=5&pages=1" onMouseOver="MM_swapImage('Image3','','images/shopmain2_04.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_04.gif" alt="" name="Image3" id="Image3" width="107" border="0" height="73"></a></td>
		
    <td> <a href="?categories=4&pages=1" onMouseOver="MM_swapImage('Image4','','images/shopmain2_05.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_05.gif" alt="" name="Image4" id="Image4" width="87" border="0" height="73"></a></td>
		
    <td colspan="3"> <a href="?categories=3&pages=1" onMouseOver="MM_swapImage('Image5','','images/shopmain2_06.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_06.gif" alt="" name="Image5" id="Image5" width="99" border="0" height="73"></a></td>
		
    <td colspan="3"> <a href="?categories=2&pages=1" onMouseOver="MM_swapImage('Image6','','images/shopmain2_07.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_07.gif" alt="" name="Image6" id="Image6" width="97" border="0" height="73"></a></td>
		
    <td colspan="3"> <a href="?categories=1&pages=1" onMouseOver="MM_swapImage('Image7','','images/shopmain2_08.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_08.gif" alt="" name="Image7" id="Image7" width="106" border="0" height="73"></a></td>
	</tr>
	<tr>
		<td colspan="13" width="592" background="images/shopmain_09.gif" height="40"><font class="sign">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php 
		if (!isset($_GET['categories'])){
		} else {
		$intro = $_GET['categories'];
		switch ($intro){
case 1:
echo "Special Items";
break; 
case 2:
echo "Premium Items";
break; 
case 3:
echo "Power Ups";
break; 
case 4:
echo "Package Items";
break; 
case 5:
echo "Functional";
break; 
case 6:
echo "Cloth Sets";
break; 
case 7:
echo "Cloth";
break; 
default:
break; 
}
}
		?></font>
		</td>
		<td colspan="5">
			<img src="images/shopmain_10.gif" alt="" width="198" height="40"></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img src="images/shopmain_11.gif" alt="" width="38" height="411"></td>
		<td colspan="10" rowspan="3" valign="top" width="531" background="images/shopmain_12.gif" height="411"><!--main --> 
      <table border="0" cellpadding="0" cellspacing="0">
         <tbody><tr>
<td colspan="7" height="1"></td>
</tr>
<tr>
<td></td>
<td valign="top" width="176">
  <table border="0" cellpadding="0" cellspacing="3">
    <tbody><tr>
	  <td colspan="3" width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $item_name_row_1;?></b></td>
    </tr>
    <tr>
	  <td><img src="images/items/<?php echo $itemid_row_1 . $format_row_1;?>" width="64" height="64"></td>
	  <td class="gpo" valign="top" width="90%"><?php echo $costs_row_1;?> dPoints<br>
<font size="1">Count : <?php echo $counts_row_1;?></font><br>
<a href="?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_1;?>"><img src="images/icon_detail.gif" width="55" border="0" height="17"></a></td>
	  <td width="10"></td>
    </tr>
    <tr>
	  <td><img src="images/icon_sendgift.gif" width="70" border="0" height="20"></td>
	  <td><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_1;?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></td>
	  <td></td>
    </tr>
  </tbody></table>
</td>
<td width="5"></td>
<td valign="top" width="176">
  <table border="0" cellpadding="0" cellspacing="3">
    <tbody><tr>
	  <td colspan="3" width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $item_name_row_2;?></b></td>
    </tr>
    <tr>
	  <td><img src="images/items/<?php echo $itemid_row_2 . $format_row_2;?>" width="64" height="64"></td>
	  <td class="gpo" valign="top" width="90%"><?php echo $costs_row_2;?> dPoints<br>
	    <font size="1">Count : <?php echo $counts_row_2;?></font><br>
	    <a href="?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_2;?>"><img src="images/icon_detail.gif" width="55" border="0" height="17"></a></td>
	  <td width="10"></td>
    </tr>
    <tr>
	  <td><img src="images/icon_sendgift.gif" width="70" border="0" height="20"></td>
	  <td><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_2;?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></td>
	  <td></td>
    </tr>
  </tbody></table>
</td>
<td width="5"></td>
<td valign="top" width="176">
  <table border="0" cellpadding="0" cellspacing="3">
    <tbody><tr>
	  <td colspan="3" width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $item_name_row_3;?></b></td>
    </tr>
    <tr>
	  <td><img src="images/items/<?php echo $itemid_row_3 . $format_row_3;?>" width="64" height="64"></td>
	  <td class="gpo" valign="top" width="90%"><?php echo $costs_row_3;?> dPoints<br>
	    <font size="1">Count : <?php echo $counts_row_3;?></font><br>
	    <a href="?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_3;?>"><img src="images/icon_detail.gif" width="55" border="0" height="17"></a></td>
	  <td width="10"></td>
    </tr>
    <tr>
	  <td><img src="images/icon_sendgift.gif" width="70" border="0" height="20"></td>
	  <td><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_3;?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></td>
	  <td></td>
    </tr>
  </tbody></table>
</td>
<td></td>
</tr>
<tr>
<td colspan="7" height="1"></td>
</tr>
<tr>
<td></td>
<td valign="top" width="176">
  <table border="0" cellpadding="0" cellspacing="3">
    <tbody><tr>
	  <td colspan="3" width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $item_name_row_4;?></b></td>
    </tr>
    <tr>
	  <td><img src="images/items/<?php echo $itemid_row_4 . $format_row_4;?>" width="64" height="64"></td>
	  <td class="gpo" valign="top" width="90%"><?php echo $costs_row_4;?> dPoints<br>
	    <font size="1">Count : <?php echo $counts_row_4;?></font><br>
	    <a href="?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_4;?>"><img src="images/icon_detail.gif" width="55" border="0" height="17"></a></td>
	  <td width="10"></td>
    </tr>
    <tr>
	  <td><img src="images/icon_sendgift.gif" width="70" border="0" height="20"></td>
	  <td><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_4;?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></td>
	  <td></td>
    </tr>
  </tbody></table>
</td>
<td width="5"></td>
<td valign="top" width="176">
  <table border="0" cellpadding="0" cellspacing="3">
    <tbody><tr>
	  <td colspan="3" width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $item_name_row_5;?></b></td>
    </tr>
    <tr>
	  <td><img src="images/items/<?php echo $itemid_row_5 . $format_row_5;?>" width="64" height="64"></td>
	  <td class="gpo" valign="top" width="90%"><?php echo $costs_row_5;?> dPoints<br>
	    <font size="1">Count : <?php echo $counts_row_5;?></font><br>
	    <a href="?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_5;?>"><img src="images/icon_detail.gif" width="55" border="0" height="17"></a></td>
	  <td width="10"></td>
    </tr>
    <tr>
	  <td><img src="images/icon_sendgift.gif" width="70" border="0" height="20"></td>
	  <td><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_5;?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></td>
	  <td></td>
    </tr>
  </tbody></table>
</td>
<td width="5"></td>
<td valign="top" width="176">
  <table border="0" cellpadding="0" cellspacing="3">
    <tbody><tr>
	  <td colspan="3" width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $item_name_row_6;?></b></td>
    </tr>
    <tr>
	  <td><img src="images/items/<?php echo $itemid_row_6 . $format_row_6;?>" width="64" height="64"></td>
	  <td class="gpo" valign="top" width="90%"><?php echo $costs_row_6;?> dPoints<br>
	    <font size="1">Count : <?php echo $counts_row_6;?></font><br><a href="?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_6;?>"><img src="images/icon_detail.gif" width="55" border="0" height="17"></a></td>
	  <td width="10"></td>
    </tr>
    <tr>
	  <td><img src="images/icon_sendgift.gif" width="70" border="0" height="20"></a></td>
	  <td><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_6;?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></a></td>
	  <td></td>
    </tr>
  </tbody></table>
</td>
<td></td>
</tr>
<tr>
<td colspan="7" height="1"></td>
</tr>
<tr>
<td></td>
<td valign="top" width="176">
  <table border="0" cellpadding="0" cellspacing="3">
    <tbody><tr>
	  <td colspan="3" width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $item_name_row_7;?></b></td>
    </tr>
    <tr>
	  <td><img src="images/items/<?php echo $itemid_row_7 . $format_row_7;?>" width="64" height="64"></td>
	  <td class="gpo" valign="top" width="90%"><?php echo $costs_row_7;?> dPoints<br>
	    <font size="1">Count : <?php echo $counts_row_7;?></font><br><a href="?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_7;?>"><img src="images/icon_detail.gif" width="55" border="0" height="17"></a></td>
	  <td width="10"></td>
    </tr>
    <tr>
	  <td><img src="images/icon_sendgift.gif" width="70" border="0" height="20"></a></td>
	  <td><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_7;?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></a></td>
	  <td></td>
    </tr>
  </tbody></table>
</td>
<td width="5"></td>
<td valign="top" width="176">
  <table border="0" cellpadding="0" cellspacing="3">
    <tbody><tr>
	  <td colspan="3" width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $item_name_row_8;?></b></td>
    </tr>
    <tr>
	  <td><img src="images/items/<?php echo $itemid_row_8 . $format_row_8;?>" width="64" height="64"></td>
	  <td class="gpo" valign="top" width="90%"><?php echo $costs_row_8;?> dPoints<br>
	    <font size="1">Count : <?php echo $counts_row_8;?></font><br><a href="?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_8;?>"><img src="images/icon_detail.gif" width="55" border="0" height="17"></a></td>
	  <td width="10"></td>
    </tr>
    <tr>
	  <td><img src="images/icon_sendgift.gif" width="70" border="0" height="20"></a></td>
	  <td><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_8;?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></a></td>
	  <td></td>
    </tr>
  </tbody></table>
</td>
<td width="5"></td>
<td valign="top" width="176">
  <table border="0" cellpadding="0" cellspacing="3">
    <tbody><tr>
	  <td colspan="3" width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $item_name_row_9;?></b></td>
    </tr>
    <tr>
	  <td><img src="images/items/<?php echo $itemid_row_9 . $format_row_9;?>" width="64" height="64"></td>
	  <td class="gpo" valign="top" width="90%"><?php echo $costs_row_9;?> dPoints<br>
	    <font size="1">Count : <?php echo $counts_row_9;?></font><br><a href="?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_9;?>"><img src="images/icon_detail.gif" width="55" border="0" height="17"></a></td>
	  <td width="10"></td>
    </tr>
    <tr>
	  <td><img src="images/icon_sendgift.gif" width="70" border="0" height="20"></a></td>
	  <td><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?>&detail=<?php echo $itemid_row_9;?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></a></td>
	  <td></td>
    </tr>
  </tbody></table>
</td>
<td></td>
</tr>
<tr>

<?php 
if (!isset($_GET['categories']) || !isset($_GET['pages'])){
	header("Location: ?categories=special&pages=1");
	} else {
$topicpage = $_GET['categories'];

switch ($topicpage){
case 1:
echo "<center><td colspan=\"7\" class=\"gpo\" align=\"center\" height=\"5\"><b><a href=\"?categories=1&pages=1\">[1]</a></b>&nbsp;<a href=\"?categories=1&pages=2\">[2]</a>&nbsp;<a href=\"?categories=1&pages=3\">[3]</a>&nbsp;</td></center>";
break; 
case 2:
echo "<center><td colspan=\"7\" class=\"gpo\" align=\"center\" height=\"5\"><b><a href=\"?categories=2&pages=1\">[1]</a></b>&nbsp;<a href=\"?categories=2&pages=2\">[2]</a>&nbsp;<a href=\"?categories=2&pages=3\">[3]</a>&nbsp;<a href=\"?categories=2&pages=4\">[4]</a>&nbsp;<a href=\"?categories=2&pages=5\">[5]</a>&nbsp;<a href=\"?categories=2&pages=6\">[6]</a></td></center>";
break; 
case 3:
echo "<center><td colspan=\"7\" class=\"gpo\" align=\"center\" height=\"5\"><b><a href=\"?categories=3&pages=1\">[1]</a></b>&nbsp;<a href=\"?categories=3&pages=2\">[2]</a>&nbsp;<a href=\"?categories=3&pages=3\">[3]</a>&nbsp;</td></center>";
break; 
case 4:
echo "<center><td colspan=\"7\" class=\"gpo\" align=\"center\" height=\"5\"><b><a href=\"?categories=4&pages=1\">[1]</a></b>&nbsp;<a href=\"?categories=4&pages=2\">[2]</a>&nbsp;<a href=\"?categories=4&pages=3\">[3]</a>&nbsp;</td></center>";
break; 
case 5:
echo "<center><td colspan=\"7\" class=\"gpo\" align=\"center\" height=\"5\"><b><a href=\"?categories=5&pages=1\">[1]</a></b>&nbsp;<a href=\"?categories=5&pages=2\">[2]</a>&nbsp;<a href=\"?categories=5&pages=3\">[3]</a>&nbsp;<a href=\"?categories=5&pages=3\">[3]</a>&nbsp;<a href=\"?categories=5&pages=4\">[4]</a>&nbsp;<a href=\"?categories=5&pages=5\">[5]</a>&nbsp;<a href=\"?categories=5&pages=6\">[6]</a></td></center>";
break;
case 6:
echo "<center><td colspan=\"7\" class=\"gpo\" align=\"center\" height=\"5\"><b><a href=\"?categories=6&pages=1\">[1]</a></b>&nbsp;<a href=\"?categories=6&pages=2\">[2]</a>&nbsp;<a href=\"?categories=6&pages=3\">[3]</a>&nbsp;<a href=\"?categories=6&pages=4\">[4]</a>&nbsp;<a href=\"?categories=6&pages=5\">[5]</a>&nbsp;<a href=\"?categories=6&pages=6\">[6]</a>&nbsp;<a href=\"?categories=6&pages=7\">[7]</a></td></center>";
break;  
case 7:
echo "<center><td colspan=\"7\" class=\"gpo\" align=\"center\" height=\"5\"><b><a href=\"?categories=7&pages=1\">[1]</a></b>&nbsp;<a href=\"?categories=7&pages=2\">[2]</a>&nbsp;<a href=\"?categories=7&pages=3\">[3]</a>&nbsp;<a href=\"?categories=7&pages=4\">[4]</a>&nbsp;<a href=\"?categories=7&pages=5\">[5]</a>&nbsp;<a href=\"?categories=7&pages=6\">[6]</a>&nbsp;<a href=\"?categories=7&pages=7\">[7]</a>&nbsp;<a href=\"?categories=7&pages=8\">[8]</a>&nbsp;<a href=\"?categories=7&pages=9\">[9]</a>&nbsp;<a href=\"?categories=7&pages=10\">[10]</a>&nbsp;<a href=\"?categories=7&pages=11\">[11]</a>&nbsp;<a href=\"?categories=7&pages=12\">[12]</a>&nbsp;<a href=\"?categories=7&pages=13\">[13]</a>&nbsp;<a href=\"?categories=7&pages=14\">[14]</a>&nbsp;<a href=\"?categories=7&pages=15\">[15]</a>&nbsp;<a href=\"?categories=7&pages=16\">[16]</a>&nbsp;<a href=\"?categories=7&pages=17\">[17]</a>&nbsp;<a href=\"?categories=7&pages=18\">[18]</a>&nbsp;<a href=\"?categories=7&pages=19\">[19]</a></td></center>";
break; 
default:
break; 
}
}
?>   </tr>
      </tbody></table>
		
		</td>
		<td colspan="2" rowspan="3">
			<img src="images/shopmain_13.gif" alt="" width="23" height="411"></td>
		<td colspan="4" valign="top" width="179" background="images/shopmain_14.gif" height="209"><!--attention item --> 

      <table border="0" cellpadding="5" cellspacing="0">
        <tbody><tr>
          <td colspan="3" height="1"></td>
        </tr>
        <tr>
          <td colspan="3">
            <table border="0" cellpadding="0" cellspacing="0">
              <tbody><tr>
                <td width="169" background="images/title_bg.gif" height="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php 
		if (!isset($_GET['detail'])){
		echo "Amplification ES (S)";
		} else {
		$id_name = $view['name'];
		echo $id_name;
		}
		?></b></td>
              </tr>
            </tbody></table>
          </td>
        </tr>
         
        <tr valign="top">
          <td width="64"><img src="images/items/<?php 
		if (!isset($_GET['detail'])){
		echo "30148.gif";
		} else {
		$id_item = $view['itemid'];
		$id_format = $view['format'];
		echo $id_item . $id_format;
		}
		?>" width="64" height="64"></td>
          <td class="gpo" valign="top" width="90%">
		  <?php 
		if (!isset($_GET['detail'])){
		echo "200";
		} else {
		$id_cost = $view['cost'];
		echo $id_cost;
		}
		?> dPoints<br>
		  
		  Count : <?php 
		if (!isset($_GET['detail'])){
		echo "20";
		} else {
		$id_count = $view['count'];
		echo $id_count;
		}
		?><br>
		  </td>
          <td width="10"></td>
        </tr>
        <tr>
          <td colspan="3" class="gpo2" valign="top"><font color="#ffffff">
		  <?php 
		if (!isset($_GET['detail'])){
		echo "For all levels When you purchase this package you will receive 1x Scroll of Acquisition! Use 1: Exp. Point x 1.5 for 1 hour. Stacks up to 3 times for Exp. Point x 2.5 for 1 hour. NOTE: Exp. Points gained from quests are excluded.";
		} else {
		$id_info = $view['info'];
		echo $id_info;
		}
		?>
		</font></td>
        </tr>
      </tbody></table>

		
		</td>
		<td rowspan="3">
			<img src="images/shopmain_15.gif" alt="" width="19" height="411"></td>
	</tr>
	<tr>
		<td colspan="4">
			<img src="images/shopmain_16.gif" alt="" width="179" height="48"></td>
	</tr>
	<tr>
		<td colspan="4" valign="top" width="179" background="images/shopmain_17.gif" height="135"> 
		
      <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tbody>
        <tr>
          <td colspan="3" class="gpo"><font color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;Item Price</font> <font color="#006697"><?php 
		if (!isset($_GET['detail'])){
		echo "200";
		} else {
		$id_cost = $view['cost'];
		echo $id_cost;
		}
		?></font></td>
        </tr>
        <tr>
          <td colspan="3" class="gpo"><font color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;Remain</font> <font color="#006697"><?php echo $dpt_left;?></font></td>
        </tr>
        <tr>
          <td colspan="3" height="10"></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><div align="center"><a href="buy.php?categories=<?php echo $topic;?>&pages=<?php echo $page;?><?php 
		if (!isset($_GET['detail'])){
		echo "&detail=30148";
		} else {
		echo "&detail=" . $id_item;
		}
		?>"><img src="images/icon_buy.gif" width="91" border="0" height="20"></a></div></td>
        </tr>
        <tr>
          <td colspan="3" height="20"><div align="center"><?php 
		if (!isset($_GET['msg'])){
		} else {
		$msg = $_GET['msg'];
		switch ($msg){
case 1:
echo "Thank you. Your item been sent to your mail system";
break; 
case 2:
echo "Not enough donation points.";
break; 
default:
break; 
}
}
		?></div></td>
        </tr>
      </tbody></table>  
      
      		
		</td>
	</tr>
		<tr>
		<td colspan="3"><img src="images/shopmain_18.gif" alt="" width="166" height="46"></td>
		<td><img src="images/shopmain_19.gif" alt="" width="10" height="46"></td>
		<td colspan="3" width="176" background="images/shopmain_20.gif" height="46">&nbsp;&nbsp;&nbsp;&nbsp;<font size="1" color="#000000"><b>Remain</b></font> <font size="3" color="#ffffff"><b><?php echo $dpt_left;?></b></font></td>
		
    <td colspan="3"><a href="sinfo.php" onMouseOver="MM_swapImage('Image8','','images/shopmain2_21.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_21.gif" alt="" name="Image8" id="Image8" width="156" border="0" height="46"></a></td>
		
    <td colspan="4"><a href="pinfo.php" onMouseOver="MM_swapImage('Image9','','images/shopmain2_22.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_22.gif" alt="" name="Image9" id="Image9" width="143" border="0" height="46"></a></td>
		
    <td colspan="2"><a href="fill.php" onMouseOver="MM_swapImage('Image10','','images/shopmain2_23.gif',1)" onMouseOut="MM_swapImgRestore()"><img src="images/shopmain_23.gif" alt="" name="Image10" id="Image10" width="95" border="0" height="46"></a></td>
		<td colspan="2"><img src="images/shopmain_24.gif" alt="" width="44" height="46"></td>
	</tr>
	<tr>
		<td><img src="images/spacer.gif" alt="" width="38" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="91" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="37" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="10" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="21" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="97" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="58" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="49" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="87" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="20" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="61" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="18" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="5" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="59" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="33" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="62" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="25" height="1"></td>
		<td><img src="images/spacer.gif" alt="" width="19" height="1"></td>
	</tr>
</tbody></table>
</body></html>

<?php
 // Closing Connection
 if (isset($con)){
 mysql_close($con);
 }
?>