<?php
$Form = new FormBuilder();
$Form->add('style2_phone', 'text', ['label' => 'Số điện thoại',], $config['style2_phone']);
$Form->add('style2_btn_bg_color', 'color', ['label' => 'Màu nền',], $config['style2_btn_bg_color']);
$Form->add('style2_btn_border_color', 'color', ['label' => 'Màu viền',], $config['style2_btn_border_color']);
$Form->add('style2_btn_txt_color', 'color', ['label' => 'Màu chữ',], $config['style2_btn_txt_color']);
$Form->html(false);