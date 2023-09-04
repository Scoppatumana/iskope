<?php
    function validateRole($role){
        $errors = array();
        
        if(empty($role['name'])){
            array_push($errors, "Role Name is required");
        }

        if(empty($role['description'])){
            array_push($errors, "Role Description is required");
        }

        $existingRole = selectOne('roles', ['name' => $role['name']]);
        if($existingRole){
            if($existingRole){
                if (isset($role['update-btn']) && $existingRole['id'] != $role['id']) {
                    array_push($errors, "Role with that title already Exists");
                }
    
                if (isset($role['add-role'])) {
                    array_push($errors, "Role with that title already Exists");
                }
                
            }
        }
        return $errors;
    }


?>