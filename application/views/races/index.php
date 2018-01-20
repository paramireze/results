<div class="py-5">
    <div class="container"><?php

    foreach($race_types as $key=>$race_type) {

        ?>

        <div class="py-5 text-center section-aquamarine"
             style="background-image: url(<?php echo $race_type['rt_image_url']; ?>);">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-3 mb-0"><?php echo $key; ?></h1>
                        <h2 class="text-light"><?php echo $race_type['rt_description']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <?php
        displayRaceInfo($key, $race_type);
    } ?>
    </div>
</div>
<?php
function displayRaceInfo($key, $race_type)
{ ?>
    <div class="row mb-5">
        <div>
            <p><?php

                foreach ($race_type['races'] as $key => $race) {
                    echo '<div><a href="#">' . $key . '</a></div>';
                    echo '<ol>';
                    foreach ($race['participants'] as $key => $participant) {

                        echo '<li>' . $key . ' - ' . $participant['p_first_name'] . ' ' . $participant['p_last_name'] . '</li>';
                    }
                    echo '</ol>';
                }
                ?>
            </p>
        </div>

    </div>

    <?php
}



