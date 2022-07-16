<?php
$module = 'scb_'.$module;
$module::render();
?>
<style>
    :root {
        --phone-pc-vertical:<?php echo $config['phone']['pc-vertical'];?>px;
        --phone-pc-horizontal:<?php echo $config['phone']['pc-horizontal'];?>px;
        --phone-mb-vertical:<?php echo $config['phone']['mb-vertical'];?>px;
        --phone-mb-horizontal:<?php echo $config['phone']['mb-horizontal'];?>px;
        --phone-pc-display:<?php echo ($config['phone']['pc-show'] == 0) ? 'none' : 'block';?>;
        --phone-mb-display:<?php echo ($config['phone']['mb-show'] == 0) ? 'none' : 'block';?>;
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