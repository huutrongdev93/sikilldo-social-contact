<?php
/**
Plugin name     : Marketing - social contact button
Plugin class    : social_contact_button
Plugin uri      : https://sikido.vn
Description     : Pop-up được xem là hình thức quảng cáo phổ biến với chi phí thấp đem lại nhiều hiệu quả. Bên cạnh đó, có thể xem pop-up như một call-to-action (nút kêu gọi hành động) mạnh mẽ.
Author          : SKDSoftware Dev Team
Version         : 1.1.1
 */
define( 'SCB_NAME', 'social-contact-button' );

define( 'SCB_PATH', Path::plugin( SCB_NAME ) );

class social_contact_button {

    private $name = 'social_contact_button';

    function __construct() {
        add_action('cle_footer', array($this, 'render'));
    }

    //active plugin
    public function active() {}

    //Gở bỏ plugin
    public function uninstall() {}

    public function render() {
        $config = static::config();
        if(!empty($config['active']) && have_posts($config['active'])) {
            foreach ($config['active'] as $module) {
                if($config[$module]['pc-show'] == 1 || $config[$module]['mb-show'] == 1) {

                    if (method_exists('scb_' . $module, 'render')) {
                        $page = Template::getPage();
                        if (in_array('all', $config['show']) || in_array($page, $config['show'])) {
                            include 'modules/html-main-'.$module.'.php';
                        }
                    }
                }
            }
        }
    }

    static public function tool() {
        $popup_style = [
            'general' => [
                'label' => 'Cấu hình',
                'callback' => 'Social_Contact_Admin::tabGeneral'
            ],
            'socialcontact' => [
                'label' => 'Mxh & contact',
                'callback' => 'scb_socialcontact::admin_config_html'
            ],
            'phone' => [
                'label' => 'Nút gọi điện',
                'callback' => 'scb_phone::admin_config_html'
            ]
        ];
        return $popup_style;
    }

    static public function config($key = '') {
        $default = [
            'active' => [],
            'show'  => ['all'],
            'socialcontact' => [
                'pc-show' => 1,
                'pc-position' => 'bottomLeft',
                'pc-vertical' => '100',
                'pc-horizontal' => '10',
                'mb-show' => 1,
                'mb-position' => 'bottomLeft',
                'mb-vertical' => '100',
                'mb-horizontal' => '10',
            ],
            'phone' => [
                'pc-show' => 1,
                'pc-postion' => 'bottomLeft',
                'pc-vertical' => '100',
                'pc-horizontal' => '10',
                'mb-show' => 1,
                'mb-postion' => 'bottomLeft',
                'mb-vertical' => '100',
                'mb-horizontal' => '10',
            ],
        ];
        $config = option::get('social_contact_button_config', array_merge([], $default));
        if(empty($config)) $config = $default;
        if(!empty($key)) {
            if(isset($config[$key])) return $config[$key];
            if(isset($default[$key])) return $default[$key];
            if(Arr::get($config, $key) !== null) return Arr::get($config, $key);
            if(Arr::get($default, $key) !== null) return Arr::get($default, $key);
        }
        return $config;
    }
}

new social_contact_button();

include 'modules/socialcontact/socialcontact.php';
include 'modules/phone/phone.php';
if(Admin::is()) include 'admin/admin.php';