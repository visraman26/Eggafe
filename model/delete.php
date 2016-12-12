<?php
/**
 * Created by PhpStorm.
 * User: Vishal Raman
 * Date: 12-Dec-16
 * Time: 10:56 AM
 */
include "../helper/connect.php";
$sql = "DELETE FROM menu WHERE id = '".$_POST["id"]."'";
if(mysqli_query($connect, $sql))
{
    echo 'Data Deleted';
}
?>