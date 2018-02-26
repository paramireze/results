<div class="py-5 text-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Madison Hash House Harriers</h1>
                <p class="lead">We like getting together and hosting events.</p>
            </div>
        </div>
        <div class="row">
        <?php

        foreach ($race_types as $race_type) { ?>
            <div class="col-md-4 p-4">
                <p><b><?php echo $race_type['rt_name']; ?></b></p>
                <a href="<?php echo base_url(); ?>races/<?php echo $race_type['rt_slug']  ?>"><img class="img-fluid d-block rounded-circle mx-auto" src="<?php echo $race_type['rt_image_url']; ?>"></a>
                <p class="my-4"><i><?php echo $race_type['rt_description']; ?></i></p>

            </div><?php

        }

        ?>
        </div>
    </div>
</div>

