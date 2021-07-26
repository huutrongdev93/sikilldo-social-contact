<?php
$Form = new FormBuilder();
$Form->add('facebook_message_id', 'text', ['label' => 'Facebook message id',], $config['facebook_message_id']);
$Form->add('phone', 'text', ['label' => 'Số điện thoại (Zalo - Sms - Call)',], $config['phone']);
$Form->add('button', 'checkbox', [
    'label' => 'Button hiển thị',
    'options' => scb_socialcontact::social()
], $config['button']);
$Form->html(false);