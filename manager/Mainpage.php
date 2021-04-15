<?php
require_once 'SimplePostManager.php';

error_reporting(E_ALL || ~E_NOTICE);

$sss = new SimplePostManager();
$sss->add();
$sss->removePost();
$sss->findAllPosts();


?>


