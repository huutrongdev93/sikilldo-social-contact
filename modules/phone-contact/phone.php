<?php
foreach (glob(Path::plugin(SCB_NAME).'/modules/phone-contact/*', GLOB_ONLYDIR) as $foldername) {
    foreach (glob($foldername.'/*.phone.php') as $filename) {
        include_once $filename;
    }
}
class PhoneContact {
    static function style() {
        return apply_filters('PhoneContactStyle', []);
    }
    static function config($key = '') {

        $config = Option::get('social_contact_button_config');

        if(empty($config)) $config = ['phoneContact' => []];

        if(empty($config['phoneContact'])) {

            $config['phoneContact'] = [];

            if(!empty($config['phone'])) $config['phoneContact'] = $config['phone'];
        }

        $config = $config['phoneContact'];

        if(!isset($config['active']))          $config['active'] = 'PhoneContactStyle1';

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
            $phoneContact = Request::post('phoneContact');
            $config = Option::get('social_contact_button_config');
            if(empty($config)) $config = [];
            $config['phoneContact'] = $phoneContact;
            $config['phoneContact']['active']  = $object_key;
            $config['phoneContact']['pc-show'] = (int)$config['phoneContact']['pc-show'];
            $config['phoneContact']['mb-show'] = (int)$config['phoneContact']['mb-show'];
            Option::update('social_contact_button_config', $config);
            return $object_key::adminConfigSave($result);
        }
        return $result;
    }
}