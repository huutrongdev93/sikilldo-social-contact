<?php
function scb_phone_style1_register($style) {
    $style['scb_phone_style1'] = ['label' => 'Style 1'];
    return $style;
}
add_filter('scb_phone_style', 'scb_phone_style1_register');

class scb_phone_style1 {
    static public function admin_demo() {
        Template::img(Url::base(SCB_PATH.'/assets/images/phone/demo-style1.png'));
    }
    static public function admin_config($key = '') {
        $config = static::config();
        include_once 'admin-config.php';
    }
    static public function config($key = '') {
        $config = option::get('scb_phone_config');
        if(!have_posts($config)) $config = [];
        if(!isset($config['tel'])) {
            $config['tel'] = (String)Str::of(option::get('contact_phone'))->replace(' ', '')->replace('.', '')->replace('+84', '0');
        }
        if(!isset($config['btn_bg_color']))   $config['btn_bg_color'] = '#38a3fd';
        if(!isset($config['btn_border_color']))   $config['btn_border_color'] = 'rgba(56, 163, 253, 0.2)';
        if(!isset($config['btn_txt_color']))  $config['btn_txt_color'] = '#fff';
        if(!empty($key)) {
            if(isset($config[$key])) return $config[$key];
            return '';
        }
        return $config;
    }
    static public function admin_config_save($result) {
        $theme  = Request::Post('theme');
        $config = [];
        $config['tel']             = $theme['tel'];
        $config['tel']             = (String)Str::of($config['tel'])->replace(' ', '')->replace('.', '')->replace('+84', '0');
        $config['btn_bg_color']      = $theme['btn_bg_color'];
        $config['btn_border_color']  = $theme['btn_border_color'];
        $config['btn_txt_color']     = $theme['btn_txt_color'];
        Option::update('scb_phone_config', $config);
        return ['status' => 'success', 'message' => 'Lưu dữ liệu thành công.'];
    }
    static public function render() {
        $config = static::config();
        include_once 'html.php';
    }
}