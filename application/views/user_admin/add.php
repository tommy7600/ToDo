<div class="widget">
    <header>
        <h3>Add new user</h3>
    </header>
    <form class="well form-horizontal" action="" method="post">
        <fieldset>
            <div class="control-group">
                <label for="email" class="control-label">User email</label>

                <div class="controls">
                    <input type="text" id="email" name="email" class="input-xlarge validate[custom[email]]"
                           placeholder="email"">
                </div>
            </div>
            <div class="control-group">
                <label for="username" class="control-label">User name</label>

                <div class="controls">
                    <input type="text" id="username" name="username" class="input-xlarge" placeholder="user name"">
                </div>
            </div>
            <div class="control-group">
                <label for="password" class="control-label">User password</label>

                <div class="controls">
                    <input type="password" id="password" name="password"
                           class="input-xlarge validate[required,minSize[6]] text-input" placeholder="password">
                </div>
            </div>

            <div class="control-group">
                <?php foreach ($roles as $role): ?>
                    <label for="rolescheckboxs" class="control-label"><?php echo $role->name?></label>
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" name="role[]" value="<?php echo $role->id?>" id="rolescheckboxs">
                            <?php echo $role->description?>
                        </label>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="form-actions">
                <button class="btn btn-success" type="submit">Save changes</button>
                <button class="btn btn-danger" type="button" value="cancel" onClick="history.go(-1);return true;">Cancel</button>
            </div>
        </fieldset>
    </form>
</div>

