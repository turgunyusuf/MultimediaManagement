
html><title>::  TABLETOP REsources ::</title>
 
  
  <link rel="stylesheet" href="script/css.css" type="text/css" media="screen">  
  <script src="script/rps_js.js" language="JavaScript"></script>
  <script language="javascript" type="text/javascript" src="script/datetimepicker.js"></script>
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-bottom: 0px;
	background-color: #000000;
	background-image: url(images/bg3.gif);
	background-repeat: repeat-x;
}
.style1 {	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
}
.style47 {font-size: 14px}
.style49 {
	color: #FFFFFF;
	font-size: 12px;
}
.style53 {font-family: Arial, Helvetica, sans-serif}
.style54 {color: #FFFF00}
.style59 {font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; }
.style61 {font-size: 12px; font-weight: bold; }
.style57 {font-size: 10; font-weight: bold; }
-->
</style>
</head><body id="home">
<div align="center">
  <table width="850" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="760" height="100" valign="bottom" bgcolor="#3d3d3d"><table width="760" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="75" valign="top"><table width="200" border="0" cellspacing="2" cellpadding="4">
            
          </table></td>
        </tr>
        <tr>
          <td><img src="images/menu_search.png" width="754" height="25" border="0" usemap="#Map"></td>
        </tr>
      </table></td>
      
    </tr>
    <tr>
      <td colspan="2" valign="top" background="images/bg_home.jpg"><br>
        <table width="818" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr>
          <td><div align="center"><img src="images/banner.png" alt="" width="500" height="150"></div></td>
        </tr>
      </table>
          <br>
          <table width="818" border="0" align="center" cellpadding="1" cellspacing="1">
            <tr>
           <td><p class="style33 style47">Search File</p>
               <br>     
                   <form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
     
    </tr>
    <tr> 
      <td width="10%">&nbsp;</td>
      <td width="90%">&nbsp;</td>
    </tr>
    <tr> 
      <td>File Type</td>
      <td><input type="checkbox" name="file_type[]" value="img">
        Image 
        <input type="checkbox" name="file_type[]" value="doc">
        Video 
        <input type="checkbox" name="file_type[]" value="doc">
        Audio 
        <input type="checkbox" name="file_type[]" value="doc">
        Document 
       </td>
    </tr>
    <tr> 
      <td>Keywords</td>
      <td><textarea name="keywords"></textarea></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input name="search" type="submit" id="search" value="Search" /></td>
    </tr>
  </table>
</form>


















<?php
  require_once("config.php");
	require_once('vars.php');
	
	$link = mysql_connect("localhost", "root", "");
if(!$link) { die('Failed to connect to server: ' . mysql_error()); }
	
//Select database
$db = mysql_select_db("demo",$link);
if(!$db) { die("Unable to select database"); }
	


if(array_key_exists('search', $_POST)) {		
	$file_type = $_POST['file_type'];
	$file_keywords = $_POST['keywords'];
	$search = search_media($file_type, $file_keywords);
  //var_dump($file_type, $file_keywords);
}

function search_media($file_type='', $file_keywords='')
{
	$ret = '';
	$thumbWidth ="" ;
	
	foreach ($file_type as $type) {
		
		switch ($type){
			case 'img'  : $doc_type = "Image";break;
			case 'video': $doc_type = "Video";break;
			case 'audio': $doc_type = "Audio";break;
			case 'doc'  : $doc_type = "Document";break;
		
		}
			
		$result = mysql_query("SELECT * FROM video WHERE file_name LIKE '%$file_keywords%'" );
		$num = mysql_num_rows($result);
		if ($num>0) {
			echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
			  <tr>
			
				
			  </tr>		  
			";
					
				while ($row = mysql_fetch_object($result)) {
				$file = $row->file_name;				
			
      	echo "<tr><td>";
				if ($type == 'img')
        {
				echo "<img src=\"".IMAGE. $file."\"> ";   		     
				} 
        else if ($type == 'video') 
        {
					echo "<a href=\"".doc. $file."\"> ";break;
				} 
        else if ($type == 'audio') 
        {
					echo "<a href=\"".doc. $file."\"> ";break;
				} 
        else if ($type ==	'doc')
        {
					echo "<a href=\"".DOC. $file."\">". $file."</a> ";
				} 
        echo "</td> </tr>";
			}
		} else {
			echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
			  <tr>
				<td>SEARCH RESULT </td>
			  </tr>		  
			";		
			echo "<tr>
				<td>No Result Found.</td>
				</tr>";
		}
		
		echo "</table>";
		
	}
	return $ret;

}	



?>

                 
            </tr>
          </table>          
          <br>
		  
		</td>
    </tr>
    
    <tr>
      <td colspan="2" bgcolor="#878787">&nbsp;</td>
    </tr>
    <tr>
      <td height="65" colspan="2" bgcolor="#1d1d1d"><div align="center">
       <?php include("inc_footer.htm"); ?>
       <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div></td>
    </tr>
  </table>

</div>

<map name="Map"> 
<area shape="rect" coords="4,4,100,21" href="index.php">
 <area shape="rect" coords="110,5,230,22" href="upload.php"> 
  </map>

</html>


