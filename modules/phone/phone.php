<?php
foreach (glob(SCB_PATH.'/modules/phone/*', GLOB_ONLYDIR) as $foldername) {
    foreach (glob($foldername.'/*.phone.php') as $filename) {
        include_once $filename;
    }
}

class scb_phone {

    static public function style() {
        return apply_filters('scb_phone_style', []);
    }
    static public function admin_config_html() {
        include 'html-phone.php';
    }

    public static function admin_config_save($result) {
        $object_key = trim(InputBuilder::post('style'));
        if(empty($object_key)) {
            $result['message'] = 'Bạn chưa chọn mẫu nào';
            return $result;
        }

        if(method_exists($object_key, 'admin_config_save')) {
            $phone = InputBuilder::post('phone');
            $config = Option::get('social_contact_button_config');
            $config['phone'] = $phone;
            $config['phone']['pc-show'] = (int)$config['phone']['pc-show'];
            $config['phone']['mb-show'] = (int)$config['phone']['mb-show'];
            Option::update('social_contact_button_config', $config);
            Option::update('scb_phone_active', $object_key);
            return $object_key::admin_config_save($result);
        }
        return $result;
    }

    public static function render() {
        $active = Option::get('scb_phone_active');
        if(method_exists($active, 'render')) $active::render();
    }
}