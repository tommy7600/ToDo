<h2>Register</h2>
<form class="form-horizontal" action="" method="post">
    <div class="control-group">
        <div class="controls">
            <input TYPE="text" name="email" placeholder="Email"><?php echo HTML::errorLabel($errors, 'email')?>
        </div>
        <div class="controls">
            <input TYPE="text" name="username" placeholder="User Name"><?php echo HTML::errorLabel($errors, 'username')?>
        </div>
        <div class="controls">
            <input TYPE="password" name="password" placeholder="Password"><?php echo HTML::errorLabel($errors, 'password')?>
        </div>
        <div class="controls">
            <button type="submit" class="btn-large">Register</button>
        </div>
    </div>
</form>