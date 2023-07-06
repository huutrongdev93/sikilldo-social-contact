<?php
function PhoneContactStyle2Register($style) {
    $style['PhoneContactStyle2'] = ['label' => 'Style 2'];
    return $style;
}
add_filter('PhoneContactStyle', 'PhoneContactStyle2Register');

class PhoneContactStyle2 {
    static function config($key = '') {
        $config = Option::get('PhoneContact');
        if(!have_posts($config)) $config = [];
        if(!isset($config['btn_bg_color']))     $config['btn_bg_color'] = 'rgb(242, 12, 40)';
        if(!isset($config['btn_border_color'])) $config['btn_border_color'] = 'rgba(253, 56, 68, 0.2)';
        if(!isset($config['btn_txt_color']))    $config['btn_txt_color'] = '#fff';
        if(!empty($key)) {
            return Arr::get($config, $key);
        }
        return $config;
    }
    static function adminImg(): void {
        Template::img(Url::base(Path::plugin(SCB_NAME).'/assets/images/phone/demo-style2.png'));
    }
    static function adminConfig($key = ''): void {
        $config = static::config();
        include_once 'admin-config.php';
    }
    static function adminConfigSave($result) {
        $theme  = Request::Post('PhoneContactStyle2');
        $config = static::config();
        $config['btn_bg_color']      = $theme['btn_bg_color'];
        $config['btn_border_color']  = $theme['btn_border_color'];
        $config['btn_txt_color']     = $theme['btn_txt_color'];
        Option::update('PhoneContact', $config);
        return ['status' => 'success', 'message' => 'Lưu dữ liệu thành công.'];
    }
    static function render() {
        $config = static::config();
        include_once 'html.php';
    }
}
