<div class="box">
    <div class="header"><h3>Cấu hình chung</h3></div>
    <div class="box-content">
        <?php
        $Form = new FormBuilder();
        $Form->add('active', 'checkbox', [
            'label' => 'Sử dụng loại popup',
            'options' => [
                'socialcontact'=> 'Mxh & contact',
                'phone' => 'Nút gọi điện',
            ],
            'after' => '<div class="col-md-6">', 'before' => '</div>',
        ], social_contact_button::config('active'));
        $Form->add('show', 'checkbox', [
            'label' => 'Hiển thị',
            'options' => [
                'all'           => 'Tất cả các trang',
                'home_index'    => 'Trang chủ',
                'post_index'    => 'Trang danh sách bài viết',
                'post_detail'   => 'Trang bài viết chi tiết',
                'page_detail'   => 'Trang nội dung',
                'product_index' => 'Trang danh sách sản phẩm',
                'product_detail'=> 'Trang chi tiết sản phẩm',
            ],
            'after' => '<div class="col-md-6">', 'before' => '</div>',
        ], social_contact_button::config('show'));
        $Form->html(false);
        ?>
    </div>
</div>


<style>
    .select-img .checkbox img { width:50px; border:1px solid #ccc; }
    .select-img .checkbox input:checked + label img {
        border:1px solid #000;
    }
    .select-img .checkbox label span { display: none;}
</style>
