<form class="form-horizontal" action="" method="post">
    <div class="control-group">
        <div class="controls">
            <input TYPE="text" name="email" placeholder="Email">
        </div>
        <div class="controls">
            <input TYPE="text" name="username" placeholder="User Name">
        </div>
        <div class="controls">
            <input TYPE="password" name="password" placeholder="Password">
        </div>
        <div class="control-group">
            <?php foreach($roles as $role):?>
                <div class="controls">
                    <input type="checkbox" name="role[]" value="<?php echo $role->id?>"><?php echo $role->name?><br>
                </div>
            <?php endforeach ?>
        </div>
        <div class="controls">
            <button type="submit" class="btn-large">Add</button>
        </div>
    </div>
</form>
