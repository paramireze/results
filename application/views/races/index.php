<div class="py-5">
    <div class="container"><?php

    foreach($race_types as $key=>$race_type) {

        ?>

        <div class="py-5 text-center ">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-3 mb-0"><?php echo $key; ?></h1>
                        <h2 ><?php echo $race_type['rt_description']; ?></h2>
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
function displayRaceInfo($key, $race_type) { ?>

    <div class="row mb-5">
        <div>
            <p><?php
                foreach ($race_type['races'] as $key => $race) {
                    echo '<h1><a href="'. base_url() . 'races/' . $race_type['rt_slug'] . '/' . $race['race_slug'] . '">' . $key . '</a></h1>';
                    echo '<h2>Top Males</h2>';
                    echo '<table class="table">
                            <thead>
                              <tr>
                                <th>age</th>
                                <th>name</th>
                                <th>time</th>
                              </tr>
                            </thead>';
                    echo '<tbody>';
                    if (!empty($race['participants_top_males'])) {

                        foreach ($race['participants_top_males'] as $key => $participant) {
                            display_results($participant['rp_age'], $participant['p_first_name'], $participant['rp_time']);
                        }
                    }
                    echo '</tbody>';
                    echo '</table>';

                    echo '<h2>Top Females</h2>';
                    echo '<table class="table">
                            <thead>
                              <tr>
                                <th>age</th>
                                <th>name</th>
                                <th>time</th>
                              </tr>
                            </thead>';
                    echo '<tbody>';

                    if (!empty($race['participants_top_females'])) {
                        foreach ($race['participants_top_females'] as $key => $participant) {
                            echo '<tr>';
                                display_results($participant['rp_age'], $participant['p_first_name'], $participant['rp_time']);
                            echo '</tr>';
                        }
                    }
                    echo '</tbody>';
                    echo '</table>';

                }
                ?>
            </p>
        </div>

    </div>

    <?php
    echo '<pre>';
    print_r($race_type);
    echo '</pre>';

}

function display_results($age, $name, $time ) {
    echo '<tr>';

    echo '<td>' . $age . '</td>';
    echo '<td>' . $name . '</td>';
    echo '<td>' . $time . '</td>';
    echo '</tr>';
}




