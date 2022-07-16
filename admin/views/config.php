<?php
if(have_posts($tabs)) {
    reset($tabs);
    $section = (Request::get('section')) ? Request::get('section') : key($tabs);
    ?>
    <form id="popup_main_form" method="post">
        <div class="action-bar">
            <div class="ui-layout">
                <div class="pull-right">
                    <button type="submit" class="btn-icon btn-green"><?php echo Admin::icon('save');?> Lưu</button>
                </div>
            </div>
        </div>
        <div class="ui-layout">
            <?php echo Admin::loading();?>
            <input type="hidden" name="key" id="module" class="form-control" value="<?php echo $section;?>" required>
            <div class="col-md-12">
                <div class="ui-title-bar__group" style="padding-bottom:5px;">
                    <h1 class="ui-title-bar__title">Social contact - <?php echo $tabs[$section]['label'];?></h1>
                    <div class="ui-title-bar__action">
                        <?php foreach ($tabs as $key => $tab): ?>
                            <a href="<?php echo URL_ADMIN;?>/plugins?page=social_contact_button&section=<?= $key ?>" class="<?php echo ($key == $section)?'active':'';?> btn btn-default">
                                <?php echo (isset($tab['icon'])) ? $tab['icon'] : '<i class="fal fa-layer-plus"></i>';?>
                                <?php echo $tab['label'];?>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div role="tabpanel">
                    <!-- Tab panes -->
                    <div class="tab-content" style="padding-top: 10px;">
                        <?php
                        call_user_func($tabs[$section]['callback'], $tabs[$section], $section);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $(function() {
            $('#popup_main_form').submit(function() {
                let data = $(this).serializeJSON();
                console.log(data);
                if(typeof $('.tabs-option.active').html() != 'undefined') {
                    data.theme = $( ':input' , $('.tabs-option.active')).serializeJSON();
                }
                data.action     =  'Social_Contact_Admin::save';
                $.post(base+'/ajax', data, function() {}, 'json').done(function( data ) {
                    show_message(data.message, data.status);
                });
                return false;
            });
        });
    </script>
<?php } ?>



