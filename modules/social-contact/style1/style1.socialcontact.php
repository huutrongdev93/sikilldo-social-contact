<?php
function SocialContactStyle1Register($style) {
    $style['SocialContactStyle1'] = ['label' => 'Style 1'];
    return $style;
}
add_filter('SocialContactStyle', 'SocialContactStyle1Register');

class SocialContactStyle1 {
    static public function config($key = '') {
        $config = Option::get('SocialContact');
        if(!have_posts($config)) $config = [];
        if(!isset($config['button'])) $config['button'] = ['facebook_message', 'zalo', 'phone', 'sms'];
        if(!isset($config['extend'])) $config['extend'] = [];
        if(!empty($key)) {
            return Arr::get($config, $key);
        }
        return $config;
    }
    static public function adminImg(): void {
        Template::img(Url::base(Path::plugin(SCB_NAME).'/assets/images/socialcontact/demo-style1.png'));
    }
    static public function adminConfig(): void {
        $config = static::config();
        include_once 'admin-config.php';
    }
    static public function adminConfigSave($result) {
        $theme  = Request::post('SocialContactStyle1');
        $config = static::config();
        $config['button']  = $theme['button'];
        $config['extend']  = (!empty($theme['extend'])) ? $theme['extend'] : [];
        Option::update('SocialContact', $config);
        return ['status' => 'success', 'message' => 'Lưu dữ liệu thành công.'];
    }
    static public function button($config, $title = ''): array {
        $phone  = Option::get('contact_phone');
        $zalo   = Option::get('contact_zalo');
        if(empty($zalo)) $zalo = $phone;
        $button = [
            'facebook_fanpage' => [
                'class' => 'social-contact-fb',
                'icon' => '<i class="fab fa-facebook-f"></i>',
                'url' => Option::get('social_facebook'),
                'target' => '_blank',
            ],
            'facebook_message' => [
                'class' => 'social-contact-fb-ms',
                'icon' => '<i class="fab fa-facebook-messenger"></i>',
                'url' => 'https://fb.com/msg/'.Option::get('contact_facebook_message'),
                'target' => '_blank',
            ],
            'facebook_share' => [
                'class' => 'social-contact-fb-share',
                'icon' => '<i class="fab fa-facebook-f"></i>',
                'onclick' => 'window.open(\'http://www.facebook.com/sharer.php?u='.Url::current().'\', \'Chia sẽ sản phẩm này cho bạn bè\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no, width=600,height=455\')'
            ],
            'twitter_share' => [
                'class' => 'social-contact-twitter-share',
                'icon' => '<i class="fab fa-twitter"></i>',
                'onclick' => 'window.open(\'https://twitter.com/home?status='.Url::current().'\', \'Chia sẽ sản phẩm này cho bạn bè\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no, width=600,height=455\')'
            ],
            'youtube' => [
                'class' => 'social-contact-yt',
                'icon' => '<i class="fab fa-youtube"></i>',
                'url' => Option::get('social_youtube'),
                'target' => '_blank',
            ],
            'instagram' => [
                'class' => 'social-contact-yt',
                'icon' => '<i class="fab fa-instagram"></i>',
                'url' => Option::get('social_instagram'),
                'target' => '_blank',
            ],
            'pinterest' => [
                'class' => 'social-contact-pinterest',
                'icon' => '<i class="fab fa-youtube"></i>',
                'url' => Option::get('social_pinterest'),
                'target' => '_blank',
            ],
            'zalo' => [
                'class' => 'social-contact-zalo',
                'icon' => '<img src="'.Url::base().Path::plugin(SCB_NAME).'/assets/images/zalo.png'.'" alt="'.$title.'">',
                'url' => 'https://zalo.me/'.$zalo,
                'target' => '_blank',
            ],
            'email_share' => [
                'class' => 'social-contact-email',
                'icon' => '<i class="fad fa-envelope"></i>',
                'onclick' => 'window.open(\'https://mail.google.com/mail/u/0/?view=cm&to&su='.$title.'&body='.Url::current().'&bcc&cc&fs=1&tf=1\', \'Chia sẽ sản phẩm này cho bạn bè\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no, width=600,height=455\')',
            ],
            'skype_share' => [
                'class' => 'social-contact-skype',
                'icon' => '<i class="fab fa-skype"></i>',
                'onclick' => 'window.open(\'https://web.skype.com/share?url=='.Url::current().'\', \'Chia sẽ sản phẩm này cho bạn bè\', \'menubar=no,toolbar=no,resizable=no,scrollbars=no, width=600,height=455\')',
            ],
            'phone' => [
                'class' => 'social-contact-phone',
                'icon' => '<i class="fad fa-phone-alt"></i>',
                'url' => 'tel:'.$phone,
            ],
            'sms' => [
                'class' => 'social-contact-sms',
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
            'facebook_fanpage' => 'Facebook Fanpage',
            'facebook_message' => 'Facebook Message',
            'facebook_share' => 'Facebook Share',
            'twitter_share' => 'Twitter Share',
            'youtube' => 'Youtube Chanel',
            'instagram' => 'Instagram',
            'pinterest' => 'Pinterest',
            'zalo' => 'Zalo Page',
            'email_share' => 'Email Share',
            'skype_share' => 'Skype Share',
            'phone' => 'Điện thoại',
            'sms'   => 'sms'
        ];
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
        $buttons = SocialContactStyle1::button($config, $title);
        include_once 'html.php';
    }
}