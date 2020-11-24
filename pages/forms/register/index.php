<?php require_once 'config/functions.php'; ?>
<h1>Register as a <?php echo $type ?></h1>

<div id="auth_page">
    <form action="<?php echo site_url().'config/form_submission/register.php'; ?>" method="POST">
        <div class="form-group">
            <label>Full name</label>
            <input required name="full_name" placeholder="Full name"/>
            <input required name="type" type="hidden" value="<?php echo $_GET['type']; ?>"/>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input required name="email" placeholder="Email"/>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input required name="phone" placeholder="Phone number"/>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input required name="password" type="password" placeholder="Password"/>
        </div>

        <div class="form-group">
            <input type="submit" class="btn" value="Register as a <?php echo $type; ?>"/>
        </div>
    </form>
</div>