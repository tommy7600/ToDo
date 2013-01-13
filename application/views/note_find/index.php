<div>
    <div class="span4">
        <div class="widget">
            <header>
                <h3>Find notes</h3>
            </header>

            <form class="well-small form-search" method="get" action="">
                <input type="text" name="keyword" class="input-medium search-query">
                <button type="submit" class="btn">Search</button>
            </form>

        </div>
        <?php if (isset($notes) && !empty($notes)): ?>
            <div class="widget">
                <header>
                    <h3>Results</h3>
                </header>
                <section class="group">
                    <table id="example" class="display">
                        <thead>
                        <tr>
                            <th>Note Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($notes as $item):
                            ?>
                            <tr class=''>
                                <td><?php echo $item->name; ?></td>
                                <td><button class"btn" onclick="loadDynamicViewContent('<?php echo $item->id; ?>');">View</button></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </section>
            </div>

        <?php endif ?>
    </div>
        <div class="span8" id="content">
        </div>
    </div>

    <script src="../assets/js/libs/jquery-1.7.2.min.js"></script>
    <script>
        function loadDynamicViewContent(id) {
            $("#content").html('<img src="../assets/img/loaders/328_l.gif" height="40" width="40">').load("note_content/index/" + id.toString());
        }
    </script>










