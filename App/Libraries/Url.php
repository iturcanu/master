<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Url
 *
 * @author John
 */
namespace App\Libraries;

class Url {

    public static function getHome(){
        return 'http://'.$_SERVER['SERVER_NAME'];
    }
}