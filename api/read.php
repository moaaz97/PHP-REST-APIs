<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//Initializing our API
include_once ('../Core/initialize.php');

$connection = null;

//Instantiate post
$post = new Post($connection);

//Post Query
$result = $post->read();
//Get The Row Count
$num = $result->rowCount();

if ($num > 0) {
    $post_arr = array();
    $post_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );
        $post_arr['data'][] = $post_item;
        //Convert to JSON
        echo json_encode($post_arr);
    }
} else {
    echo json_encode(array('message' => 'No Posts Found'));
}