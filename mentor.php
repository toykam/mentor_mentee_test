
<?php session_start(); ?>
<?php require_once 'loader.php'; ?>
<?php
    $id = $_SESSION['mentor_data']['id']; 
    $mentee = new App\Models\Mentee();
    $mentor = new App\Models\Mentor();

    $allMentees = $mentee->getAllMentee();
    $myMentees = $mentor->getMentorMentee($id);

    // var_dump($myMentees);
?>
<?php require_once './config/includes/head.php'; ?>
    <h1>Mentor Profile</h1>
    <div id="main_page">
        <div id="left_page">
            <h3>Detail</h3>
            <p>Name: <?php echo $_SESSION['mentor_data']['name'] ?></p>
            <p>Email: <?php echo $_SESSION['mentor_data']['email'] ?></p>
            <p>Phone: <?php echo $_SESSION['mentor_data']['phone'] ?></p>
        </div>
        <div id="right_page">
            <h3>My Mentee</h3>
            <?php if ($myMentees->num_rows > 0) {  ?>
                <div class="" style="clear: both;">
                    <table class="bootstrap-table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($mentee = $myMentees->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $mentee['name'] ?></td>
                                    <td><?php echo $mentee['phone'] ?></td>
                                    <td>
                                        <a href="remove_mentee.php?id=<?php echo $mentee['id'] ?>" class="btn btn-default">Remove mentee</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <p>You do not have any mentee add a mentee. <a href="add_mentee.php">here</a></p>
            <?php } ?>
        </div>
        <div class="" style="clear: both;">
            <h3>Add Mentee Here</h3>
            <?php if ($allMentees->num_rows > 0) { ?>
                <table class="bootstrap-table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($mentee = $allMentees->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $mentee['name'] ?></td>
                                <td><?php echo $mentee['phone'] ?></td>
                                <td>
                                    <a href="add_mentee.php?id=<?php echo $mentee['id'] ?>" class="btn btn-default">Add mentee</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <h6>No Mentee here yet</h6>
            <?php } ?>
        </div>
    </div>
<?php require_once './config/includes/foot.php'; ?>