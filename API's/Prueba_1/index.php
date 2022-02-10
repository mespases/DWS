<?php

  include_once 'post.php';
  $post = new post();


  $id = 1;
  $lang = $post->getLang($id);
  $post_arr = Array();
  $post_arr["data"] = Array();


  $post_item = array(
    'id' => $lang['language_id'],
    'name' => $lang['name'],
    'last_update' => $lang['last_update']
  );
  array_push($post_arr['data'], $post_item);

  echo json_encode($post_arr)
?>
