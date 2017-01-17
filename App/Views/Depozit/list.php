<div class="row">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Condensed Full Width Table</h3>
        </div>
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Denumire</th>
                    <th>Cantitate</th>
                    <th>Categorie</th>
                    <th>Data adăugării</th>
                    <th style="width: 40px">Options</th>
                </tr>
                <?php foreach($items as $row) { ?>
                    <tr>
                        <td><?=$row['id'] ?></td>
                        <td><?=$row['name'] ?></td>
                        <td><?=$row['quantity'] ?></td>
                        <td><?=$row['cat_name'] ?></td>
                        <td><?=$row['created'] ?></td>
                        <td><div class="tools">
                                <a href="depozit/view?id=<?=$row['id'] ?>"> <i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>