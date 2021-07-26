<div class="animated fadeInLeft social-contact-box social-contact-style2 social-<?php echo social_contact_button::config('socialcontact.pc-position');?> social-mb-<?php echo social_contact_button::config('socialcontact.mb-position');?>" xmlns:https="http://www.w3.org/1999/xhtml">
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
    .social-contact-style2 {
        box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        background-color: #fff;
        border-radius: 5px;
        overflow: hidden;
    }
    .social-contact-style2 ul { width: 45px;}
    .social-contact-style2 .social-contact-item {
        display: block;
    }
    .social-contact-style2 .social-contact-item a.social-contact-link {
        display: block; width: 45px; height: 45px; line-height: 45px; text-align: center; font-size: 20px;
        overflow: hidden;
        background-color: #fff;
        color:#000;
        transition: all 0.3s;
        position: relative;
    }
    .social-contact-style2 .social-contact-item a.social-contact-link:after {
        display: block;
        border-bottom: solid 1px #dadada;
        width: 20px;
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    .social-contact-style2 .social-contact-item.social-contact-fb a {
        color: var(--fb-fp);
    }
    .social-contact-style2 .social-contact-item.social-contact-fb a:hover {
        background-color:var(--fb-fp); color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-fb-ms a {
        color: var(--fb-ms);
    }
    .social-contact-style2 .social-contact-item.social-contact-fb-ms a:hover {
        background-color:var(--fb-ms);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-fb-share a {
        color: var(--fb-share);
    }
    .social-contact-style2 .social-contact-item.social-contact-fb-share a:hover {
        background-color:var(--fb-share);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-twitter a {
        color: var(--twitter-page);
    }
    .social-contact-style2 .social-contact-item.social-contact-twitter a:hover {
        background-color:var(--twitter-page);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-twitter-share a {
        color: var(--twitter-share);
    }
    .social-contact-style2 .social-contact-item.social-contact-twitter-share a:hover {
        background-color:var(--twitter-share);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-yt a {
        color: var(--yt-page);
    }
    .social-contact-style2 .social-contact-item.social-contact-yt a:hover {
        background-color:var(--yt-page);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-ins a {
        color: var(--ins-page);
    }
    .social-contact-style2 .social-contact-item.social-contact-ins a:hover {
        background-color:var(--ins-page);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-pinterest a {
        color: var(--pinterest-page);
    }
    .social-contact-style2 .social-contact-item.social-contact-pinterest a:hover {
        background-color:var(--pinterest-page);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-email a {
        color: var(--email-page);
    }
    .social-contact-style2 .social-contact-item.social-contact-email a:hover {
        background-color:var(--email-page);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-zalo a {
        color: var(--zalo-page);
    }
    .social-contact-style2 .social-contact-item.social-contact-zalo a:hover {
        background-color:var(--zalo-page);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-zalo a:hover img {
        width: 30px;filter: brightness(0) invert(1);
    }
    .social-contact-style2 .social-contact-item.social-contact-skype a {
        color: var(--skype-page);
    }
    .social-contact-style2 .social-contact-item.social-contact-skype a:hover {
        background-color:var(--skype-page);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-phone a {
        color: var(--phone-page);
    }
    .social-contact-style2 .social-contact-item.social-contact-phone a:hover {
        background-color:var(--phone-page);color:#fff;
    }
    .social-contact-style2 .social-contact-item.social-contact-sms a {
        color:var(--sms-page);
    }
    .social-contact-style2 .social-contact-item.social-contact-sms a:hover {
        background-color:var(--sms-page);color:#fff;
    }
</style>