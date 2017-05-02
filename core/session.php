<?php
   include('server.php');
   //include('index.php');
   session_start();
   
   $user_check = $_SESSION['login'];
   
   $ses_sql = mysqli_query($db,"select login from llx_user where login = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   

   $login_session = $row['login'];

   
   
   /*if(!isset($_SESSION['login'])){
      header("location:index.php");
   }*/

   
?>