<?php
class SocialContactButtonAdmin {
    static function register($tabs) {
        $tabs['social-contact-button'] = [
            'label'         => 'Button liên hệ',
            'description'   => 'Quản lý button mạng xã hội, liên hệ, hotline',
            'callback'      => 'SocialContactButtonAdmin::render',
            'icon'          => '<i class="fa-thin fa-share-nodes"></i>',
        ];
        return $tabs;
    }
    static function render(): void {

        $view = Request::get('view');

        if(empty($view)) $view = 'social-contact';

        if($view == 'social-contact') {
            $path = 'modules/social-contact/admin/html-config';
        }
        if($view == 'phone-contact') {
            $path = 'modules/phone-contact/admin/html-config';
        }

        Plugin::partial('social-contact-button', 'admin/html-config', ['view' => $view]);

        if(!empty($path)) {
            Plugin::partial('social-contact-button', $path);
        }

    }
    static function save($result) {

        $module = trim(Request::post('module'));

        if(empty($module)) {
            $result['status']   = 'error';
            $result['message']  = 'Module không tồn tại';
            return $result;
        }

        if($module == 'social-contact') $result = SocialContact::save($result);

        if($module == 'phone-contact') $result = PhoneContact::save($result);

        return $result;
    }
}
add_filter('skd_system_tab', 'SocialContactButtonAdmin::register', 50);
add_filter('system_social_contact_button_save', 'SocialContactButtonAdmin::save', 50);