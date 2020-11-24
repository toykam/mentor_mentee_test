<?php require_once './config/includes/head.php'; ?>
    <h1>Mentor Mentee Test</h1>

    <div id="main_page">
        <div id="left_page">
            <h3>Mentor</h3>
            <hr style="width: 50%; color: red; background-color: red; height: 1px;"/>
            <p>A mentorship is a relationship between two people where the individual with more experience, knowledge, and connections is able to pass along what they have learned to a more junior individual within a certain field.</p>
            <a class="btn btn-default" href="register.php?type=mentor">Register as a mentor</a>
            <a class="btn btn-default" href="login.php?type=mentor">Login</a>
        </div>
        <div id="right_page">
            <h3>Mentee</h3>
            <p>a person who is helped by a mentor (= a person who gives a younger or less experienced person help and advice over a period of time, especially at work or school)</p>
            <a class="btn btn-default" href="register.php?type=mentee">Register as a mentee</a>
            <a class="btn btn-default" href="login.php?type=mentee">Login</a>
        </div>
    </div>
<?php require_once './config/includes/foot.php'; ?>