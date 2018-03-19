
<?php echo form_open("races/create/$rt_slug");?>

<div class="py-5 text-white opaque-overlay" style="background-image: url('https://snag.gy/VljTLe.jpg');">
    <div class="container">
        <div class="row">
            <?php

            if (validation_errors() != false) { ?>
                <div class="alert alert-warning" id="infoMessage"><?php echo validation_errors(); ?></div><?php
            }
            ?>

            <input type="hidden" name="rt_id" value="<?php echo $rt_id; ?>" class="form-control">

            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="text-gray-dark"><?php echo $rt_name; ?></h1>
                <p class="lead mb-4">Go ahead, create me, I dare ya</p>
                <?php echo '<h1>'. $rt_slug . '</h1>'; ?>
                <div class="form-group"> <label>Name</label>
                    <input type="text" name="race_name" value="<?php echo set_value('race_name'); ?>" class="form-control"> </div>
                <div class="form-group"> <label>Slug</label>
                    <input type="text" name="race_slug" value="<?php echo set_value('race_slug'); ?>" class="form-control"> </div>
                <div class="form-group"> <label>Image URL</label>
                    <input type="text" name="race_image_url" value="<?php echo set_value('race_image_url'); ?>" class="form-control"> </div>
                <div class="form-group"> <label>Description</label>
                    <input type="text" name="race_description" value="<?php echo set_value('race_description'); ?>" class="form-control "> </div>
                <div class="form-group"> <label>Cost</label>
                    <input type="text" name="race_cost" value="<?php echo set_value('race_cost'); ?>" class="form-control "> </div>

                <?php echo form_submit('submit', 'Create Race', array('class'=>'btn btn-primary'));?>
            </div>
        </div>
    </div>
</div>


<?php echo form_close();?>