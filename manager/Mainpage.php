<?php
require_once 'SimplePostManager.php';
require_once 'CommentManager.php';

error_reporting(E_ALL || ~E_NOTICE);

$sss = new SimplePostManager();
$comment = new CommentManager();
$sss->add();
$sss->removePost();
$comment->add();
$sss->findAllPosts();

?>


