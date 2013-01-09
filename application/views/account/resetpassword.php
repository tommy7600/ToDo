<h2>Login</h2>
<div class="login_form">
    <form class="formClass" method="post" action="">
        <fieldset>
            <label class="pw_cont" for="password"><span>Password</span></label>
            <input id="password" name="password" class="validate[required,minSize[6]] text-input" placeholder="password"
                   type="password" tabindex="1">
        </fieldset>
        <fieldset>
            <label class="pw_cont" for="password_conf"><span>Confirm password</span></label>
            <input id="password_conf" name="password_conf" class="validate[required,equals[password],minSize[6]] text-input"
                   placeholder="confirm password" type="password" tabindex="2">
        </fieldset>
        <fieldset class="login_submit">
            <button type="submit" class="btn">CHANGE PASSWORD</button>
        </fieldset>
    </form>
</div>
