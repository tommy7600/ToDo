<table class="table">
    <thead>
    <tr>
        <th>Email</th>
        <th>User Name</th>
        <th>Logins</th>
        <th>Last_Login</th>
        <th>Akcje</th>
    </tr>
    </thead>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->email; ?></td>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->logins; ?></td>
            <td><?php echo $user->last_login; ?></td>
            <td><?php echo HTML::anchor('/admin/edit/'.$user->id, 'Edit')?></td>
        </tr>
    <?php endforeach ?>
</table>
<a href="/admin/add" class="btn btn-large btn-success">Add user</a>
