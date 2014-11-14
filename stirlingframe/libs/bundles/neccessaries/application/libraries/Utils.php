<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author Ai
 */
class Utils {

    public static function CreateTableData($objects, $class) {
        $props = array_keys(get_object_vars($class));


        $table = "<div style='width:100%;text-align:center;'>";
        $percent = ceil(100 / count($props)) - 0.3;
        foreach ($props as $value) {
            $table .= "<div style='float:left;width:$percent%;border:solid 1px #000;background-color:#666;color:#fff;'>$value</div>";
        }

        $table.="<div style='clear:both'></div>";
        foreach ($objects as $value2) {
            foreach ($props as $value) {
                $table .= "<div style='float:left;width:$percent%;border:solid 1px #000;background-color:#fff;color:#333;'>" . $value2->$value . "</div>";
            }

            $table.="<div style='clear:both'></div>";
        }
        $table.="</div>";

        return $table;
    }

    public static function CreateForm($class) {
        $props = array_keys(get_object_vars($class));

        require ROOT . DS . 'application' . DS . 'libraries' . DS . 'models.log.php';

        $data = eval('return $meta_' . strtolower(get_class($class)) . ';');

        @$children = $data['children'];
        @$foreign = $data['foreign_key'];
        @$properties = $data['types'];
        @$primary = $data['primary_key'];

        @$forKeys = array();
        if (isset($foreign)) {
            foreach ($foreign as $value) {
                $forKeys[] = explode('.', $value)[0];
            }
        }

        $table = "<div class='two column' style='border-right:1px solid #888;'>";
        $table.="<form name='" . get_class($class) . "Form' action='save' method='post'>";
        foreach ($props as $value) {
            if ($value == $primary)
                continue;
            $displayname = $value;
            if($pos = strpbrk($value, '_'))
                $displayname = substr($value,0,  strpos($value, '_'));
            $table .= "<div class='two column'>"
                    . "     <div style='width:150px;float:left;'>"
                    . "         <p style='margin: 3px;'>" . ucfirst($displayname) . "</p>"
                    . "     </div>"
                    . "     <div style='width:250px;float:left;'>";


            if ($properties[$value] == 'text') {
                $table .= "         <textarea name='$value' id='$value' style='width:234px;margin:3px;'></textarea>";
            } else if (in_array($value, $forKeys)) {
                $target = 0;
                for ($i = 0; $i < count($forKeys); $i++) {
                    if ($value == $forKeys[$i])
                        $target = $i;
                }

                $data = explode('.', $foreign[$target]);

                $className = ucfirst($data[1]);

                $objs = $className::where('1', '=', '1')->get();
                $count = count($objs);
                if ($count == 0) {
                    $table .= "         <span style='color:#f55'>No $className Data.</span>";
                } else {
                    $table .= "         <select name='$value' size='7' style='width:243px;margin:3px;'>";
                    foreach ($objs as $obj) {
                        $table .= "<option value='".$obj->$data[2]."'>$obj->title</option>";
                    }
                    $table .= "         <select>";
                }
            } else {
                $table .= "         <input type='text' name='$value' id='$value' style='width:234px;margin:3px;'>";
            }
            $table .= "     </div>"
                    . "</div>"
                    . "<div class='clear'></div>";
        }
        $table .= "<div class='two column'>"
                . "     <div style='width:150px;float:left;'>&nbsp;"
                . "     </div>"
                . "     <div style='width:250px;float:left;'>"
                . "         <input type='submit' name='$value' id='$value' value='Save'>"
                . "     </div>"
                . "</div>"
                . "<div class='clear'></div>";
        $table.="</form>";
        $table.="</div>";

        return $table;
    }

}
