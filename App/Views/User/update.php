<?php
if(isset($message)){
    var_dump($message);
}
?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nume</label>
        <input type="text" class="form-control" name="first_name" value="<?= $user['first_name'] ?>">
    </div>
    <div class="form-group">
        <label>Prenume</label>
        <input type="text" class="form-control" name="last_name" value="<?= $user['last_name'] ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
    </div>
    <div class="form-group">
        <label>Avatar</label>
        <img class="col-md-1 pull-left" src="<?=$user['avatar'] ?>">
        <input type="file" class="form-control" style="width: 85%;" name="avatar" placeholder = 'Schimbă imaginea profilului'>
        </div>
    <input type="submit" value="Salvează">
</form>