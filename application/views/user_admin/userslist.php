<div class="widget">
    <header>
        <h3>Users List</h3>
    </header>
    <section class="group">
        <!--        <div class="dataTables_filter" id="dataTables_filter"><form class="form" action="" method="get"><label>Search: <input type="text" name="keyword"></form></label></div>-->
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
    <a href="/user_admin/add" class="btn">Add user</a>
</div>
