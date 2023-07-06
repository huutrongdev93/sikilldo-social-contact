<?php
/**
Plugin name     : Marketing - social contact button
Plugin class    : social_contact_button
Plugin uri      : https://sikido.vn
Description     : Pop-up được xem là hình thức quảng cáo phổ biến với chi phí thấp đem lại nhiều hiệu quả. Bên cạnh đó, có thể xem pop-up như một call-to-action (nút kêu gọi hành động) mạnh mẽ.
Author          : SKDSoftware Dev Team
Version         : 2.0.3
 */
const SCB_NAME = 'social-contact-button';

const SCB_VERSION = '2.0.3';

class social_contact_button {

    private $name = 'social_contact_button';

    function __construct() {
        add_action('cle_footer', array($this, 'render'));
    }

    public function render() {
        $config = SocialContact::config();
        if(!empty($config['active']) && method_exists($config['active'], 'render')) {
            if($config['pc-show'] == 1 || $config['mb-show'] == 1) {
                $config['active']::render();
            }
        }

        $config = PhoneContact::config();
        if(!empty($config['active']) && method_exists($config['active'], 'render')) {
            if($config['pc-show'] == 1 || $config['mb-show'] == 1) {
                $config['active']::render();
            }
        }
    }
}

if(Admin::is()) {
    include 'admin.php';
    include 'update.php';
}
else {
    new social_contact_button();
}

include 'modules/social-contact/social-contact.php';
include 'modules/phone-contact/phone.php';