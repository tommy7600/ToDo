<div class="widget">
    <header>
        <h3>Find notes</h3>
    </header>

    <form class="well form-search" method="get" action="">
        <input type="text" name="keyword" class="input-medium search-query">
        <button type="submit" class="btn">Search</button>
    </form>

</div>
<?php if(isset($notes) && !empty($notes)): ?>
    <div class="widget">
        <header>
            <h3>Results</h3>
        </header>
        <section class="group">
            <table id="example" class="display">
                <thead>
                <tr>
                    <th>Note Name</th>
                    <th>Note created date</th>
                    <th>Note planed end date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($notes as $item):
                    ?>
                    <tr class=''>
                        <td><?php echo $item->name; ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </section>
    </div>

<?php endif ?>
