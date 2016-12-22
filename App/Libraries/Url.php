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
class Url {
    public $home;
    
    public static function getHome(){
        $this->home = $_SERVER['REQUEST_URI'];
        
        return $this->home;
    }
}
