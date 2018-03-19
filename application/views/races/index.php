<div class="py-5 bg-light">
    <div class="container"><?php

        if($this->session->flashdata('success')) { ?>
            <div><?php echo $this->session->flashdata('success'); ?></div><?php
        }

        foreach($race_types as $key=>$race_type) {?>

            <div>
                <h1><?php echo $key; ?></h1>
                <p><?php echo $race_type['rt_description']; ?></p>
                <p><a href="<?php echo base_url(); ?>races/create/<?php echo $race_type['rt_slug']; ?>"><i class="fa fa-plus" ></i> add race results for this race</a></p>
                <?php
                ?>
            </div>

            <hr/><?php

            displayRaceInfo($key, $race_type);

        } ?>

    </div>
</div>

<?php
function displayRaceInfo($key, $race_type) {
    if (empty($race_type['races'])) {
        echo 'no race results listed for this race';
    } else {
        foreach ($race_type['races'] as $key => $race) {
            echo '<h1><a href="' . base_url() . 'races/' . $race_type['rt_slug'] . '/' . $race['race_slug'] . '">' . $key . '</a></h1>';
            if (!empty($race['participants_top_males'])) {
                dumpData($race['participants_top_males']);
            }

            if (!empty($race['participants_top_females'])) {
                dumpData($race['participants_top_females']);
            }
        }
    }
}


