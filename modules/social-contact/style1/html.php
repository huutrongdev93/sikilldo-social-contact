<div class="animated fadeInUp social-contact-box social-contact-style1 social-<?php echo SocialContact::config('pc-position');?> social-mb-<?php echo SocialContact::config('mb-position');?>" xmlns:https="http://www.w3.org/1999/xhtml">
    <ul>
        <?php foreach ($buttons as $btnKey => $btn) { ?>
            <li class="social-contact-item <?php echo $btn['class'];?>">
                <a class="social-contact-link" href="<?php echo (!isset($btn['onclick'])) ? $btn['url'] : '#';?>"
                    <?php echo (isset($btn['onclick'])) ? 'onclick="'.$btn['onclick'].'"' : '';?>
                    <?php echo (isset($btn['target'])) ? 'target="'.$btn['target'].'"' : '';?>><?php echo $btn['icon'];?>
                </a>
            </li>
        <?php } ?>
        <?php foreach ($config['extend'] as $btnKey => $btn) { ?>
        <li class="social-contact-item">
            <a href="<?php echo $btn['url'];?>" class="social-contact-link" target="_blank" style="--color:<?php echo $btn['color'];?>">
                <?php echo Template::img($btn['icon']);?>
            </a>
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
        background-color: var(--color, #fff); color:#000;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        transition: all 0.3s;
    }
    .social-contact-style1 .social-contact-item a img {
        width: 30px;filter: brightness(0) invert(1);
    }
    .social-contact-style1 .social-contact-item a:hover {
        background-color: #fff;
    }
    .social-contact-style1 .social-contact-item a:hover img {
        width: 30px;filter: brightness(1) invert(0);
    }
     :root {
         --social-pc-vertical:<?php echo SocialContact::config('pc-vertical');?>px;
         --social-pc-horizontal:<?php echo SocialContact::config('pc-horizontal');?>px;
         --social-mb-vertical:<?php echo SocialContact::config('mb-vertical');?>px;
         --social-mb-horizontal:<?php echo SocialContact::config('mb-horizontal');?>px;
         --social-pc-display:<?php echo (SocialContact::config('pc-show') == 0) ? 'none' : 'block';?>;
         --social-mb-display:<?php echo (SocialContact::config('mb-show') == 0) ? 'none' : 'block';?>;

         --fb-fp:#0674E8;
         --fb-ms:#0080F7;
         --fb-share:#0080F7;
         --twitter-page:#41B6E4;
         --twitter-share:#41B6E4;
         --yt-page:#D92E2E;
         --ins-page:#AA168B;
         --pinterest-page:#B7081B;
         --email-page:#1B9AC3;
         --skype-page:#14A7DE;
         --phone-page:#2CBB00;
         --sms-page:#F0C823;
         --zalo-page:#0088FF;
     }
    .social-contact-box {
        position: fixed; display: var(--social-pc-display); z-index: 999999;
    }
    .social-contact-box ul {
        list-style:none; margin-bottom: 0; padding:0;
    }
    .social-contact-item a img {
        width: 30px;
    }
    .social-contact-item.social-contact-fb a {
        background-color: var(--fb-fp); color:#fff;
    }
    .social-contact-item.social-contact-fb a:hover {
        background-color: #fff; color:var(--fb-fp);
    }
    .social-contact-item.social-contact-fb-ms a {
        background-color: var(--fb-ms); color:#fff;
    }
    .social-contact-item.social-contact-fb-ms a:hover {
        background-color: #fff; color:var(--fb-ms);
    }
    .social-contact-item.social-contact-fb-share a {
        background-color: var(--fb-share); color:#fff;
    }
    .social-contact-item.social-contact-fb-share a:hover {
        background-color: #fff; color:var(--fb-share);
    }
    .social-contact-item.social-contact-twitter a {
        background-color: var(--twitter-page); color:#fff;
    }
    .social-contact-item.social-contact-twitter a:hover {
        background-color: #fff; color:var(--twitter-page);
    }
    .social-contact-item.social-contact-twitter-share a {
        background-color: var(--twitter-share); color:#fff;
    }
    .social-contact-item.social-contact-twitter-share a:hover {
        background-color: #fff; color:var(--twitter-share);
    }
    .social-contact-item.social-contact-yt a {
        background-color: var(--yt-page); color:#fff;
    }
    .social-contact-item.social-contact-yt a:hover {
        background-color: #fff; color:var(--yt-page);
    }
    .social-contact-item.social-contact-ins a {
        background-color: var(--ins-page); color:#fff;
    }
    .social-contact-item.social-contact-ins a:hover {
        background-color: #fff; color:var(--ins-page);
    }
    .social-contact-item.social-contact-pinterest a {
        background-color: var(--pinterest-page); color:#fff;
    }
    .social-contact-item.social-contact-pinterest a:hover {
        background-color: #fff; color:var(--pinterest-page);
    }
    .social-contact-item.social-contact-email a {
        background-color: var(--email-page); color:#fff;
    }
    .social-contact-item.social-contact-email a:hover {
        background-color: #fff; color:var(--email-page);
    }
    .social-contact-item.social-contact-zalo a {
        background-color: var(--zalo-page); color:#fff;
    }
    .social-contact-item.social-contact-zalo a:hover {
        background-color: #fff; color:var(--zalo-page);
    }
    .social-contact-item.social-contact-skype a {
        background-color: var(--skype-page); color:#fff;
    }
    .social-contact-item.social-contact-skype a:hover {
        background-color: #fff; color:var(--skype-page);
    }
    .social-contact-item.social-contact-phone a {
        background-color: var(--phone-page); color:#fff;
    }
    .social-contact-item.social-contact-phone a:hover {
        background-color: #fff; color:var(--phone-page);
    }
    .social-contact-item.social-contact-sms a {
        background-color: var(--sms-page); color:#fff;
    }
    .social-contact-item.social-contact-sms a:hover {
        background-color: #fff; color:var(--sms-page);
    }
    @media(min-width: 601px) {
        .social-contact-box.social-bottomLeft {
            left: var(--social-pc-horizontal);
            bottom: var(--social-pc-vertical);
        }

        .social-contact-box.social-bottomRight {
            right: var(--social-pc-horizontal);
            bottom: var(--social-pc-vertical);
        }

        .social-contact-box.social-topLeft {
            left: var(--social-pc-horizontal);
            top: var(--social-pc-vertical);
        }

        .social-contact-box.social-topRight {
            right: var(--social-pc-horizontal);
            top: var(--social-pc-vertical);
        }
    }
    @media(max-width: 600px) {
        .social-contact-box {
            display: var(--social-mb-display)!important;
        }
        .social-contact-box.social-mb-bottomLeft {
            left:var(--social-mb-horizontal)!important;
            bottom:var(--social-mb-vertical)!important;
        }
        .social-contact-box.social-mb-bottomRight {
            right:var(--social-mb-horizontal)!important;
            bottom:var(--social-mb-vertical)!important;
        }
        .social-contact-box.social-mb-topLeft {
            left:var(--social-mb-horizontal)!important;
            top:var(--social-mb-vertical)!important;
        }
        .social-contact-box.social-mb-topRight {
            right:var(--social-mb-horizontal)!important;
            top:var(--social-mb-vertical)!important;
        }
    }
</style>