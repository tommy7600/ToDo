<form class="form-horizontal" action="" method="post">
    <div class="control-group">
        <div class="controls">
            <input TYPE="text" name="email" placeholder="Email" value="<?php echo $user->email?>">
        </div>
        <div class="controls">
            <input TYPE="text" name="username" placeholder="User Name" value="<?php echo $user->username?>">
        </div>
        <div class="controls">
            <input TYPE="password" name="password" placeholder="Password">
        </div>
        <div class="control-group">
            <?php foreach($roles as $role):?>
                <div class="controls">
                    <input type="checkbox" name="role[]" value="<?php echo $role->id?>" <?php echo in_array($role->id, $userRole)? 'checked="checked"': '' ?>><?php echo $role->name?><br>
                </div>
            <?php endforeach ?>
        </div>
        <div class="controls">
            <button type="submit" class="btn-large">Save changes</button>
        </div>
    </div>
</form>