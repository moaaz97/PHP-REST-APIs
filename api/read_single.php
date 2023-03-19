<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//Initializing our API
include_once ('../Core/initialize.php');

//Instantiate post
$post = new Post($connection);
$post->id = $_GET['id'] ?? die();
$post->read_single();
$post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
);

print_r(json_encode($post_arr));