<?php
session_start();
require_once '../../loader.php';
require_once './../functions.php';

// $mentee = new App\Models\Mentee();

// $db = new App\DBOperation\DatabaseOperation();

// var_dump($mentee);

if (isset($_POST)) {
    $type = $_POST['type'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($type == 'mentee') {
        // require_once __DIR__.'/../models/Mentee.php';
        $mentee = new App\Models\Mentee();
        $mentee = $mentee->getMenteeBy('email', $email);
        // var_dump($mentee);
        if ($mentee->num_rows == 0) {
            echo "<h1>Mentee with email $email not found</h1><br/><a href='".site_url().'login.php?type=mentee'."'>Back to Login</a>";
        } else {
            // var_dump();
            $mentee = $mentee->fetch_assoc();
            if (password_verify($password, $mentee['password'])) {
                $_SESSION['mentee_data'] = $mentee;
                echo "<h1>Login Successful</h1><br/><a href='".site_url().'mentee.php'."'>Go to profile</a>";
            } else {
                echo "<h1>Incorrect password</h1><br/><a href='".site_url().'login.php?type=mentee'."'>Back to Login</a>";
            }
        }
    } else if ($type == 'mentor') {
        // require_once __DIR__.'/../models/Mentor.php';
        $mentor = new App\Models\Mentor();
        $mentor = $mentor->getMentorBy('email', $email);
        // var_dump($mentor);
        if ($mentor->num_rows == 0) {
            echo "<h1>Mentor with email $email not found</h1><br/><a href='".site_url().'login.php?type=mentor'."'>Back to Login</a>";
        } else {
            // var_dump();
            $mentor = $mentor->fetch_assoc();
            if (password_verify($password, $mentor['password'])) {
                $_SESSION['mentor_data'] = $mentor;
                echo "<h1>Login Successful</h1><br/><a href='".site_url().'mentor.php'."'>Go to profile</a>";
            } else {
                echo "<h1>Incorrect password</h1><br/><a href='".site_url().'login.php?type=mentor'."'>Back to Login</a>";
            }
        }
    } else {
        echo "<h2>You hit a snag</h2>";
    }
}