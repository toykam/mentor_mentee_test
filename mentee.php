
<?php session_start(); ?>
<?php require_once 'loader.php'; ?>
<?php
    $id = $_SESSION['mentee_data']['id']; 
    $mentee = new App\Models\Mentee();

    $allMyMentors = $mentee->getMyMentor($id);
?>
<?php require_once './config/includes/head.php'; ?>
    <h1>Mentor Profile</h1>
    <div id="main_page">
        <div id="left_page">
            <h3>Detail</h3>
            <p>Name: <?php echo $_SESSION['mentee_data']['name'] ?></p>
            <p>Email: <?php echo $_SESSION['mentee_data']['email'] ?></p>
            <p>Phone: <?php echo $_SESSION['mentee_data']['phone'] ?></p>
        </div>
        <div id="right_page">
            <h3>My mentors</h3>
            <?php if ($allMyMentors->num_rows > 0) {  ?>
                <div class="" style="clear: both;">
                    <table class="bootstrap-table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($mentor = $allMyMentors->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $mentor['name'] ?></td>
                                    <td><?php echo $mentor['phone'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <p>You do not have any mentee add a mentee. <a href="add_mentee.php">here</a></p>
            <?php } ?>
        </div>
    </div>
<?php require_once './config/includes/foot.php'; ?>