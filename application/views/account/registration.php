<h2>Sign up</h2>
<div class="login_form">
    <form class="formClass" method="post" action="">
        <fieldset>
            <label class="email_cont" for="email"><span>Email</span></label>
            <input id="email" name="email" class="validate[custom[email]] text-input" placeholder="email" type="text">
            <p class="help-block"><?php echo HTML::errorLabel($errors, "email")?></p>
        </fieldset>
        <fieldset>
            <label for="username"><span>Username</span></label>
            <input id="username" name="username" class="validate[required] text-input" placeholder="username" type="text">
            <p class="help-block"><?php echo HTML::errorLabel($errors, "username")?></p>
        </fieldset>
        <fieldset>
            <label class="pw_cont" for="password"><span>Password</span></label>
            <input id="password" name="password" class="validate[required] text-input" placeholder="password" type="password">
            <p class="help-block"><?php echo HTML::errorLabel($errors, "password")?></p>
        </fieldset>
        <fieldset>
            <label class="pw_cont" for="password_conf"><span>Confirm password</span></label>
            <input id="password_conf" name="password_conf" class="validate[required,equals[password],minSize[6]] text-input"
                   placeholder="confirm password" type="password">
        </fieldset>
        <fieldset class="login_submit"><button type="submit" class="btn">SIGN UP</button></fieldset>
        <fieldset class="login_social">
            <ul class="right">
                <li class="info"><span>LOGIN</span></li>
                <li><a class="login_l" href="account/"><span>Log in</span></a></li>
            </ul>
            <ul class="right">
                <li class="info"><span>RECOVER PASSWORD</span></li>
                <li><a class="login_f" href="account/forgottenpassword"><span>Forgotten password</span></a></li>
            </ul>
        </fieldset>
    </form>
</div>
<!--<h2>Register</h2>-->
<!--<form class="form-horizontal" action="" method="post">-->
<!--    <div class="control-group">-->
<!--        <div class="controls">-->
<!--            <input TYPE="text" name="email" placeholder="Email">--><?php //echo HTML::errorLabel($errors, 'email')?>
<!--        </div>-->
<!--        <div class="controls">-->
<!--            <input TYPE="text" name="username" placeholder="User Name">--><?php //echo HTML::errorLabel($errors, 'username')?>
<!--        </div>-->
<!--        <div class="controls">-->
<!--            <input TYPE="password" name="password" placeholder="Password">--><?php //echo HTML::errorLabel($errors, 'password')?>
<!--        </div>-->
<!--        <div class="controls">-->
<!--            <button type="submit" class="btn-large">Register</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</form>-->