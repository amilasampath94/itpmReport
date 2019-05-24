<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
  unset($_COOKIE['em']);
  unset($_COOKIE['password']);
  setcookie('em', null, -1, '/');
  setcookie('password', null, -1, '/');

  header("Location: ../main/index.php"); // Redirecting To Home Page
}
?>
