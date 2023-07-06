<div class="scb-phone-box social-<?php echo PhoneContact::config('pc-position');?> social-mb-<?php echo PhoneContact::config('mb-position');?>">
    <a href="tel:<?php echo Option::get('contact_phone');?>" rel="nofollow" class="btn-call">
        <div class="btn-call__ico"><i class="fas fa-phone-alt"></i></div>
    </a>
    <div class="btn-call__number"><a href="tel:<?php echo Option::get('contact_phone');?>" rel="nofollow"><?php echo Option::get('contact_phone');?></a></div>
</div>

<style>
    :root {
        --btn-bg-color:<?php echo $config['btn_bg_color'];?>;
        --btn-border-color:<?php echo $config['btn_border_color'];?>;
        --btn-txt-color:<?php echo $config['btn_txt_color'];?>;
    }
    .scb-phone-box .btn-call {
        position: relative;
        background: var(--btn-bg-color);
        border: 2px solid var(--btn-bg-color);
        border-radius: 50%;
        box-shadow: 0 8px 10px rgba(56, 163, 253, 0.3);
        cursor: pointer;
        height: 60px;
        width: 60px;
        text-align: center;
        z-index: 999;
        transition: .3s;
        -webkit-animation: hoverWave linear 1s infinite;
        animation: hoverWave linear 1s infinite;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
    }
    .scb-phone-box .btn-call__ico {
        display: flex;
        justify-content: center;
        align-items: center;
        animation: 1200ms ease 0s normal none 1 running shake;
        animation-iteration-count: infinite;
        -webkit-animation: 1200ms ease 0s normal none 1 running shake;
        -webkit-animation-iteration-count: infinite;
        color: var(--btn-txt-color);
        font-size: 30px;
        padding-top: 5px;
        transition: .3s all;
        z-index: 3;
    }
    .scb-phone-box .btn-call__number {
        position: absolute;
        height: 50px; line-height: 50px;
        background: var(--btn-txt-color);
        border: 2px solid var(--btn-bg-color);
        box-shadow: 0 8px 10px rgba(56, 163, 253, 0.3);
        color:var(--btn-txt-color);
        font-size: 20px; font-weight: bold;
        z-index: 1;
        transition: all 0.5s;
        width: 200px;
        overflow: hidden;
    }
    .scb-phone-box .btn-call__number a {
        color: var(--btn-bg-color);
    }
    .scb-phone-box .btn-call:hover {
        background-color: var(--btn-txt-color);
    }
    .scb-phone-box .btn-call:hover .btn-call__ico {
        color: var(--btn-bg-color);
    }
    .scb-phone-box:hover .btn-call__number {
        background-color:var(--btn-txt-color);;
    }
    .scb-phone-box:hover .btn-call__number a{
        color:var(--btn-bg-color);
    }
    .scb-phone-box.social-bottomLeft .btn-call__number, .scb-phone-box.social-topLeft .btn-call__number {
        left:30px; top:5px; padding-left: 50px; border-radius: 0 20px 20px 0; text-align: left;
    }
    .scb-phone-box.social-bottomRight .btn-call__number, .scb-phone-box.social-topRight .btn-call__number {
        right:30px; top:5px; padding-right: 50px; border-radius: 20px 0 0 20px; text-align: right;
    }

    @-webkit-keyframes hoverWave {
        0% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 0 var(--btn-border-color), 0 0 0 0 var(--btn-border-color)
        }
        40% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 15px var(--btn-border-color), 0 0 0 0 var(--btn-border-color)
        }
        80% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 30px var(--btn-border-color), 0 0 0 26.7px var(--btn-border-color)
        }
        100% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 30px var(--btn-border-color), 0 0 0 40px var(--btn-border-color)
        }
    }
    @keyframes hoverWave {
        0% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 0 var(--btn-border-color), 0 0 0 0 var(--btn-border-color)
        }
        40% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 15px var(--btn-border-color), 0 0 0 0 var(--btn-border-color)
        }
        80% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 30px var(--btn-border-color), 0 0 0 26.7px var(--btn-border-color)
        }
        100% {
            box-shadow: 0 8px 10px var(--btn-border-color), 0 0 0 30px var(--btn-border-color), 0 0 0 40px var(--btn-border-color)
        }
    }
    @keyframes shake {
        0% {
            transform: rotateZ(0deg);
            -ms-transform: rotateZ(0deg);
            -webkit-transform: rotateZ(0deg);
        }

        10% {
            transform: rotateZ(-30deg);
            -ms-transform: rotateZ(-30deg);
            -webkit-transform: rotateZ(-30deg);
        }

        20% {
            transform: rotateZ(15deg);
            -ms-transform: rotateZ(15deg);
            -webkit-transform: rotateZ(15deg);
        }

        30% {
            transform: rotateZ(-10deg);
            -ms-transform: rotateZ(-10deg);
            -webkit-transform: rotateZ(-10deg);
        }

        40% {
            transform: rotateZ(7.5deg);
            -ms-transform: rotateZ(7.5deg);
            -webkit-transform: rotateZ(7.5deg);
        }

        50% {
            transform: rotateZ(-6deg);
            -ms-transform: rotateZ(-6deg);
            -webkit-transform: rotateZ(-6deg);
        }

        60% {
            transform: rotateZ(5deg);
            -ms-transform: rotateZ(5deg);
            -webkit-transform: rotateZ(5deg);
        }

        70% {
            transform: rotateZ(-4.28571deg);
            -ms-transform: rotateZ(-4.28571deg);
            -webkit-transform: rotateZ(-4.28571deg);
        }

        80% {
            transform: rotateZ(3.75deg);
            -ms-transform: rotateZ(3.75deg);
            -webkit-transform: rotateZ(3.75deg);
        }

        90% {
            transform: rotateZ(-3.33333deg);
            -ms-transform: rotateZ(-3.33333deg);
            -webkit-transform: rotateZ(-3.33333deg);
        }

        100% {
            transform: rotateZ(0deg);
            -ms-transform: rotateZ(0deg);
            -webkit-transform: rotateZ(0deg);
        }
    }
    @-webkit-keyframes shake {
        0% {
            transform: rotateZ(0deg);
            -ms-transform: rotateZ(0deg);
            -webkit-transform: rotateZ(0deg);
        }
        10% {
            transform: rotateZ(-30deg);
            -ms-transform: rotateZ(-30deg);
            -webkit-transform: rotateZ(-30deg);
        }

        20% {
            transform: rotateZ(15deg);
            -ms-transform: rotateZ(15deg);
            -webkit-transform: rotateZ(15deg);
        }

        30% {
            transform: rotateZ(-10deg);
            -ms-transform: rotateZ(-10deg);
            -webkit-transform: rotateZ(-10deg);
        }

        40% {
            transform: rotateZ(7.5deg);
            -ms-transform: rotateZ(7.5deg);
            -webkit-transform: rotateZ(7.5deg);
        }

        50% {
            transform: rotateZ(-6deg);
            -ms-transform: rotateZ(-6deg);
            -webkit-transform: rotateZ(-6deg);
        }

        60% {
            transform: rotateZ(5deg);
            -ms-transform: rotateZ(5deg);
            -webkit-transform: rotateZ(5deg);
        }

        70% {
            transform: rotateZ(-4.28571deg);
            -ms-transform: rotateZ(-4.28571deg);
            -webkit-transform: rotateZ(-4.28571deg);
        }

        80% {
            transform: rotateZ(3.75deg);
            -ms-transform: rotateZ(3.75deg);
            -webkit-transform: rotateZ(3.75deg);
        }

        90% {
            transform: rotateZ(-3.33333deg);
            -ms-transform: rotateZ(-3.33333deg);
            -webkit-transform: rotateZ(-3.33333deg);
        }

        100% {
            transform: rotateZ(0deg);
            -ms-transform: rotateZ(0deg);
            -webkit-transform: rotateZ(0deg);
        }
    }

    :root {
        --phone-pc-vertical:<?php echo PhoneContact::config('pc-vertical');?>px;
        --phone-pc-horizontal:<?php echo PhoneContact::config('pc-horizontal');?>px;
        --phone-mb-vertical:<?php echo PhoneContact::config('mb-vertical');?>px;
        --phone-mb-horizontal:<?php echo PhoneContact::config('mb-horizontal');?>px;
        --phone-pc-display:<?php echo (PhoneContact::config('pc-show') == 0) ? 'none' : 'block';?>;
        --phone-mb-display:<?php echo (PhoneContact::config('mb-show') == 0) ? 'none' : 'block';?>;
    }
    .scb-phone-box {
        position: fixed; display: var(--phone-pc-display); z-index: 9;
    }
    @media(min-width: 601px) {
        .scb-phone-box.social-bottomLeft {
            left: var(--phone-pc-horizontal);
            bottom: var(--phone-pc-vertical);
        }

        .scb-phone-box.social-bottomRight {
            right: var(--phone-pc-horizontal);
            bottom: var(--phone-pc-vertical);
        }

        .scb-phone-box.social-topLeft {
            left: var(--phone-pc-horizontal);
            top: var(--phone-pc-vertical);
        }

        .scb-phone-box.social-topRight {
            right: var(--phone-pc-horizontal);
            top: var(--phone-pc-vertical);
        }
    }
    @media(max-width: 600px) {
        .scb-phone-box {
            display: var(--phone-mb-display)!important;
        }
        .scb-phone-box.social-mb-bottomLeft {
            left:var(--phone-mb-horizontal)!important;
            bottom:var(--phone-mb-vertical)!important;
        }
        .scb-phone-box.social-mb-bottomRight {
            right:var(--phone-mb-horizontal)!important;
            bottom:var(--phone-mb-vertical)!important;
        }
        .scb-phone-box.social-mb-topLeft {
            left:var(--phone-mb-horizontal)!important;
            top:var(--phone-mb-vertical)!important;
        }
        .scb-phone-box.social-mb-topRight {
            right:var(--phone-mb-horizontal)!important;
            top:var(--phone-mb-vertical)!important;
        }
    }
</style>
