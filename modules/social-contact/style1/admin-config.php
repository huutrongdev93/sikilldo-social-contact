<?php
$Form = new FormBuilder();
$Form->add('SocialContactStyle1[button]', 'checkbox', [
    'label' => 'Button hiển thị',
    'options' => SocialContactStyle1::social()
], $config['button']);
$Form->add('SocialContactStyle1[extend]', 'repeater', [
    'label' => 'Mở rộng',
    'fields' => [
        ['name' => 'icon', 'type' => 'image',  'label' => __('Hình icon'), 'col' => 5],
        ['name' => 'color', 'type' => 'color', 'label' => __('Màu (hover)'), 'col' => 3],
        ['name' => 'url', 'type' => 'text', 'label' => __('Liên kết'), 'col' => 4],
    ]
], $config['extend']);
$Form->html(false);