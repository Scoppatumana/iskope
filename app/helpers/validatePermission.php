<?php
    function validatePermission($permissions){
        $errors = array();
        
        if(empty($permissions['name'])){
            array_push($errors, "Permission Name is required");
        }

        if(empty($permissions['description'])){
            array_push($errors, "Permission Description is required");
        }

        $existingPermission = selectOne('roles', ['name' => $permissions['name']]);
        if($existingPermission){
            if($existingPermission){
                if (isset($permissions['update-btn']) && $existingPermission['id'] != $permissions['id']) {
                    array_push($errors, "Permission with that title already Exists");
                }
    
                if (isset($permissions['add-permission'])) {
                    array_push($errors, "Role with that title already Exists");
                }
                
            }
        }
        return $errors;
    }


?>