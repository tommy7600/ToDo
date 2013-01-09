<h2>Login</h2>
<div class="login_form">
    <form class="formClass" method="post" action="">
        <fieldset>
            <label for="username"><span>Username</span></label>
            <input id="username" name="username" class="validate[required] text-input" placeholder="username"
                   type="text" tabindex="1" accesskey="u">
        </fieldset>
        <fieldset>
            <label class="pw_cont" for="password"><span>Password</span></label>
            <input id="password" name="password" class="validate[required] text-input" placeholder="password"
                   type="password" tabindex="2" accesskey="p">
        </fieldset>
        <fieldset class="login_submit">
            <button type="submit" class="btn">SIGN IN</button>
        </fieldset>
        <fieldset class="login_social">
            <ul class="left">
                <li><input type="checkbox" class="remember" name="remember" value="1" tabindex="3"></li>
                <li class="info"><span>REMEMBER ME</span></li>
            </ul>
            <ul class="right">
                <li class="info"><span>SIGN UP</span></li>
                <li><a class="login_s" href="account/registration"><span>Sign up</span></a></li>
            </ul>
            <ul class="right">
                <li class="info"><span>RECOVER PASSWORD</span></li>
                <li><a class="login_f" href="account/forgottenpassword"><span>Forgotten password</span></a></li>
            </ul>
        </fieldset>
    </form>
</div>
