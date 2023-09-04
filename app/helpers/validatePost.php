<?php
    function validatePost($post){
        $errors = array();
        
        if(empty($post['title'])){
            array_push($errors, "Title is required");
        }

        if(empty($post['body'])){
            array_push($errors, "Body of Post is required");
        }

    
        if(empty($post['topic_id'])){
            array_push($errors, "Please Select a Topic");
        }

        $existingPost = selectOne('posts', ['title' => $post['title']]);
        if($existingPost){
            if (isset($post['update-btn']) && $existingPost['id'] != $post['id']) {
                array_push($errors, "Post with that title already Exists");
            }

            if (isset($post['add-post'])) {
                array_push($errors, "Post with that title already Exists");
            }
            
        }

        return $errors;
    }


?>