<?php

/*
** MySQL Database Configuration
*/
define('SQL_USER', 'root');
define('SQL_PASS', '');
define('SQL_HOST', 'localhost');
define('SQL_DB', 'retrieval');

/*
** Set Default timezone to asia/KL timezone
*/
date_default_timezone_set('Asia/Kuala_Lumpur');


/*
** Upload Parameters
*/
define('PROJECT_FOLDER', 'retrieval');
define('UP_DIR', $_SERVER['DOCUMENT_ROOT'].'/'.PROJECT_FOLDER.'/' ); // define('UP_DIR', 'C:\localhost\htdocs\Site1\files\\');
define('MAX_FILE_SIZE', 10240000);
define('IMAGE', 'mediaDB/');
define('VIDEO', 'mediaDB/');
define('APP', 'mediaDB/');
define('DOC', 'mediaDB/');
/*
** Allowed MIME type
*/

?>