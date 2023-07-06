<?php
foreach (glob(Path::plugin(SCB_NAME).'/modules/social-contact/*', GLOB_ONLYDIR) as $foldername) {
    foreach (glob($foldername.'/*.socialcontact.php') as $filename) {
        include_once $filename;
    }
}

class SocialContactAdmin {
    static function contactZaloMessage($input) {
        $input[] = [
            'field' => 'contact_zalo',
            'label' => 'Số Zalo',
            'type'  => 'tel'
        ];
        $input[] = [
            'field' => 'contact_facebook_message',
            'label' => 'Facebook message id',
            'type'  => 'text'
        ];
        return $input;
    }
    static function contactSave($contact, $data) {
        if(isset($data['contact_zalo'])) {
            $contact['contact_zalo'] = Str::clear($data['contact_zalo']);
        }
        if(isset($data['contact_facebook_message'])) {
            $contact['contact_facebook_message'] = Str::clear($data['contact_facebook_message']);
            $contact['contact_facebook_message'] = (String)Str::of($contact['contact_facebook_message'])->trim('/')->replace('https://www.', '')->replace('https://', '')->replace('facebook.com/', '')->replace('facebook.com', '');
        }
        return $contact;
    }
}
add_filter('system_contact_input', 'SocialContactAdmin::contactZaloMessage');
add_filter('skd_system_cms_contact_save', 'SocialContactAdmin::contactSave', 10, 2);

class SocialContact {
    static function style() {
        return apply_filters('SocialContactStyle', []);
    }
    static function config($key = '') {
        
        $config = Option::get('social_contact_button_config');

        if(empty($config)) $config = ['socialContact' => []];

        if(empty($config['socialContact'])) {

            $config['socialContact'] = [];

            if(!empty($config['socialcontact'])) $config['socialContact'] = $config['socialcontact'];
        }

        $config = $config['socialContact'];

        if(!isset($config['active']))          $config['active'] = 'SocialContactStyle1';

        if(!isset($config['pc-show']))          $config['pc-show'] = 1;

        if(!isset($config['pc-position']))      $config['pc-position'] = 'bottomLeft';

        if(!isset($config['pc-vertical']))      $config['pc-vertical'] = 100;

        if(!isset($config['pc-horizontal']))    $config['pc-horizontal'] = 10;

        if(!isset($config['mb-show']))          $config['mb-show'] = 1;

        if(!isset($config['mb-position']))      $config['mb-position'] = 'bottomLeft';

        if(!isset($config['mb-vertical']))      $config['mb-vertical'] = 100;

        if(!isset($config['mb-horizontal']))    $config['mb-horizontal'] = 10;

        if(!empty($key)) {
            
            return Arr::get($config, $key);
        }

        return $config;
    }
    static function save($result) {
        $object_key = trim(Request::post('style'));
        if(empty($object_key)) {
            $result['status']   = 'error';
            $result['message']  = 'Bạn chưa chọn mẫu';
            return $result;
        }
        if(method_exists($object_key, 'adminConfigSave')) {
            $socialContact = Request::post('socialContact');
            $config = Option::get('social_contact_button_config');
            if(empty($config)) $config = [];
            $config['socialContact'] = $socialContact;
            $config['socialContact']['active']  = $object_key;
            $config['socialContact']['pc-show'] = (int)$config['socialContact']['pc-show'];
            $config['socialContact']['mb-show'] = (int)$config['socialContact']['mb-show'];
            Option::update('social_contact_button_config', $config);
            return $object_key::adminConfigSave($result);
        }
        return $result;
    }
}