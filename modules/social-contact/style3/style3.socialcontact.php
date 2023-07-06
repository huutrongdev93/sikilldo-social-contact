<?php
function SocialContactStyle3Register($style) {
    $style['SocialContactStyle3'] = ['label' => 'Style 3'];
    return $style;
}
add_filter('SocialContactStyle', 'SocialContactStyle3Register');

class SocialContactStyle3 {
    static public function config($key = '') {
        $config = Option::get('SocialContact');
        if(!have_posts($config)) $config = [];
        if(!isset($config['button'])) $config['button'] = ['facebook_message', 'zalo', 'phone', 'sms'];
        if(!isset($config['bg'])) $config['bg'] = Option::get('theme_color');
        if(!isset($config['color'])) $config['color'] = '#fff';
        if(!empty($key)) {
            return Arr::get($config, $key);
        }
        return $config;
    }
    static public function adminImg(): void {
        Template::img(Url::base(Path::plugin(SCB_NAME).'/assets/images/socialcontact/demo-style3.png'));
    }
    static public function adminConfig(): void {
        $config = static::config();
        include_once 'admin-config.php';
    }
    static public function adminConfigSave($result) {
        $theme  = Request::post('SocialContactStyle3');
        $config = static::config();
        $config['button']   = $theme['button'];
        $config['color']    = $theme['color'];
        $config['bg']       = $theme['bg'];
        Option::update('SocialContact', $config);
        return ['status' => 'success', 'message' => 'Lưu dữ liệu thành công.'];
    }
    static public function button($config, $title = ''): array {
        $phone  = Option::get('contact_phone');
        $zalo   = Option::get('contact_zalo');
        $button = [
            'facebook_message' => [
                'class' => 'social-contact-item fb-box',
                'icon' => '<img src="'.Url::base().Path::plugin(SCB_NAME).'/assets/images/message.svg'.'" alt="'.$title.'">',
                'url' => 'https://fb.com/msg/'.Option::get('contact_facebook_message'),
                'target' => '_blank',
            ],
            'zalo' => [
                'class' => 'social-contact-item zalo-box',
                'icon' => '<img src="'.Url::base().Path::plugin(SCB_NAME).'/assets/images/zalo.svg'.'" alt="'.$title.'">',
                'url' => 'https://zalo.me/'.$zalo,
                'target' => '_blank',
            ],
            'phone' => [
                'class' => 'social-contact-item phone-box',
                'icon' => '<img src="'.Url::base().Path::plugin(SCB_NAME).'/assets/images/phone.svg'.'" alt="'.$title.'">',
                'url' => 'tel:'.$phone,
            ],
            'sms' => [
                'class' => 'social-contact-item sms-box',
                'icon' => '<i class="fad fa-sms"></i>',
                'url' => 'sms:'.$phone,
            ],
        ];
        foreach ($button as $btnKey => $btn) {
            if(in_array($btnKey, $config['button']) === false) unset($button[$btnKey]);
        }
        return $button;
    }
    static public function social(): array {
        return [
            'facebook_message' => 'Facebook Message',
            'zalo' => 'Zalo Page',
            'phone' => 'Điện thoại',
            'sms'   => 'sms'
        ];
    }
    static public function render(): void {
        $config = static::config();
        $title = Option::get('general_title');
        if(!empty(get_instance()->data['object']->title)) {
            $title = get_instance()->data['object']->title;
        }
        else if(!empty(get_instance()->data['category']->name)) {
            $title = get_instance()->data['category']->name;
        }
        $buttons = SocialContactStyle3::button($config, $title);
        include_once 'html.php';
    }
}