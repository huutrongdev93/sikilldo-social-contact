<?php
function scb_socialcontact_style2_register($style) {
    $style['scb_socialcontact_style2'] = ['label' => 'Style 1'];
    return $style;
}
add_filter('scb_socialcontact_style', 'scb_socialcontact_style2_register');

class scb_socialcontact_style2 {
    static public function admin_demo() {
        Template::img(Url::base(SCB_PATH.'/assets/images/socialcontact/demo-style2.png'));
    }
    static public function admin_config($key = '') {
        $config = static::config();
        include_once 'admin-config.php';
    }
    static public function config($key = '') {
        $config = option::get('scb_socialcontact_config');
        if(!have_posts($config)) $config = [];
        if(!isset($config['button'])) $config['button'] = ['facebok_message', 'zalo', 'phone', 'sms'];
        if(!isset($config['facebook_message_id'])) {
            $config['facebook_message_id'] = option::get('social_facebook');
            $config['facebook_message_id'] = (String)Str::of($config['facebook_message_id'])->trim('/')->replace('https://www.', '')->replace('https://', '')->replace('facebook.com/', '')->replace('facebook.com', '');
        }
        if(!isset($config['phone'])) {
            $config['phone'] = (String)Str::of(option::get('contact_phone'))->replace(' ', '')->replace('.', '')->replace('+84', '0');
        }
        if(!empty($key)) {
            if(isset($config[$key])) return $config[$key];
            return '';
        }
        return $config;
    }
    static public function admin_config_save($result) {
        $theme  = InputBuilder::Post('theme');
        $config = static::config();
        $config['button']               = $theme['button'];
        $config['facebook_message_id']  = $theme['facebook_message_id'];
        $config['phone']                = $theme['phone'];
        $config['facebook_message_id'] = (String)Str::of($config['facebook_message_id'])->trim('/')->replace('https://www.', '')->replace('https://', '')->replace('facebook.com/', '')->replace('facebook.com', '');
        $config['phone'] = (String)Str::of($config['phone'])->replace(' ', '')->replace('.', '')->replace('+84', '0');
        Option::update('scb_socialcontact_config', $config);
        return ['status' => 'success', 'message' => 'Lưu dữ liệu thành công.'];
    }
    static public function render() {
        $config = static::config();
        $title = option::get('general_title');
        if(!empty(get_instance()->data['object']->title)) {
            $title = get_instance()->data['object']->title;
        }
        else if(!empty(get_instance()->data['category']->name)) {
            $title = get_instance()->data['category']->name;
        }

        $buttons = scb_socialcontact::button($config, $title);
        include_once 'html.php';
    }
}