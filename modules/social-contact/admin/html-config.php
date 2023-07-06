<?php
$styles = SocialContact::style();
$active = SocialContact::config('active');
?>
<div class="row">
    <div class="col-md-3">
        <div class="ui-title-bar__group" style="padding-bottom:5px;">
            <h3 class="ui-title-bar__title" style="font-size:20px;">Hiển thị</h3>
            <p style="margin-top: 10px; margin-left: 1px; color: #8c8c8c">Quản lý hiển thị & vị trí button contact trên website</p>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box-content" style="padding:10px;">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $Form = new FormBuilder();
                        $Form->add('socialContact[pc-show]', 'switch', ['label' => 'Hiển thị trên desktop'], SocialContact::config('pc-show'));
                        $Form->add('socialContact[pc-position]', 'select-img', [
                            'label' => 'Vị trí',
                            'options' => [
                                'bottomLeft'    => [ 'label' => '', 'img'   => Admin::imgLink('bottomLeft.png')],
                                'bottomRight'   => [ 'label' => '', 'img'   => Admin::imgLink('bottomRight.png')],
                                'topLeft'       => [ 'label' => '', 'img'   => Admin::imgLink('topLeft.png')],
                                'topRight'      => [ 'label' => '', 'img'   => Admin::imgLink('topRight.png')],
                            ],
                        ], SocialContact::config('pc-position'));
                        $Form->add('socialContact[pc-vertical]', 'range', ['label' => 'Canh lề dọc', 'min' => 0, 'max' => 1000], SocialContact::config('pc-vertical'));
                        $Form->add('socialContact[pc-horizontal]', 'range', ['label' => 'Canh lề ngang', 'min' => 0, 'max' => 1000], SocialContact::config('pc-horizontal'));
                        $Form->html(false);
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $Form->add('socialContact[mb-show]', 'switch', ['label' => 'Hiển thị trên mobile'], SocialContact::config('mb-show'));
                        $Form->add('socialContact[mb-position]', 'select-img', [
                            'label' => 'Vị trí',
                            'options' => [
                                'bottomLeft'    => [ 'label' => '', 'img'   => Admin::imgLink('bottomLeft.png')],
                                'bottomRight'   => [ 'label' => '', 'img'   => Admin::imgLink('bottomRight.png')],
                                'topLeft'       => [ 'label' => '', 'img'   => Admin::imgLink('topLeft.png')],
                                'topRight'      => [ 'label' => '', 'img'   => Admin::imgLink('topRight.png')],
                            ],
                        ], SocialContact::config('mb-position'));
                        $Form->add('socialContact[mb-vertical]', 'range', ['label' => 'Canh lề dọc', 'min' => 0, 'max' => 1000], SocialContact::config('mb-vertical'));
                        $Form->add('socialContact[mb-horizontal]', 'range', ['label' => 'Canh lề ngang', 'min' => 0, 'max' => 1000], SocialContact::config('mb-horizontal'));
                        $Form->html(false);
                        ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="ui-title-bar__group" style="padding-bottom:5px;">
            <h3 class="ui-title-bar__title" style="font-size:20px;">Mẫu Giao diện</h3>
            <p style="margin-top: 10px; margin-left: 1px; color: #8c8c8c">Quản lý mẫu giao diện hiển thị trên website</p>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box-content" style="padding:10px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="social-contact__select_box">
                        <?php foreach ($styles as $item_key => $item): ?>
                            <label class="social-contact__select <?php echo ($active == $item_key) ? 'active' : '';?>" data-tab="#tab-<?php echo $item_key;?>">
                                <?php $item_key::adminImg();?>
                                <input type="radio" value="<?php echo $item_key;?>" name="style" <?php echo ($active == $item_key) ? 'checked' : '';?>>
                            </label>
                        <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php foreach ($styles as $item_key => $item): ?>
                            <div class="tabs-option <?php echo ($active == $item_key) ? 'active' : '';?>" id="tab-<?php echo $item_key;?>">
                                <?php $item_key::adminConfig();?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .social-contact__select_box {
        background-color: #fff; padding:10px; overflow:hidden;
    }
    .social-contact__select {
        position: relative; overflow: hidden; height: auto; width:calc(100%/2 - 5px);
        border:2px solid #E3E7FB; border-radius: 5px;
    }
    .social-contact__select img {
        width: 100%;
    }
    .social-contact__select.active {
        border:2px solid #263A53;
    }
    .tabs-option { display: none; }
    .tabs-option.active { display: block; }
</style>

<script type="text/javascript">
    $(function() {
        let id = $('.social-contact__select.active').attr('data-tab');
        $('.social-contact__select').click( function () {
            id = $(this).attr('data-tab');
            $('.social-contact__select.active').removeClass('active');
            $(this).addClass('active');
            $('.tabs-option.active').removeClass('active');
            $(id).addClass('active');
        });
    });
</script>