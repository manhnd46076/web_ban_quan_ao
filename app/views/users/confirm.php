<div id="content">
    <div class="container" style="min-height: 300px;">
        <?php if($check) : ?>
            <h3>Xác minh email <i><?php echo $email ?></i> thành công</h3>
            <p>Vui lòng <a href="?url=dangnhap&email=<?php echo $email ?>">click vào đây</a> để đăng nhập</p>
        <?php endif ?>
        <?php if(!$check) :?>
            <h3>Xác nhận email <i><?php echo $email ?></i> không thành công</h3>
        <?php endif ?>
    </div>
</div>
