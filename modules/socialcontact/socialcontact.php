<?php
foreach (glob(SCB_PATH.'/modules/socialcontact/*', GLOB_ONLYDIR) as $foldername) {
    foreach (glob($foldername.'/*.socialcontact.php') as $filename) {
        include_once $filename;
    }
}

class scb_socialcontact {

    static public function style() {
        return apply_filters('scb_socialcontact_style', []);
    }

    static public function admin_config_html($result) {
        include 'html-socialcontact.php';
    }

    static public function admin_config_save($result) {
        $object_key = trim(Request::post('style'));
        if(empty($object_key)) {
            $result['message'] = 'Bạn chưa chọn mẫu nào';
            return $result;
        }
        if(method_exists($object_key, 'admin_config_save')) {
            $socialcontact = Request::post('socialcontact');
            $config = Option::get('social_contact_button_config');
            $config['socialcontact'] = $socialcontact;
            $config['socialcontact']['pc-show'] = (int)$config['socialcontact']['pc-show'];
            $config['socialcontact']['mb-show'] = (int)$config['socialcontact']['mb-show'];
            Option::update('social_contact_button_config', $config);
            Option::update('scb_socialcontact_active', $object_key);
            return $object_key::admin_config_save($result);
        }
        return $result;
    }

    static public function render() {
        $active = Option::get('scb_socialcontact_active');
        if(method_exists($active, 'render')) $active::render();
    }

    static public function button($config, $title = '') {
        $button = [
            'facebok_fanpage' => [
                'class' => 'social-contact-fb',
                'icon' => '<i class="fab fa-facebook-f"></i>',
                'url' => option::get('social_facebook'),
                'target' => '_blank',
            ],
            'facebok_message' => [
                'class' => 'social-contact-fb-ms',
                'icon' => '<i class="fab fa-facebook-messenger"></i>',
                'url' => 'http://fb.com/msg/'.$config['facebook_message_id'],
                'target' => '_blank',
            ],
            'facebok_share' => [
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
                'url' => option::get('social_youtube'),
                'target' => '_blank',
            ],
            'instagram' => [
                'class' => 'social-contact-yt',
                'icon' => '<i class="fab fa-instagram"></i>',
                'url' => option::get('social_instagram'),
                'target' => '_blank',
            ],
            'pinterest' => [
                'class' => 'social-contact-pinterest',
                'icon' => '<i class="fab fa-youtube"></i>',
                'url' => option::get('social_pinterest'),
                'target' => '_blank',
            ],
            'zalo' => [
                'class' => 'social-contact-zalo',
                'icon' => '<img src="'.Url::base().SCB_PATH.'/assets/images/zalo.png'.'" alt="'.$title.'">',
                'url' => 'https://zalo.me/'.$config['phone'],
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
                'url' => 'tel:'.$config['phone'],
            ],
            'sms' => [
                'class' => 'social-contact-sms',
                'icon' => '<i class="fad fa-sms"></i>',
                'url' => 'sms:'.$config['phone'],
            ],
        ];
        foreach ($button as $btnKey => $btn) {
            if(in_array($btnKey, $config['button']) === false) unset($button[$btnKey]);
        }
        return apply_filters('gets_socialcontact_button',$button, $config, $title);
    }

    static public function social() {
        $social = [
            'facebok_fanpage' => 'Facebook Fanpage',
            'facebok_message' => 'Facebook Message',
            'facebok_share' => 'Facebook Share',
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
        return $social;
    }
}