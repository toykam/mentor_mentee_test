<?php require_once 'config/functions.php'; ?>
<h1>Login as a <?php echo $type ?></h1>

<div id="auth_page">
    <form action="<?php echo site_url().'config/form_submission/login.php'; ?>" method="POST">

        <div class="form-group">
            <label>Email</label>
            <input required name="email" placeholder="Email"/>
            <input required name="type" type="hidden" value="<?php echo $_GET['type']; ?>"/>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input required name="password" type="password" placeholder="Password"/>
        </div>

        <div class="form-group">
            <input type="submit" class="btn" value="Login as a <?php echo $type; ?>"/>
        </div>
    </form>
</div>