<?php  
/** 
 * Created by Masdi a.k.a Zacky 
 * User: Masdi 
 * Date: 14/10/2017 
 * Time: 23:25 
 */  
  
session_start();
session_destroy();  
header('location: usermasuk.php'); //udah logout di arahkan ke login lagi
exit();
?>