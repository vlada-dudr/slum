<?php
require_once("../Autoloader.php");
spl_autoload_register('Autoloader::ClassLoader');

$app = App::getInstance();
$db = $app->getConn();

$postCount = $_POST['postCount'];

$stmt = $db->query("SELECT * FROM text LIMIT " . $postCount);
$posts = array();
while ($row = $stmt->fetch())
{
    $post = new Post($row['id'], $row['title'], $row['body'], $row['author'], $row['post_date']);
    array_push($posts, $post);
}

foreach($posts as $post) {
  //echo "<div class=\"posts\">";
    echo "<div class=\"post\">" .
    "<h2 class=\"post__title\">" . $post->title . "</h2>" .
    "<p class=\"post__author\">" . $post->author . "</p>" .
    "<p class=\"post__body\">" . $post->body . "</p>" .
    "<p class=\"post__date\">" . $post->post_date . "</p>" .
    "<p class=\"post__time\">" . $post->post_time . "</p>" .
    "</div>";
  //echo "</div>";
  $posts = null;
}
