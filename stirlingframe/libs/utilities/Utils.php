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

namespace stirlingframe\libs\Utilities;
use stirlingframe\libs\Enums\STATUS;

class Utils {

    public static function colorize($text, $status) {

        $out = "";
        switch ($status) {
            case STATUS::SUCCESS:
                $out = self::isWindows() ? "[42m" : "[37m" . chr(27) . "[42m"; //Green
                break;
            case STATUS::FAILURE:
                $out = self::isWindows() ? "[41m" : "[37m" . chr(27) . "[41m"; //Red
                break;
            case STATUS::WARNING:
                $out = self::isWindows() ? "[43m" : "[30m" . chr(27) . "[43m"; //Yellow
                break;
            case STATUS::NOTE:
                $out = self::isWindows() ? "[44m" : "[37m" . chr(27) . "[44m"; //Blue
                break;
            default:
                throw new Exception("Invalid status: " . $status);
        }
        return chr(27) . "$out" . "$text" . chr(27) . "[0m";
    }

    public static function isWindows() {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return true;
        } else {
            echo false;
        }
    }

    public static function pural($text) {
        $ess = array('s', 'o', 'x', 'sh', 'ch', 'z', 'ss');
        $vowel = array('a', 'e', 'i', 'o', 'u');
        $except = array('roof', 'chef', 'ox', 'piano');
        $special = array('mouse' => 'mice', 'ox' => 'oxen', 'child' => 'children', 'man' => 'men', 'woman' => 'women');

        if (!in_array($text, $except)) {
            if (in_array(substr($text, -1), $ess) or in_array(substr($text, -2), $ess)) {
                $tablename = $text . 'es';
            } else if (substr($text, -1) == 'f') {
                $tablename = rtrim($text, 'f') . 'ves';
            } else if (substr($text, -2) == 'fe') {
                $tablename = rtrim($text, 'fe') . 'ves';
            } else if (substr($text, -1) == 'y' and ! in_array(substr($text, -2, -1), $vowel)) {
                $tablename = rtrim($text, 'y') . 'ies';
            } else if (key_exists($text, $special)) {
                $tablename = $special[$text];
            } else {
                $tablename = $text . 's';
            }
        } else {
            $tablename = $text . 's';
        }
        return $tablename;
    }

    public static function delTree($dir) {
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

    public static function recurse_copy($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    self::recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public static function output($string) {
        return "\n-----------------------------------------\n"
                . $string . "\n\n"
                . "-----------------------------------------\n";
    }

    public static function readProperties() {

        $text = file(ROOT . DS . 'properties');
        $data = array();
        foreach ($text as $value) {
            $value = rtrim($value, "\n");
            $temp = explode(":", $value);
            $data[$temp[0]] = $temp[1];
        }

        return $data;
    }

}
