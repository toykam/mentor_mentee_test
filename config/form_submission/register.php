<?php
// var_dump($_POST);

use App\Model\Mentee;
use App\Model\Mentor;

require_once './../functions.php';
require_once './../../loader.php';
if (isset($_POST)) {
    $type = $_POST['type'];
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    if ($type == 'mentee') {

        $mentee = new Mentee();
        $register = $mentee->create($name, $email, $phone, $password)->storeToDb();
        if ($register) {
            echo "<h1>Registration as a $type successful</h1><br/><a href='".site_url().'login.php?type=mentee'."'>Login</a>";
        } else {
            echo "<h1>Registration not successful</h1>";
        }
    } else if ($type == 'mentor') {

        $mentor = new Mentor($name, $email, $phone, $password);
        $register = $mentor->create($name, $email, $phone, $password)->storeToDb();
        if ($register) {
            echo "<h1>Registration as a $type successful</h1><br/><a href='".site_url().'login.php?type=mentor'."'>Login</a>";
        } else {
            echo "<h1>Registration not successful</h1>";
        }
    } else {
        echo "<h2>You hit a snag</h2>";
    }
}