<?php

    $h = new Helper();
    $msg = '';
    $username = '';

    if (isset($_POST['submit']))
    {        
        $username = $_POST['username'];                

        if ($h->isEmpty(array($username, $_POST['password'], $_POST['confirm_password'])))
        {
            $msg = 'Remember to fill everything!';     
        }
        else if (!$h->isValidLength($username, 6, 100)){
            $msg = 'Username must be between 6 and 100 characters';
        }
        else if (!$h->isValidLength($_POST['password'])){
            $msg = 'Password must be between 8 and 20 characters';
        }
        else if (!$h->isSecure($_POST['password'])){
            $msg = 'Password must contain at least one lowercase character, one uppercase character and one digit (boring, right?)';
        }
        else if (!$h->passwordsMatch($_POST['password'], $_POST['confirm_password'])){
            $msg = 'Passwords do not match. They\'re clearly not compatible.';
        }        
        else
        {
            $member = new BlogMember($username);

            if ($member->isDuplicateID())
            {
                $msg = "Some lucky bitch got that name first, pal.";
            }
            else
            {
                $member->insertIntoMembersDB($_POST['password']);
                header("Location: index.php?new=1");                
            }
        }
            
    }