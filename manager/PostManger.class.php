<?php
//namespace Post;

interface PostManager{
    public function findAllPosts();
    public function findPostById(int $id); 
    public function removePost();
}


