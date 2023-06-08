<?php
if (!isset($_SESSION)) { session_start(); }
 
if ($_SESSION["LOGIN"]=='NO' ){
   header("Location:index.php"); 
}
?>