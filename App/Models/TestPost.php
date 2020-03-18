<?php
// namespace App\Models;
// use PDO;
//
// class TestPost extends \App\Core\Model
// {
//     // Params
//     private static $table = 'posts';
//
//     //Get all posts
//     public static function testGetAll()
//     {
//         try {
//             $db = static::getDB();
//             $stmt = $db->query('SELECT id, title, body, author FROM posts ORDER BY created_at');
//             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             return $results;
//         } catch (PDOException $e) {
//             echo $e->getMessage();
//         }
//     }
//
//
//     //Get post by id
//     public static function testGetPostById($postid)
//     {
//         $db = static::getDB();
//         $query = $db->query("SELECT * FROM posts where id = {$postid}");
//         $result = $query->fetch(PDO::FETCH_ASSOC);
//         if($result) {
//             return $result;
//         } else {
//             return $result = [];
//             echo 'Sorry the post were not found';
//         }
//     }
//     public static function testAddPost($data)
//     {
//         $db = static::getDB();
//         echo self::$table;
//         $sql = 'INSERT INTO posts (category_id, title, body, author) VALUES (:category_id, :title, :body, :author)';
//         $stmt = $db->prepare($sql);
//
//         $stmt->bindParam(':category_id', $data['category_id']);
//         $stmt->bindParam(':title', $data['title']);
//         $stmt->bindParam(':body', $data['body']);
//         $stmt->bindParam(':author', $data['author']);
//
//         if ($stmt->execute()) {
//             return true;
//         } else {
//             die('ups something went wrong(Models Post.php (M)testAddPost)');
//         }
//     }
//
// }
