<?php
if (count($errors) > 0) : ?>
<div class='alert alert-danger' role='alert'>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
</div>
<?php  endif ?>
