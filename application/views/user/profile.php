<div class="widget">
    <header>
        <h3>Profile Settings</h3>
    </header>
    <form class="well form-horizontal" action="" method="post">
        <fieldset>
            <div class="control-group">
                <label for="email" class="control-label">Your email</label>

                <div class="controls">
                    <input type="text" id="email" name="email" class="input-xlarge" value="<?php echo $user->email?>"
                           placeholder="email"">
                </div>
            </div>
            <div class="control-group">
                <label for="password" class="control-label">Your password</label>

                <div class="controls">
                    <input type="password" id="password" name="password"
                           class="validate[minSize[6]] input-xlarge" placeholder="password">
                </div>
            </div>

            <div class="form-actions">
                <button class="btn btn-success" type="submit">Save changes</button>
                <button class="btn btn-danger" type="button" value="cancel" onClick="history.go(-1);return true;">Cancel</button>
            </div>
        </fieldset>
    </form>
</div>


