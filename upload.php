


<html><title>:: TABLETOP REsources ::</title>
 
  
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
          <td><img src="images/menu_upload.png" width="754" height="25" border="0" usemap="#Map"></td>
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
           <td><p class="style33 style47">Upload File</p>
               <br>     
                   	<form action="" method="post" enctype="multipart/form-data" name="uploadFile" id="uploadFile">
				
  <label for="file"> </label>

				
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
   
    <tr> 
      <td width="10%">&nbsp;</td>
      <td width="90%">&nbsp;</td>
    </tr>
    <tr> 
      <td>File</td>
      <td><input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" /> 
        <input type="file" name="upload" id="file" />
        (Acceptable Type: .doc, .txt, .pdf, .jpg, .mp3, .avi, .flv, .png)</td>
    </tr>
      <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="upload" value="upload" /></td>
    </tr>
  </table>
  <p>&nbsp; </p>
</form>


<?php

// define('UP_DIR', 'C:\localhost\htdocs\Site1\files\\');
//modules/videoaudio.php
require_once("config.php");

        

if(!empty($_FILES['upload']))
{
 echo $_FILES['upload']['name'];
  $file = $_FILES['upload']['name'];
 //pecahkan file name mengikut .dot
 $part = explode(".",$_FILES['upload']['name']);
 echo "<pre>";
 //var_dump($part);
 //dptkan extension
 $extension = $part[count($part)-1];
 //extension mesti berada di index terakhir
 //filter allowed (semua lowercase)
 $allowed[] = "doc";
 $allowed[] = "pdf";
 $allowed[] = "jpg";
 $allowed[] = "bmp";
 $allowed[] = "gif";
$allowed[] = "txt";
 $allowed[] = "png";
  $allowed[] = "mp3";
 $allowed[] = "flv";
 $allowed[] = "wmv";
 $allowed[] = "avi";
 
 
 
 
 
 
 //convert $extension ke lower case
 $extension = strtolower($extension);
 //check for security
 if(in_array($extension, $allowed))
 {
  //echo "Upload success";
  
       // upload file
      $oldpath =$_FILES['upload']['tmp_name'];
     // $newpath = "mediaDB/".$_SESSION['uid'].".".$extension;
      $newpath = "mediaDB/".$file;
        
      
      if(move_uploaded_file($oldpath,$newpath))
      {
       echo "File Uploaded ";
       echo "<a href ='$newpath'> Open</a>";  
      }
      
     	$insert_upload = insert_upload($file); 
  
 }
     
}

 function insert_upload($file)
      {
			
      
      
      $link = mysql_connect("localhost", "root", "");
      if(!$link) { die('Failed to connect to server: ' . mysql_error()); }
	
      //Select database
      $db = mysql_select_db("demo",$link);
      if(!$db) { die("Unable to select database"); }
 		
        		
      	$ins = sprintf("INSERT INTO video( file_name) 
      								VALUES('%s') ",
      						//		mysql_real_escape_string($extension),
      								mysql_real_escape_string($file));
      								//mysql_real_escape_string($file_keywords));
      							
      	$result = mysql_query($ins);
	
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
  <area shape="rect" coords="240,4,360,23" href="search.php"> 
  </map>

</html>

