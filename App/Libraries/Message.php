<?php


namespace App\Libraries;


class Message
{
    public static function error($content){
        if(isset($content)){
            echo "<div class=\"alert alert-error fade in alert-dismissable\" style=\"margin-top:18px;\">
                     <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a>
                     $content
                 </div>";
        }
    }

    public static function success($content){
        if(isset($content)){
            echo "<div class=\"alert alert-success fade in alert-dismissable\" style=\"margin-top:18px;\">
                     <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\" title=\"close\">×</a>
                     $content
                 </div>";
        }
    }
}