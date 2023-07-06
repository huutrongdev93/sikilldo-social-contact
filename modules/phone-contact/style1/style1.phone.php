<?php
function PhoneContactStyle1Register($style) {
    $style['PhoneContactStyle1'] = ['label' => 'Style 1'];
    return $style;
}
add_filter('PhoneContactStyle', 'PhoneContactStyle1Register');

class PhoneContactStyle1 {
    static function config($key = '') {
        $config = Option::get('PhoneContact');
        if(!have_posts($config)) $config = [];
        if(!isset($config['btn_bg_color']))     $config['btn_bg_color'] = '#38a3fd';
        if(!isset($config['btn_border_color'])) $config['btn_border_color'] = 'rgba(56, 163, 253, 0.2)';
        if(!isset($config['btn_txt_color']))    $config['btn_txt_color'] = '#fff';
        if(!empty($key)) {
            return Arr::get($config, $key);
        }
        return $config;
    }
    static function adminImg(): void {
        Template::img(Url::base(Path::plugin(SCB_NAME).'/assets/images/phone/demo-style1.png'));
    }
    static function adminConfig($key = ''): void {
        $config = static::config();
        include_once 'admin-config.php';
    }
    static function adminConfigSave($result) {
        $theme  = Request::post('PhoneContactStyle1');
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