<?php
/**
 * Created by PhpStorm.
 * User: ender
 * Date: 15/5/31
 * Time: 上午8:39
 */

namespace Ender\UEditor;


class UEditor {

    public function __construct(){

    }

    public static function content($content ='' , $config = ['id'=>'ueditor','name'=>'ueditor']) {
        $attr = self::makeConfig2String($config);
        echo "<script type='text/plain' {$attr}>{$content}</script>";
    }
    /**
     * 生成编辑器的参数
     * @param $config
     *
     * @return string
     */
    private static function makeConfig2String($config) {
        $string = '';
        foreach ($config as $k => $v) {
            $string .= " {$k}='{$v}'";
        }
        return $string;
    }
    /**
     *	编辑器的CSS资源
     */
    public static function css() {
        echo '<link href="'.asset('/vendor/ueditor/themes/default/css/ueditor.min.css').'" type="text/css" rel="stylesheet">';
    }
    /**
     *	编辑器的JS资源
     */
    public static function js() {
        $locale=config('app.locale');
        $ueditor_locale=config('ueditor.langMap'.$locale);
        echo '<script type="text/javascript" charset="utf-8" src="'.asset('/vender/ueditor/ueditor.config.js').'"></script>';
        echo '<script type="text/javascript" charset="utf-8" src="'.asset('/vender/ueditor/ueditor.all.min.js').'"></script>';
        echo '<script type="text/javascript" src="'.asset('/vender/ueditor/lang/'.$ueditor_locale.'/'.$ueditor_locale.'.js').'"></script>';
    }

}