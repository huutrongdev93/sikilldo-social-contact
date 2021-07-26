<?php
Class Social_Contact_Admin {
    static public function navigation() {
        AdminMenu::addSub('marketing', 'social_contact_button', 'Button MXH & Liên hệ', 'plugins?page=social_contact_button', ['callback' => 'Social_Contact_Admin::page']);
    }
    static public function page() {
        $tabs = social_contact_button::tool();
        include 'views/config.php';
    }
    static public function tabGeneral() {
        include 'views/general.php';
    }
    static public function save( $ci, $model ) {
        $result['status']  = 'error';
        $result['message'] = __('Lưu dữ liệu không thành công');
        if( InputBuilder::post() ) {
            $module = trim(InputBuilder::post('key'));
            if($module == 'general') {
                $config  = Option::get('social_contact_button_config');
                $active  = InputBuilder::post('active');
                $show    = InputBuilder::post('show');
                $config['show'] = (!empty($show)) ? $show : [];
                $config['active'] = (!empty($active)) ? $active : [];
                Option::update('social_contact_button_config', $config);
                $result['status']  = 'success';
                $result['message'] = __('Lưu dữ liệu thành công');
            }
            else {
                if(method_exists('scb_'.$module, 'admin_config_save')) {
                    $module = 'scb_'.$module;
                    $result = $module::admin_config_save($result);
                }
            }
        }
        echo json_encode($result);
    }
}

add_action('admin_init', 'Social_Contact_Admin::navigation', 30);

Ajax::admin('Social_Contact_Admin::save');
