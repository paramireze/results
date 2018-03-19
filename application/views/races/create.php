<div class="py-5 bg-light">
    <div class="container">

<?php echo form_open("races/create/$rt_slug");?>


    <?php

    if (validation_errors() != false) { ?>
        <div><?php echo validation_errors(); ?></div><?php
    }
    ?>

    <input type="hidden" name="rt_id" value="<?php echo $rt_id; ?>" class="form-control">


    <div>
        <h1><?php echo $rt_name; ?></h1>
        <p>Go ahead, create me, I dare ya</p>
        <?php echo '<h1>'. $rt_slug . '</h1>'; ?>
        <div> <label>Name</label>
            <input type="text" name="race_name" value="<?php echo set_value('race_name'); ?>"> </div>
        <div> <label>Slug</label>
            <input type="text" name="race_slug" value="<?php echo set_value('race_slug'); ?>"> </div>
        <div> <label>Image URL</label>
            <input type="text" name="race_image_url" value="<?php echo set_value('race_image_url'); ?>"> </div>
        <div> <label>Description</label>
            <input type="text" name="race_description" value="<?php echo set_value('race_description'); ?>"> </div>
        <div> <label>Cost</label>
            <input type="text" name="race_cost" value="<?php echo set_value('race_cost'); ?>"> </div>

        <?php echo form_submit('submit', 'Create Race', array('class'=>'btn btn-primary'));?>
    </div>


<?php echo form_close();?>
    </div>
</div>
