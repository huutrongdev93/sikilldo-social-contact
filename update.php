<?php
if(!Admin::is()) return;

add_action('admin_init', 'SocialContactButtonUpdate::checkVersion');

Class SocialContactButtonUpdate {
    static function checkVersion(): void {
        if(Admin::is() && Auth::check() ) {
            $version = Option::get('social_contact_version');
            $version = (empty($version)) ? '1.2.2' : $version;
            if (version_compare( SCB_VERSION, $version, '>' )) {
                $update = new SocialContactButtonUpdate();
                $update->runUpdate($version);
            }
        }
    }
    public function runUpdate($seoVersion): void {
        $listVersion    = ['2.0.0',];
        foreach ($listVersion as $version ) {
            if(version_compare( $version, $seoVersion ) == 1) {
                $function = 'updateVersion_'.str_replace('.','_',$version);
                if(method_exists($this, $function)) $this->$function();
            }
        }
        Option::update('social_contact_version', SCB_VERSION);
    }
    public function updateVersion_2_0_0(): void {
        SocialContactButtonUpdateDatabase::version_2_0_0();
        SocialContactButtonUpdateFiles::version_2_0_0();
    }
}
Class SocialContactButtonUpdateDatabase {
    public static function version_2_0_0(): void {

        $configOld = Option::get('social_contact_button_config');

        $socialContactConfig = SocialContact::config();

        $phoneContactConfig = PhoneContact::config();

        if(!empty($configOld['socialcontact'])) {

            $socialConfig = Option::get('scb_socialcontact_config');

            $socialActive = Option::get('scb_socialcontact_active');

            if($socialActive == 'scb_socialcontact_style1') {
                $socialContactConfig['active'] = 'SocialContactStyle1';
                $socialContactNewConfig = SocialContactStyle1::config();
            }

            if($socialActive == 'scb_socialcontact_style2') {
                $socialContactConfig['active'] = 'SocialContactStyle2';
                $socialContactNewConfig = SocialContactStyle2::config();
            }

            if(!empty($socialConfig['facebook_message_id'])) {
                Option::update('contact_facebook_message', $socialConfig['facebook_message_id']);
            }

            if(!empty($socialConfig['phone'])) {
                $phone = Option::get('contact_phone');
                if(empty($phone)) {
                    Option::update('contact_phone', $socialConfig['phone']);
                }
            }

            if(!empty($socialConfig['button']) && !empty($socialContactNewConfig)) {
                if($socialConfig['button'][0] == 'facebok_message') $socialConfig['button'][0] = 'facebook_message';
                $socialContactNewConfig['button'] = $socialConfig['button'];
            }

            if(empty($configOld['active']) || in_array('socialcontact', $configOld['active']) === false) {
                $socialContactConfig['pc-show'] = 0;
                $socialContactConfig['mb-show'] = 0;
            }

            if(!empty($socialContactNewConfig)) {
                Option::update('SocialContact', $socialContactNewConfig);
                Option::delete('scb_socialcontact_config');
                Option::delete('scb_socialcontact_active');
            }
        }

        if(!empty($configOld['phone'])) {

            $phoneConfig = Option::get('scb_phone_config');

            $phoneActive = Option::get('scb_phone_active');

            if($phoneActive == 'scb_phone_style1') {

                $phoneContactConfig['active'] = 'PhoneContactStyle1';

                $phoneNewConfig = PhoneContactStyle1::config();

                if(!empty($phoneConfig['btn_bg_color'])) $phoneNewConfig['btn_bg_color'] = $phoneConfig['btn_bg_color'];

                if(!empty($phoneConfig['btn_border_color'])) $phoneNewConfig['btn_border_color'] = $phoneConfig['btn_border_color'];

                if(!empty($phoneConfig['btn_txt_color'])) $phoneNewConfig['btn_txt_color'] = $phoneConfig['btn_txt_color'];

                if(!empty($phoneConfig['tel'])) {

                    $phone = Option::get('contact_phone');

                    if(empty($phone)) {
                        Option::update('contact_phone', $phoneConfig['tel']);
                    }
                }
            }

            if($phoneActive == 'scb_phone_style2') {

                $phoneContactConfig['active'] = 'PhoneContactStyle2';

                $phoneNewConfig = PhoneContactStyle2::config();

                if(!empty($phoneConfig['style2_btn_bg_color'])) $phoneNewConfig['btn_bg_color'] = $phoneConfig['style2_btn_bg_color'];

                if(!empty($phoneConfig['style2_btn_border_color'])) $phoneNewConfig['btn_border_color'] = $phoneConfig['style2_btn_border_color'];

                if(!empty($phoneConfig['style2_btn_txt_color'])) $phoneNewConfig['btn_txt_color'] = $phoneConfig['style2_btn_txt_color'];

                if(!empty($phoneConfig['style2_phone'])) {

                    $phone = Option::get('contact_phone');

                    if(empty($phone)) {
                        Option::update('contact_phone', $phoneConfig['tel']);
                    }
                }
            }

            if(empty($configOld['active']) || in_array('phone', $configOld['active']) === false) {
                $phoneContactConfig['pc-show'] = 0;
                $phoneContactConfig['mb-show'] = 0;
            }

            if(!empty($phoneNewConfig)) {
                Option::update('PhoneContact', $phoneNewConfig);
                Option::delete('scb_phone_config');
                Option::delete('scb_phone_active');
            }
        }

        Option::update('social_contact_button_config', [
            'socialContact' => $socialContactConfig,
            'phoneContact' => $phoneContactConfig,
        ]);
    }
}
Class SocialContactButtonUpdateFiles {
    public static function version_2_0_0(): void {
        $path = FCPATH.VIEWPATH.'plugins/'.SCB_NAME;
        $Files = [
            'admin/admin.php',
            'module/html-main-phone.php',
            'module/html-main-socialcontact.php',
        ];
        foreach ($Files as $file) {
            if(file_exists($path.$file)) {
                unlink($path.$file);
            }
        }
        $Folders = [
            'admin/views',
            'modules/phone',
            'modules/socialcontact',
        ];
        foreach ($Folders as $folder) {
            if(is_dir($path.$folder)) {
                rmdir($path.$folder);
            }
        }
    }
}