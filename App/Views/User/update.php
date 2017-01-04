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
        <label>Parola veche</label>
        <input type="text" class="form-control" name="old_password" placeholder = 'Introdu doar dacă vrei să schimbi'>
    </div>
    <div class="form-group">
        <label>Parola</label>
        <input type="text" class="form-control" name="new_password" placeholder = 'Introdu doar dacă vrei să schimbi'>
    </div>
    <div class="form-group">
        <label>Repetă parola</label>
        <input type="text" class="form-control" name="password_repeat" placeholder = 'Repetă parola nouă'>
    </div>
    <div class="form-group">
        <label>Avatar</label>
        <img class="col-md-1 pull-left" src="<?=$user['avatar'] ?>">
        <input type="file" class="form-control" style="width: 85%;" name="avatar" placeholder = 'Schimbă imaginea profilului'>
        </div>
    <input type="submit" value="Salvează">
</form>