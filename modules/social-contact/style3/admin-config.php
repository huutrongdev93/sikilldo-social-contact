<?php
$Form = new FormBuilder();

$Form->add('SocialContactStyle3[button]', 'checkbox', [
    'label' => 'Button hiển thị',
    'options' => SocialContactStyle3::social()
], $config['button']);

$Form->add('SocialContactStyle3[bg]', 'color', [
    'label' => 'Màu nền',
], $config['bg']);

$Form->add('SocialContactStyle3[color]', 'color', [
    'label' => 'Màu chữ',
], $config['color']);

$Form->html(false);