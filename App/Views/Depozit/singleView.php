<div id="message"></div>
<div class="post" style="background-color: white">
<div class="row" style="padding-bottom: 25px;">
    <div class="col-md-12 offset-md-1" style="height: 65px; margin-bottom: 10px; border-bottom: 2px solid;">
        <div class="col-md-6">
            <h2 class="task-name" id="task-<?=$item['id'] ?>"><?=$item['name'] ?></h2>
        </div>
    </div>
    <div class="col-md-12">
        <div class="buttons col-md-6">
<button type="button" class="btn btn-sm">Fă cerere</button>
        </div>
<!--            <div class="col-md-6">-->
<!--                <a  href="--><?//=\App\Libraries\Url::getHome().'/depozit/edit?id='.$item['id'] ?><!--">-->
<!--                    <button type="button" class="btn btn-sm pull-right"><i class="fa fa-edit"></i> Modifica</button>-->
<!--                </a>-->
<!--            </div>-->
        <span class="description pull-right">Added at <strong><?=$item['created'] ?></strong></span>
    </div>
    <div class="col-md-12">
        <p style="font-size: 25px;">
            <?=$item['description'] ?>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(".status-button").on("click",function(){
        var status_id = this.id;
        var task_id = $('.task-name')[0]['id'];
        var task_status = $('button#'+status_id).text();
        $.ajax({url: "Tasks/setStatus?status_id="+status_id+"&task_id="+task_id+"&task_status="+task_status, success: function(result){
            //console.log(result);
            $('#message').html(result);
        }});
    });
});
</script>