<div class="row">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista anagajaților</h3>
        </div>
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Numele</th>
                    <th>Email</th>
                    <th>Funcție</th>
                    <th>Avatar</th>
                    <th style="width: 40px">Options</th>
                </tr>
                <?php foreach($users as $user) { ?>
                    <tr>
                        <td><?=$user['id'] ?></td>
                        <td><?=$user['user_name'] ?></td>
                        <td><?=$user['email'] ?></td>
                        <td><?=$user['functie'] ?></td>
                        <td><img src="<?=$user['avatar'] ?>" class="img-square" style="max-height: 50px; max-width: 50px; "></td>
                        <td><div class="tools">
                                <a href="user/view?id=<?=$user['id'] ?>"> <i class="fa fa-eye"></i></a>
                                <a href="user/edit?id=<?=$user['id'] ?>"> <i class="fa fa-edit"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>