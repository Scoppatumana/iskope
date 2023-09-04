<?php
    function validateCollection($collection){
        $errors = array();
        
        if(empty($collection['name'])){
            array_push($errors, "Collection Name is required");
        }

        if(empty($collection['description'])){
            array_push($errors, "Collection Description is required");
        }

        $existingCollection = selectOne('collections', ['name' => $collection['name']]);
        if($existingCollection){
            if($existingCollection){
                if (isset($collection['update-btn']) && $existingCollection['id'] != $collection['id']) {
                    array_push($errors, "Collection with that title already Exists");
                }
    
                if (isset($collection['add-collection'])) {
                    array_push($errors, "Collection with that title already Exists");
                }
                
            }
        }
        return $errors;
    }


?>