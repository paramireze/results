<div class="py-5">
    <div class="container"><?php
        if($this->session->flashdata('success')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php

        }
    foreach($race_types as $key=>$race_type) {

        ?>
        <div class="py-5 text-center ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-3 mb-0"><?php echo $key; ?></h1>
                        <p><?php echo $race_type['rt_description']; ?></p>
                        <p><a class="btn btn-primary" href="<?php echo base_url(); ?>races/create/<?php echo $race_type['rt_slug']; ?>"><i class="fa fa-plus" ></i> add race results for this race</a></p>
                        <?php
                        ?>
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
function displayRaceInfo($key, $race_type) {
    if (empty($race_type['races'])) {
        echo 'no race results listed for this race';
    } else {
        foreach ($race_type['races'] as $key => $race) {
            echo '<h1><a href="' . base_url() . 'races/' . $race_type['rt_slug'] . '/' . $race['race_slug'] . '">' . $key . '</a></h1>'; ?>
            <div class="row mb-5">
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Top Males</h2>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>age</th>
                                    <th>name</th>
                                    <th>time</th>
                                </tr>
                                </thead>
                                <tbody><?php
                                if (!empty($race['participants_top_males'])) {
                                    foreach ($race['participants_top_males'] as $key => $participant) {
                                        display_results($participant['rp_age'], $participant['p_first_name'], $participant['rp_time']);
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h2>Top Females</h2>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>age</th>
                                    <th>name</th>
                                    <th>time</th>
                                </tr>
                                </thead>
                                <tbody><?php
                                if (!empty($race['participants_top_females'])) {
                                    foreach ($race['participants_top_females'] as $key => $participant) {
                                        echo '<tr>';
                                        display_results($participant['rp_age'], $participant['p_first_name'], $participant['rp_time']);
                                        echo '</tr>';
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div><?php
        }
    }
}

function display_results($age, $name, $time ) {
    echo '<tr>';
    echo '<td>' . $age . '</td>';
    echo '<td>' . $name . '</td>';
    echo '<td>' . $time . '</td>';
    echo '</tr>';
}




