<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));  
$db_host = "localhost"; // Giữ mặc định là localhost
$db_name    = 'demoadmin';// Can thay doi
$db_username    = 'root'; //Can thay doi
$db_password    = '';//Can thay doi
@mysql_connect("{$db_host}", "{$db_username}", "{$db_password}") or die("Không thể kết nối database");
@mysql_select_db("{$db_name}") or die("Không thể chọn database");
?>
