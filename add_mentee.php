<?php
session_start();
include_once './loader.php';
include_once './config/functions.php';
$menteeId = $_GET['id'];
$mentorId = $_SESSION['mentor_data']['id'];

$mentorMentee = new App\Models\MentorMentee();

$result = $mentorMentee->checkMentorMentee($mentorId, $menteeId);


if ($result->result->num_rows > 0) {
    echo "<h3>This mentee is already on your list <a href='".site_url()."mentor.php'>Profile</a></h3>";
} else {
    $result = $mentorMentee->create($mentorId, $menteeId)->storeToDb();
    if ($result) {
        echo "<h3>Mentee have been added successfully <a href='".site_url()."mentor.php'>Profile</a></h3>";
    } else {
        echo "<h3>Unable to add Mentee<a href='".site_url()."mentor.php'>Profile</a></h3>";
    }
}

