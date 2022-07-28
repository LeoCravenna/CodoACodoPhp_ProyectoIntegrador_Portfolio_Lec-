<?php session_start();
      session_destroy();
      header("location: ../views_admin/login.php");
      die();
?>