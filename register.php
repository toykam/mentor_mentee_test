<?php require_once './config/includes/head.php'; ?>
<?php if (isset($_GET['type'])) { ?>
    <?php $type = $_GET['type']; ?>
    <?php if ($type == 'mentor' || $type == 'mentee') { ?>
        <?php require_once __DIR__.'./pages/forms/register/index.php'; ?>
    <?php } else { ?>
        <h2>The page you are looking for is not here</h2>
    <?php } ?>
<?php } else { ?>
    <h2>Oops, You hit a snag</h2>
<?php } ?>
<?php require_once './config/includes/foot.php'; ?>