<?php if(count($errors) > 0): ?>

    <ul class="form-errors">
        <?php foreach($errors as $error):?>
            <li> <?php echo $error; ?> </li>
        <?php endforeach; ?>
    </ul>
<?php endif;?>