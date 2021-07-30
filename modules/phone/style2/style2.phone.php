<?php
function scb_phone_style2_register($style) {
    $style['scb_phone_style2'] = ['label' => 'Style 1'];
    return $style;
}
add_filter('scb_phone_style', 'scb_phone_style2_register');

class scb_phone_style2 {
    static public function admin_demo() {
        Template::img(Url::base(SCB_PATH.'/assets/images/phone/demo-style2.png'));
    }
    static public function admin_config($key = '') {
        $config = static::config();
        include_once 'admin-config.php';
    }
    static public function config($key = '') {
        $config = option::get('scb_phone_config');
        if(!have_posts($config)) $config = [];
        if(!isset($config['style2_phone'])) {
            $config['style2_phone'] = (String)Str::of(option::get('contact_phone'))->replace(' ', '')->replace('.', '')->replace('+84', '0');
        }
        if(!isset($config['style2_btn_bg_color']))   $config['style2_btn_bg_color'] = 'rgb(242, 12, 40)';
        if(!isset($config['style2_btn_border_color']))   $config['style2_btn_border_color'] = 'rgba(253, 56, 68, 0.2)';
        if(!isset($config['style2_btn_txt_color']))  $config['style2_btn_txt_color'] = '#fff';
        if(!empty($key)) {
            if(isset($config[$key])) return $config[$key];
            return '';
        }
        return $config;
    }
    static public function admin_config_save($result) {
        $theme  = InputBuilder::Post('theme');
        $config = [];
        $config['style2_phone']             = $theme['style2_phone'];
        $config['style2_phone']             = (String)Str::of($config['style2_phone'])->replace(' ', '')->replace('.', '')->replace('+84', '0');
        $config['style2_btn_bg_color']      = $theme['style2_btn_bg_color'];
        $config['style2_btn_border_color']  = $theme['style2_btn_border_color'];
        $config['style2_btn_txt_color']     = $theme['style2_btn_txt_color'];
        Option::update('scb_phone_config', $config);
        return ['status' => 'success', 'message' => 'Lưu dữ liệu thành công.'];
    }
    static public function render() {
        $config = static::config();
        include_once 'html.php';
    }
}
