<?php 


    function checkRequestMethod($method)
    {
        if($_SERVER["REQUEST_METHOD"] == $method)
        {
            return true;
        }
    }

    function sanitizeInput($input)
    {
        return trim(htmlspecialchars(htmlentities(($input))));
    }

    function redirect($path)
    {
        header("location: $path");
        die;
    }

    function getData($filePath)
    {
        if(!file_exists($filePath))
        {
            return [];
        }
        return json_decode(file_get_contents($filePath));
    }

    function putData($filePath , $data)
    {
        file_put_contents($filePath , json_encode($data) , JSON_PRETTY_PRINT);
    }

    function AddUser($filePath,$user)
    {
        $users = getData($filePath);
        $users[] = $user;
        putData($filePath , $users);
    }

    function uniqueVal($input , $filePath)
    {
        $users = getData($filePath);
        foreach($users as $user)
        {
            if($user->email == $input)
            {
                return false;
            }
        }
        return true;
    }















 ?>