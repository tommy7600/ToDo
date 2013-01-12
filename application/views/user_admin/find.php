<div class="widget">
    <header>
        <h3>Results</h3>
    </header>
    <section class="group">
        <table id="example" class="display">
            <thead>
            <tr>
                <th>Email</th>
                <th>User Name</th>
                <th>Logins</th>
                <th>Last_Login</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr class=''>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->logins; ?></td>
                    <td><?php echo $user->last_login; ?></td>
                    <td><?php echo HTML::anchor('/user_admin/edit/' . $user->id, 'Edit')?> | <?php echo HTML::anchor('/user_admin/delete/' . $user->id, 'Delete')?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </section>
</div>
