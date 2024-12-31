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

        // validation email 
        if(!requiredVal($email))
        {
            $errors[] = "email is required";
        }
        else if(!emailVal($email))
        {
            $errors[] = "please type a valid email ";
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
            "email" => $email,
            "password" => sha1($password)
        ];

        if(empty($errors))
        {
            $users = getData("../storage/users.json");
            $checkOut = 0;
            foreach($users as $user)
            {
                if($user->email == $data["email"] && $user->password == $data["password"])
                {
                    $id = uniqid();
                    $checkOut++;
                    $_SESSION["auth"] = [$id , $user->name , $user->email];
                    redirect("../views/profile.php");
                }
            }
            if($checkOut == 0)
            {
                redirect("../views/login.php");
            }
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            redirect("../views/login.php");
        }

    }
    else 
    {
        redirect("../views/login.php");
    }
    






















 ?>