<div class="post" style="background-color: white">
    <div class="row" style="padding-bottom: 25px;">
        <div class="col-md-12 offset-md-1" style="height: 65px; margin-bottom: 10px; border-bottom: 2px solid;">
            <div class="col-md-6">
                <h2><?=$task['id'].' - '.$task['name'] ?></h2>
            </div>
            <div class="col-md-6">
                <h3 class="username pull-right">
                    <?=$task['username'] ?>
                </h3>
            </div>
        </div>
        <div class="col-md-12">
            <div class="buttons col-md-6">
                <button type="button" class="btn btn-primary btn-sm ">În progres</button>
                <button type="button" class="btn btn-warning btn-sm ">În așteptare</button>
                <button type="button" class="btn btn-success btn-sm ">Finisat</button>
            </div>
            <div class="col-md-6">
                <a  href="<?=\App\Libraries\Url::getHome().'/tasks/edit?id='.$task['id'] ?>">
                    <button type="button" class="btn btn-sm pull-right"><i class="fa fa-edit"></i> Modifica</button>
                </a>
            </div>
            <hr style="border: 0.5px solid">
            <span class="description pull-right">Added at <strong><?=$task['created'] ?></strong></span>
        </div>
        <div class="col-md-12">
            <p style="font-size: 25px;">
            <?=$task['description'] ?>
            <ul class="list-inline">
                <li class="pull-right">
                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a>
                </li>
            </ul>
            <input class="form-control input-sm" type="text" placeholder="Type a comment">
        </div>
    </div>
</div>