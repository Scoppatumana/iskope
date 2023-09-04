<?php
    function validateUser($user){
        $errors = array();
        
        if(empty($user['username'])){
            array_push($errors, "Username is required");
        }

        if(empty($user['email'])){
            array_push($errors, "Email is required");
        }

        if(empty($user['password'])){
            array_push($errors, "Password is required");
        }

        if($user['password'] !== $user['create_password']){
            array_push($errors, "Password Do Not Match");
        }

        if(isset($user['role_id'])){
            if(empty($user['role_id'])){
                array_push($errors, "Assign A Role To The User!!");
            }
        }

        if(isset($user['bio'])){
            if(empty($user['bio'])){
                array_push($errors, "Say something about the user!!");
            }
        }

        $existingUser = selectOne('users', ['email' => $user['email']]);
            if($existingUser){
                if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
                    array_push($errors, "User with that name already Exists");
                }

                if (isset($user['create-admin']) || isset($user['register-btn'])) {
                    array_push($errors, "User with that name already Exists");
                }
                
            }
        return $errors;
    }


    function validateUpdate($user){
        $errors = array();
        
        if(empty($user['username'])){
            array_push($errors, "Username is required");
        }

        if(empty($user['email'])){
            array_push($errors, "Email is required");
        }

        if(isset($user['bio'])){
            if(empty($user['bio'])){
                array_push($errors, "Say something about the user!!");
            }
        }

        // if(isset($user['password']) || isset($user['create_password'])){
        //     if(empty($user['password'])){
        //         array_push($errors, "Password is required");
        //     }

        //     if(empty($user['create_password'])){
        //         array_push($errors, "Password Confirmation is required");
        //     }
    
        //     if($user['password'] !== $user['create_password']){
        //         array_push($errors, "Password Do Not Match");
        //     }
        // }

        $existingUser = selectOne('users', ['email' => $user['email']]);
            if($existingUser){
                if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
                    array_push($errors, "User with that name already Exists");
                }

                if (isset($user['create-admin']) || isset($user['register-btn'])) {
                    array_push($errors, "User with that name already Exists");
                }
                
            }
        return $errors;
    }



    function validateLogin($user){
        $errors = array();
        
        if(empty($user['email'])){
            array_push($errors, "Email is required");
        }

        if(empty($user['password'])){
            array_push($errors, "Password is required");
        }
        
        return $errors;
    }

?>