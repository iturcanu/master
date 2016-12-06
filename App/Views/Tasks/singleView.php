<div class="post" style="background-color: white">
    <div class="user-block">
        <div class="col-md-12">
            <div class="col-md-6">
                    <h2><?=$task['id'].' - '.$task['name'] ?></h2>
            </div>
            <div class="col-md-6">
                <span class="username pull-right">
                    <?=$task['username'] ?>
                </span>
                <img class="img-circle img-bordered-sm pull-right" src="<?=$task['avatar'] ?>" alt="user image">
                <br>
                <br>
                <span class="description pull-right">Added at <strong><?=$task['created'] ?></strong></span>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="background-color: white">
        <p style="font-size: 25px;">
        <?=$task['description'] ?>
        <ul class="list-inline">
        <li class="pull-right">
            <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                (5)</a></li>
        </ul>

        <input class="form-control input-sm" type="text" placeholder="Type a comment">
    </div>
    <hr>
</div>