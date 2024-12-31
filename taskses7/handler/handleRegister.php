<?php 

    session_start();
    include("../core/function.php");
    include("../core/validation.php");

    $errors =[];

    if(checkRequestMethod("POST"))
    {
        foreach($_POST as $key => $value)
        {
            $$key = sanitizeInput($value);
        }

        // validation name 
        if(!requiredVal($name))
        {
            $errors[] = "name is required";
        }
        else if(!minVal($name , 3))
        {
            $errors[] = "name must be grater than 3 chars ";
        }
        else if(!maxVal($name , 15))
        {
            $errors[] = "name must be smaller than 25 chars ";
        }

        // validation email 
        if(!requiredVal($email))
        {
            $errors[] = "email is required";
        }
        else if(!emailVal($email))
        {
            $errors[] = "please type a valid email ";
        }
        else if(!uniqueVal($email , "../storage/users.json"))
        {
            $errors[] = "email is already taken";
        }

        // validation password 
        if(!requiredVal($password))
        {
            $errors[] = "password is required";
        }
        else if(!minVal($password , 6))
        {
            $errors[] = "password must be grater than 6 chars ";
        }
        else if(!maxVal($password , 25))
        {
            $errors[] = "password must be smaller than 25 chars ";
        }
        
        
        $data = 
        [
            "id" => uniqid(),
            "name" => $name,
            "email" => $email,
            "password" => sha1($password)
        ];
        
        if(empty($errors))
        {
            AddUser("../storage/users.json" , $data);
            $_SESSION["auth"] = [$data["id"] , $name , $email];
            redirect("../views/index.php");
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            redirect("../views/register.php");
        }

        
    }
    else 
    {
        redirect("../views/register.php");
    }

    























 ?>