<div id="message"></div>
<div class="post" style="background-color: white">
    <div class="row" style="padding-bottom: 25px;">
        <div class="col-md-12 offset-md-1" style="height: 65px; margin-bottom: 10px; border-bottom: 2px solid;">
            <div class="col-md-6">
                <h2 class="task-name" id="item-<?=$item['id'] ?>"><?=$item['name'] ?></h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="buttons col-md-6">
                <input type="number" name="amount" placeholder="Alege cantitatea" min="0">
            </div>
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