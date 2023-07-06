<?php
$Form = new FormBuilder();
$Form->add('PhoneContactStyle2[btn_bg_color]', 'color', ['label' => 'Màu nền',], $config['btn_bg_color']);
$Form->add('PhoneContactStyle2[btn_border_color]', 'color', ['label' => 'Màu viền',], $config['btn_border_color']);
$Form->add('PhoneContactStyle2[btn_txt_color]', 'color', ['label' => 'Màu chữ',], $config['btn_txt_color']);
$Form->html(false);