<?php

/*
** General Message
*/
$try_again = "Please try again. Thank you.";

/*
** Upload File Message
*/
$max = number_format(MAX_FILE_SIZE/10240, 1).'KB'; //convert the max size to kb

$upload_too_big = "The file was too big to be uploaded. Please try a smaller file.";
$upload_no_file = "No file was selected. " . $try_again ;
$upload_success = " uploaded successfully.";
$upload_exceed_allowed_size = "The file cannot be uploaded. Maximum size: $max.";
$upload_false_type = "The file cannot be uploaded. Please use acceptable file format.";
$upload_fail = "Error uploading the file. Please try again.";

?>