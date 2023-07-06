<div class="animated social-contact-style3 social-<?php echo SocialContact::config('pc-position');?> social-mb-<?php echo SocialContact::config('mb-position');?>">
    <?php foreach ($buttons as $btnKey => $btn) { ?>
        <a href="<?php echo (!isset($btn['onclick'])) ? $btn['url'] : '#';?>" class="social-contact-item <?php echo $btn['class'];?>" <?php echo (isset($btn['target'])) ? 'target="'.$btn['target'].'"' : '';?>>
            <?php echo $btn['icon'];?>
        </a>
    <?php } ?>
</div>
<style>
    .social-contact-style3 {
        --social-pc-vertical:<?php echo SocialContact::config('pc-vertical');?>px;
        --social-pc-horizontal:<?php echo SocialContact::config('pc-horizontal');?>px;
        --social-mb-vertical:<?php echo SocialContact::config('mb-vertical');?>px;
        --social-mb-horizontal:<?php echo SocialContact::config('mb-horizontal');?>px;
        --social-pc-display:<?php echo (SocialContact::config('pc-show') == 0) ? 'none' : 'block';?>;
        --social-mb-display:<?php echo (SocialContact::config('mb-show') == 0) ? 'none' : 'block';?>;
        --mainColor: <?php echo $config['bg'];?>;
        --txtColor: <?php echo $config['color'];?>;
        position: fixed;
        z-index: 21;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: var(--mainColor);
        transform: translateY(-50%);
        flex-direction: column;
        padding:10px;
    }
    .social-contact-style3:before, .social-contact-style3:after {
        content: "";
        position: absolute;
        height: 30px;
        width: 60px;
        pointer-events: none;
    }
    .social-contact-item {
        width: 36px;
        height: 36px;
        line-height: 36px;
        border-radius: 30px;
        display: flex; align-items: center; justify-content: center;
        background: var(--mainColor);
        position: relative;
        color:var(--txtColor);
        font-size:30px;
        margin: 5px 0;
    }
    .social-contact-item svg {
        fill: var(--txtColor);
    }
    .social-contact-item.phone-box {
        animation: play0 1.5s ease infinite
    }
    @keyframes play0 {
        0% {
            transform: rotate(0deg) scale(1) skew(1deg)
        }

        10% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        20% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        30% {
            transform: rotate(-25deg) scale(1) skew(1deg)
        }

        40% {
            transform: rotate(25deg) scale(1) skew(1deg)
        }

        50% {
            transform: rotate(0deg) scale(1) skew(1deg)
        }

        100% {
            transform: rotate(0deg) scale(1) skew(1deg)
        }
    }
    @media(min-width: 601px) {
        .social-contact-style3.social-bottomLeft {
            left: 0;
            bottom: var(--social-pc-vertical);
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            animation-name:fadeInLeft;
        }
        .social-contact-style3.social-bottomLeft:before, .social-contact-style3.social-topLeft:before {
            top: -30px;
            left: 0px;
            border-radius: 0 0 0 50px;
            box-shadow: -30px 0 0 0 var(--mainColor);
        }
        .social-contact-style3.social-bottomLeft:after, .social-contact-style3.social-topLeft:after {
            bottom: -30px;
            left: 0px;
            border-radius: 50px 0 0 0;
            box-shadow: -30px 0 0 0 var(--mainColor);
        }
        .social-contact-style3.social-bottomRight {
            right: 0;
            bottom: var(--social-pc-vertical);
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            animation-name:fadeInRight;
        }
        .social-contact-style3.social-bottomRight:before, .social-contact-style3.social-topRight:before {
            top: -30px;
            right: 0px;
            border-radius: 0 0 50px 0;
            box-shadow: 30px 0 0 0 var(--mainColor);
        }
        .social-contact-style3.social-bottomRight:after, .social-contact-style3.social-topRight:after {
            bottom: -30px;
            right: 0px;
            border-radius: 0 50px 0px 0;
            box-shadow: 30px 0 0 0 var(--mainColor);
        }
        .social-contact-style3.social-topLeft {
            left: 0;
            top: var(--social-pc-vertical);
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            animation-name:fadeInLeft;
        }
        .social-contact-style3.social-topRight {
            right: 0;
            top: var(--social-pc-vertical);
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            animation-name:fadeInRight;
        }
    }
    @media(max-width: 600px) {
        .social-contact-style3 {
            display: var(--social-mb-display)!important;
        }
        .social-contact-style3.social-mb-bottomLeft {
            left: 0;
            bottom: var(--social-mb-vertical);
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            animation-name:fadeInLeft;
        }
        .social-contact-style3.social-mb-bottomRight {
            right: 0;
            bottom: var(--social-mb-vertical);
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            animation-name:fadeInRight;
        }
        .social-contact-style3.social-mb-topLeft {
            left: 0;
            top: var(--social-mb-vertical);
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            animation-name:fadeInLeft;
        }
        .social-contact-style3.social-mb-topRight {
            right: 0;
            top: var(--social-mb-vertical);
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            animation-name:fadeInRight;
        }
        .social-contact-style3.social-mb-bottomLeft:before, .social-contact-style3.social-mb-topLeft:before {
            top: -30px;
            left: 0px;
            border-radius: 0 0 0 50px;
            box-shadow: -30px 0 0 0 var(--mainColor);
        }
        .social-contact-style3.social-mb-bottomLeft:after, .social-contact-style3.social-mb-topLeft:after {
            bottom: -30px;
            left: 0px;
            border-radius: 50px 0 0 0;
            box-shadow: -30px 0 0 0 var(--mainColor);
        }
        .social-contact-style3.social-mb-bottomRight:before, .social-contact-style3.social-mb-topRight:before {
            top: -30px;
            right: 0px;
            border-radius: 0 0 50px 0;
            box-shadow: 30px 0 0 0 var(--mainColor);
        }
        .social-contact-style3.social-mb-bottomRight:after, .social-contact-style3.social-mb-topRight:after {
            bottom: -30px;
            right: 0px;
            border-radius: 0 50px 0px 0;
            box-shadow: 30px 0 0 0 var(--mainColor);
        }
    }
</style>