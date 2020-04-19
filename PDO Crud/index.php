<?php

$host = 'localhost';
$user = 'root';
$pwd = '';
$dbName = 'oop_pdo';

// Set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $pwd);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// Set Emulate to false to allow query limits
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


// PDO Query
$stmt = $pdo->query('SELECT * FROM posts');

// Fetch Assoc
// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//   echo $row['title'] . '<br>';
// }

// Fetch Obj
// while ($row = $stmt->fetch()) {
//   echo $row->title . '<br>';
// }


// Prepared Statement (prepare and execute)

// User Input
$author = 'Ahad';
$is_published = true;
$id = 1;
$limit = 1;

// Fetch Multiple Posts

// Positional Params (? denotes a placeholder)
// $sql = 'SELECT * FROM posts WHERE author = ?';
$sql2 = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?';

// $stmt = $pdo->prepare($sql);
$stmt = $pdo->prepare($sql2);

$stmt->execute([$author, $is_published, $limit]);
$posts = $stmt->fetchAll();

// Named Params
// $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['author' => $author, 'is_published' => $is_published]);
// $posts = $stmt->fetchAll();

// check result set type
// var_dump($posts);

foreach ($posts as $post) {
  echo $post->title . '<br>';
}

// Fetch Single Post
// $sql = 'SELECT * FROM posts WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// $post = $stmt->fetch();
// echo $post->body;


// Get Row Count
// $sql = 'SELECT * FROM posts WHERE author = ?';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$author]);
// $postCount = $stmt->rowCount();
// echo $postCount;


// Insert Data
// $title = 'Post Five';
// $body = 'This is post five';
// $author = 'Dennis';

// $sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
// echo 'Post Added';


// Update Data
// $id = 1;
// $body = 'This is the Updated Post';

// $sql = 'UPDATE posts SET body = :body WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['body' => $body, 'id' => $id]);
// echo 'Post Updated';


// Delete Data
// $id = 3;

// $sql = 'DELETE FROM posts WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// echo 'Post Deleted';


// Search Data
// $search = '%post%';
// $sql = 'SELECT * FROM posts WHERE title LIKE ?';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$search]);
// $posts = $stmt->fetchAll();

// foreach ($posts as $post) {
//   echo $post->title . '<br>';
// }
