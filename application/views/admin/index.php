<div class="widget">
    <header>
        <h3>Users List</h3>
        <ul class="toggle_content">
            <li class="arrow"><a href="#">Toggle Content</a></li>
        </ul>
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
                <tr class='gradeA'>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->logins; ?></td>
                    <td><?php echo $user->last_login; ?></td>
                    <td><?php echo HTML::anchor('/admin/edit/' . $user->id, 'Edit')?> | <?php echo HTML::anchor('/admin/delete/' . $user->id, 'Delete')?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <a href="/admin/add" class="btn">Add user</a>
    </section>
</div>

