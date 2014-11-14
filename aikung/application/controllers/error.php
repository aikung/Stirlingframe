<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of error
 *
 * @author vyppN
 */
use system\mvc\Controller;

class Error_Controller extends Controller {

    public function get_index($value) {
        $data['error'] = $value;
        View::make('error.index', $data);
    }

}
