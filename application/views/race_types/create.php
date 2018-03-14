
<?php echo form_open("race_types/create");?>

<div class="py-5 text-white opaque-overlay" style="background-image: url('https://snag.gy/VljTLe.jpg');">
    <div class="container">
        <div class="row">
            <div id="infoMessage"><?php echo validation_errors(); ?></div>

            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="text-gray-dark">Create Race Type</h1>
                <p class="lead mb-4">This is a type of race</p>
                <form class="" method="post" action="create">
                    <div class="form-group"> <label>Name</label>
                        <input type="text" name="txtName" value="<?php echo set_value('txtName'); ?>" class="form-control"> </div>
                    <div class="form-group"> <label>Slug</label>
                        <input type="text" name="txtSlug" value="<?php echo set_value('txtSlug'); ?>" class="form-control"> </div>
                    <div class="form-group"> <label>Image URL</label>
                        <input type="text" name="txtImageUrl" value="<?php echo set_value('txtImageUrl'); ?>" class="form-control"> </div>
                    <div class="form-group"> <label>Description</label>
                        <input type="text" name="txtDescription" value="<?php echo set_value('txtDescription'); ?>" class="form-control "> </div>

                    <?php echo form_submit('submit', 'Create Race Types', array('class'=>'btn btn-primary'));?>
                </form>
            </div>
        </div>
    </div>
</div>


<?php echo form_close();?>