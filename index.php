<!DOCTYPE html>
<html lang="en">

<head>
   <title>Discuss Project</title>
   <?php include('./client/commonFiles.php'); ?>
</head>

<body>
   <?php
   session_start();
   include('./client/header.php');

   if (!isset($_SESSION['user']) || !isset($_SESSION['user']['username'])) {
       if (isset($_GET['signup'])) {
           include('./client/signup.php');
       } elseif (isset($_GET['login'])) {
           include('./client/login.php');
       } 
   } elseif (isset($_GET['ask'])) {
       include('./client/ask.php');
   } elseif (isset($_GET['q-id'])) {
       $qid = htmlspecialchars($_GET['q-id']);
       include('./client/question-details.php');
   } elseif (isset($_GET['c-id'])) {
       $cid = htmlspecialchars($_GET['c-id']);
       include('./client/questions.php');
   } elseif (isset($_GET['u-id'])) {
       $uid = htmlspecialchars($_GET['u-id']);
       include('./client/questions.php');
   } elseif (isset($_GET['latest'])) {
       include('./client/questions.php');
   } elseif (isset($_GET['search'])) {
       $search = htmlspecialchars($_GET['search']);
       include('./client/questions.php');
   } else {
       include('./client/questions.php');
   }
   ?>
</body>

</html>
