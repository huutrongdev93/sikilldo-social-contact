<?php
$styles = scb_phone::style();
$active = Option::get('scb_phone_active');
?>
<div class="scb_phone-box">
    <div class="row">
        <div class="col-md-6">
            <div class="scb_phone__select_box">
                <?php
                $Form = new FormBuilder();
                $Form->add('phone[pc-show]', 'switch', ['label' => 'Hiển thị trên desktop'], social_contact_button::config('phone.pc-show'));
                $Form->add('phone[pc-position]', 'select-img', [
                    'label' => 'Vị trí',
                    'options' => [
                        'bottomLeft'    => [ 'label' => '', 'img'   => Admin::imgLink('bottomLeft.png')],
                        'bottomRight'   => [ 'label' => '', 'img'   => Admin::imgLink('bottomRight.png')],
                        'topLeft'       => [ 'label' => '', 'img'   => Admin::imgLink('topLeft.png')],
                        'topRight'      => [ 'label' => '', 'img'   => Admin::imgLink('topRight.png')],
                    ],
                ], social_contact_button::config('phone.pc-position'));
                $Form->add('phone[pc-vertical]', 'range', ['label' => 'Canh lề dọc', 'min' => 0, 'max' => 200], social_contact_button::config('phone.pc-vertical'));
                $Form->add('phone[pc-horizontal]', 'range', ['label' => 'Canh lề ngang', 'min' => 0, 'max' => 200], social_contact_button::config('phone.pc-horizontal'));
                $Form->html(false);
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="scb_phone__select_box">
                <?php
                $Form->add('phone[mb-show]', 'switch', ['label' => 'Hiển thị trên mobile'], social_contact_button::config('phone.mb-show'));
                $Form->add('phone[mb-position]', 'select-img', [
                    'label' => 'Vị trí',
                    'options' => [
                        'bottomLeft'    => [ 'label' => '', 'img'   => Admin::imgLink('bottomLeft.png')],
                        'bottomRight'   => [ 'label' => '', 'img'   => Admin::imgLink('bottomRight.png')],
                        'topLeft'       => [ 'label' => '', 'img'   => Admin::imgLink('topLeft.png')],
                        'topRight'      => [ 'label' => '', 'img'   => Admin::imgLink('topRight.png')],
                    ],
                ], social_contact_button::config('phone.mb-position'));
                $Form->add('phone[mb-vertical]', 'range', ['label' => 'Canh lề dọc', 'min' => 0, 'max' => 200], social_contact_button::config('phone.mb-vertical'));
                $Form->add('phone[mb-horizontal]', 'range', ['label' => 'Canh lề ngang', 'min' => 0, 'max' => 200], social_contact_button::config('phone.mb-horizontal'));
                $Form->html(false);
                ?>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-8">
            <div class="scb_phone__select_box">
                <label for="">Chọn mẫu</label>
                <hr style="margin: 5px 0;">
                <div class="clearfix"> </div>
                <?php foreach ($styles as $item_key => $item): ?>
                    <label class="scb_phone__select <?php echo ($active == $item_key) ? 'active' : '';?>" data-tab="#tab-<?php echo $item_key;?>">
                        <?php $item_key::admin_demo();?>
                        <input type="radio" value="<?php echo $item_key;?>" name="style" <?php echo ($active == $item_key) ? 'checked' : '';?>>
                    </label>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="scb_phone__select_box">
                <label for="">Cấu hình</label>
                <hr style="margin: 5px 0;">
                <div class="clearfix"> </div>
                <?php foreach ($styles as $item_key => $item): ?>
                    <div class="tabs-option <?php echo ($active == $item_key) ? 'active' : '';?>" id="tab-<?php echo $item_key;?>">
                        <?php $item_key::admin_config();?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<style>
    .scb_phone__select_box { background-color: #fff; padding:10px; overflow:hidden;}
    .scb_phone__select {
        position: relative; overflow: hidden; height: auto; width:32%;
        border:2px solid #E3E7FB; border-radius: 5px;
    }
    .scb_phone__select img {
        width: 100%;
    }
    .scb_phone__select.active {
        border:2px solid #263A53;
    }
    .tabs-option { display: none; }
    .tabs-option.active { display: block; }
</style>
<script type="text/javascript">
    $(function() {
        let id = $('.scb_phone__select.active').attr('data-tab');
        $('.scb_phone__select').click( function () {
            id = $(this).attr('data-tab');
            $('.scb_phone__select.active').removeClass('active');
            $(this).addClass('active');
            $('.tabs-option.active').removeClass('active');
            $(id).addClass('active');
        });
    });
</script>
