<?php 
session_start();

require('connection.php');
    // Function For Temporary Printing
    function printResult($value){
        echo "<pre>", print_r($value, true), "</pre>";
    }

    // Function to execute Query
    function executeQuery($sql, $data){
        global $conn;
        $stmt = $conn->prepare($sql);
        $values = array_values($data);
        $type = str_repeat("s", count($values));
        $stmt->bind_param($type, ...$values);
        $stmt->execute();
        return $stmt;
    }


    

    // Function To Select All Rows
    function selectAll($table, $conditions = []){
        global $conn;
        $sql = "SELECT * FROM $table";
        if (empty($conditions)) {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }else{
            $i = 0;
          
            foreach ($conditions as $key => $value) {
                if ($i === 0) {
                   $sql = $sql . " WHERE $key = ?";
                }else{
                   $sql = $sql . " AND $key = ?";
                }
                $i++;
            }

            $stmt = executeQuery($sql, $conditions);
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }

    
    // Function To Select One Row
    function selectOne($table, $conditions){
        global $conn;
        $sql = "SELECT * FROM $table";
        $i = 0;
        
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key = ?";
            }else{
                $sql = $sql . " AND $key = ?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT 1";
        $stmt = executeQuery($sql, $conditions);
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
            
    }

     // Function To Insert to the Database
     function create($table, $data){
        global $conn;
        $sql = "INSERT INTO $table SET ";
        $i = 0;
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $sql = $sql . "$key = ?";
            }else{
                $sql = $sql . ",$key = ?";
            }
            $i++;
        }

        $stmt = executeQuery($sql, $data);
        $id = $stmt->insert_id;
        return $id;
            
    }

    // Function to Update the Database
    function update($table, $data, $id){
        global $conn;
        $sql = "UPDATE $table SET ";
        $i = 0;
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $sql = $sql . "$key = ?";
            }else{
                $sql = $sql . ",$key = ?";
            }
            $i++;
        }

        $sql = $sql . " WHERE id=?";
        
        $data['id'] = $id;
        $stmt = executeQuery($sql, $data);
        $record = $stmt->affected_rows;
        return $record;
    }

    function emailUpdate($table, $data, $email){
        global $conn;
        $sql = "UPDATE $table SET ";
        $i = 0;
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $sql = $sql . "$key = ?";
            }else{
                $sql = $sql . ",$key = ?";
            }
            $i++;
        }

        $sql = $sql . " WHERE email=?";
        
        $data['email'] = $email;
        $stmt = executeQuery($sql, $data);
        $record = $stmt->affected_rows;
        return $record;
    }

    // Function to Delete Row from the Database
    function delete($table, $id){
        global $conn;
        $sql = "DELETE FROM $table WHERE id=?";
        
        $stmt = executeQuery($sql, ['id' => $id]);
        $record = $stmt->affected_rows;
        return $record;
    }

    
function slug($text){ 
    // replace non letter or digits by - 
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text); 
    // trim $text = trim($text, '-'); // transliterate 
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text); 
    // lowercase 
    $text = strtolower($text); 
    // remove unwanted characters 
    $text = preg_replace('~[^-\w]+~', '', $text); 
    if (empty($text)) { 
        return 'n-a'; 
    } 
    return $text; 
    }



    function getPublishedPosts(){
        global $conn;
        $sql = "SELECT 
                p.*, u.username, 
                u.image AS userImage, 
                t.name AS topicName 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            JOIN topics AS t 
            ON p.topic_id=t.id 
            WHERE p.published=?";

        $stmt = executeQuery($sql, ['published' => 1]);
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record;
    }

    function getFeaturedPosts(){
        global $conn;
        $sql = "SELECT 
                p.*, u.username, 
                u.image AS userImage, 
                t.name AS topicName 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            JOIN topics AS t 
            ON p.topic_id=t.id 
            WHERE p.published=? 
            AND p.featured_post=?";

        $stmt = executeQuery($sql, ['published' => 1, 'featured_post'=>1]);
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }

    function getPoliticsNews(){
        global $conn;
        $sql = "SELECT 
                p.*, u.username, 
                u.image AS userImage, 
                t.name AS topicName 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            JOIN topics AS t 
            ON p.topic_id=t.id 
            WHERE p.published=?
            AND t.name=?";

        $stmt = executeQuery($sql, ['published' => 1, 'name'=>'Politics']);
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record;
    }

    function getEntertainmentNews(){
        global $conn;
        $sql = "SELECT 
                p.*, u.username, 
                u.image AS userImage, 
                t.name AS topicName 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            JOIN topics AS t 
            ON p.topic_id=t.id 
            WHERE p.published=?
            AND t.name=?";

        $stmt = executeQuery($sql, ['published' => 1, 'name'=>'Entertainment']);
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record;
    }

    function getSportNews(){
        global $conn;
        $sql = "SELECT 
                p.*, u.username, 
                u.image AS userImage, 
                t.name AS topicName 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            JOIN topics AS t 
            ON p.topic_id=t.id 
            WHERE p.published=?
            AND t.name=?";

        $stmt = executeQuery($sql, ['published' => 1, 'name'=>'Sports']);
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record;
    }

    function searchPosts($term){
        $match = '%' . $term . '%';
        global $conn;
        
        $sql = "SELECT 
                    p.*, u.username,
                    u.image AS userImage, 
                    t.name AS topicName 
                FROM posts AS p 
                JOIN users AS u 
                ON p.user_id=u.id 
                JOIN topics AS t 
                ON p.topic_id=t.id 
                WHERE p.title LIKE ? OR p.body LIKE ?";
        
        $stmt = executeQuery($sql, ['title'=> $match, 'body'=> $match]);
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record;
    }


    function getPostsByTopicId($pub,$topic_id,$limit,$offset){
        global $conn;
        $sql = "SELECT 
                p.*, u.username, 
                u.image AS userImage, 
                t.name AS topicName, 
                t.description AS topicDescription
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            JOIN topics AS t 
            ON p.topic_id=t.id 
            WHERE p.published=? AND topic_id=?
            LIMIT ? OFFSET ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiii', $pub, $topic_id, $limit, $offset);
        $stmt->execute();
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record;
    }

    function getPostsByUserId($pub,$user_id,$limit,$offset){
        global $conn;
        $sql = "SELECT 
                p.*, u.username, 
                u.image AS userImage, 
                t.name AS topicName 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            JOIN topics AS t 
            ON p.topic_id=t.id 
            WHERE p.published=? AND user_id=?
            LIMIT ? OFFSET ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iiii', $pub, $user_id, $limit, $offset);
        $stmt->execute();
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record;
    }

    function getSinglePost($post_id){
        global $conn;
        $sql = "SELECT 
                p.*, u.username, 
                u.image AS userImage, 
                t.name AS topicName 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            JOIN topics AS t 
            ON p.topic_id=t.id 
            WHERE p.id=?";

        $stmt = executeQuery($sql, ['id' => $post_id]);
        $record = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $record;
    }

    function selectRandom($table, $topic_id){
        global $conn;
        $sql = "SELECT * FROM $table WHERE topic_id= ? ORDER BY RAND() LIMIT 8";

        $stmt = executeQuery($sql, ['topic_id' => $topic_id]);
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }


    function timeElapsedSinceNow( $datetime, $full = false ) { 
        $now = new DateTime; $then = new DateTime( $datetime ); 
        $diff = (array) $now->diff( $then ); $diff['w'] = floor( $diff['d'] / 7 ); 
        $diff['d'] -= $diff['w'] * 7; 
        $string = array( 'y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second', ); 
        foreach( $string as $k => & $v ) { 
          if ( $diff[$k] ) { 
            $v = $diff[$k] . ' ' . $v .( $diff[$k] > 1 ? 's' : '' ); 
          } else { 
            unset( $string[$k] ); 
          } 
        } if ( ! $full ) $string = array_slice( $string, 0, 1 ); return $string ? implode( ', ', $string ) . ' ago' : 'just now'; 
      }

      function limit($table, $first_result, $results_per_page, $conditions = []){
        global $conn;
       

        


        if (empty($conditions)) {
            $sql = "SELECT * FROM $table LIMIT $first_result , $results_per_page";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $result;
        }else{
            $sql = "SELECT * FROM $table ";
            $i = 0;
          
            foreach ($conditions as $key => $value) {
                if ($i === 0) {
                   $sql = $sql . " WHERE $key = ?";
                }else{
                   $sql = $sql . " AND $key = ?";
                }
                $i++;
            }
            $sql = $sql . " LIMIT $first_result , $results_per_page";

            $stmt = executeQuery($sql, $conditions);
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
            
    }


?>