<div class="animated fadeInUp social-contact-box social-contact-style1 social-<?php echo social_contact_button::config('socialcontact.pc-position');?> social-mb-<?php echo social_contact_button::config('socialcontact.mb-position');?>" xmlns:https="http://www.w3.org/1999/xhtml">
    <ul>
        <?php foreach ($buttons as $btnKey => $btn) { ?>
            <li class="social-contact-item <?php echo $btn['class'];?>">
                <a class="social-contact-link"
                   href="<?php echo (!isset($btn['onclick'])) ? $btn['url'] : '#';?>"
                    <?php echo (isset($btn['onclick'])) ? 'onclick="'.$btn['onclick'].'"' : '';?>
                    <?php echo (isset($btn['target'])) ? 'target="'.$btn['target'].'"' : '';?>><?php echo $btn['icon'];?></a>
            </li>
        <?php } ?>
    </ul>
</div>
<style>
    .social-contact-style1 .social-contact-item {
        display: inline-block;
    }
    .social-contact-style1 .social-contact-item a {
        display: block; width: 50px; height: 50px; line-height: 50px; text-align: center; font-size: 20px;
        border-radius: 50%; overflow: hidden;
        background-color: #fff; color:#000;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        transition: all 0.3s;
    }
    .social-contact-style1 .social-contact-item.social-contact-zalo a img {
        width: 30px;filter: brightness(0) invert(1);
    }
    .social-contact-style1 .social-contact-item.social-contact-zalo a:hover img {
        width: 30px;filter: brightness(1) invert(0);
    }
</style>