<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Ai
 */
use system\mvc\Controller;
use system\mvc\View;

class HomeController extends Controller{
    public $restful = true;
    
    public function get_index(){
        $data['title'] = "Stirlingframe | low power PHP framework";
        View::make('home.index',$data);
    }
    
    public function post_index(){
        $data['welcome'] = "Welcome to Chefdick Framework";
        View::make('home.index',$data);
    }
}
