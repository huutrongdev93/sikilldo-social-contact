<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-content" style="padding:20px 10px;">
                <a href="<?php echo Url::admin('system/social-contact-button?view=social-contact');?>" class="btn <?php echo ($view == 'social-contact') ? 'btn-green' : 'btn-white';?> btn-icon d-inline">MXH & Liên Hệ</a>
                <a href="<?php echo Url::admin('system/social-contact-button?view=phone-contact');?>" class="btn <?php echo ($view == 'phone-contact') ? 'btn-green' : 'btn-white';?> btn-icon d-inline">Button Hotline</a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="module" value="<?php echo $view;?>">