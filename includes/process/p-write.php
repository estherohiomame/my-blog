<?php

if (!isset($_SESSION['username']) || !isset($_SESSION['is_admin'])) {
    header("Location: admin.php");
    } else {
        $h = new Helper();
        $msg = '';
        $post = '';
        $title = '';
        $audience = '';

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $post = $_POST['post'];
            $audience = $_POST['audience'];

            if ($h->isEmpty(array($title, $post, $audience))) {
                $msg = "Silly you, you didn't forget to actually fill this, did you?";
            } else {
                $admin = new Admin($_SESSION['username']);
                $admin->insertIntoPostDB($title, $post, $audience);
                $msg = "Post Saved Successfully.";
                header("Location: read.php");
            }
            
        }
        
}
