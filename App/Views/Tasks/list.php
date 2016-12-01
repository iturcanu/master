<div class="row">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Condensed Full Width Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Task</th>
                    <th>Created</th>
                    <th>Assigned to</th>
                    <th style="width: 40px">Options</th>
                </tr>
                <?php foreach($users as $row) { ?>
                    <tr>
                        <td><?=$row['id'] ?></td>
                        <td><?=$row['name'] ?></td>
                        <td><?=$row['created'] ?></td>
                        <td><?=$row['first_name'].' '.$row['last_name'] ?></td>
                        <td><div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>