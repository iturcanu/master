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
                    <th>Task</th>
                    <th>Created</th>
                    <th>Deadline</th>
                    <th>Assigned to</th>
                    <th style="width: 40px">Options</th>
                </tr>
                <?php foreach($tasks as $row) { ?>
                    <tr>
                        <td><?=$row['id'] ?></td>
                        <td><?=$row['name'] ?></td>
                        <td><?=$row['created'] ?></td>
                        <td><?=$row['deadline'] ?></td>
                        <td><?=$row['username'] ?></td>
                        <td><div class="tools">
                                <a href="tasks/view?id=<?=$row['id'] ?>"> <i class="fa fa-eye"></i></a>
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>