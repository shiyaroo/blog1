<?php
$username='root';
$pass='usbw';
$localhost='localhost';
$db_name='blog-task';

$conn=mysql_connect($localhost,$username,$pass,$db_name);
if (!$conn){die ('No connect'.mysql_error());
}
mysql_select_db($db_name,$conn);
if(!mysql_select_db($db_name,$conn))
{
    echo('DB '.$db_name.' no connect');
    exit();
}
?>
