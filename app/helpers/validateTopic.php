<?php
    function validateTopic($topic){
        $errors = array();
        
        if(empty($topic['name'])){
            array_push($errors, "Topic Name is required");
        }

        if(empty($topic['description'])){
            array_push($errors, "Topic Description is required");
        }

        $existingTopic = selectOne('topics', ['name' => $topic['name']]);
        if($existingTopic){
            if($existingTopic){
                if (isset($topic['update-btn']) && $existingTopic['id'] != $topic['id']) {
                    array_push($errors, "Topic with that title already Exists");
                }
    
                if (isset($topic['add-topic'])) {
                    array_push($errors, "Topic with that title already Exists");
                }
                
            }
        }
        return $errors;
    }


?>