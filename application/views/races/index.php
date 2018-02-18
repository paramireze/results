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
function displayRaceInfo($key, $race_type)
{ ?>
    <div class="row mb-5">
        <div>
            <p><?php

                foreach ($race_type['races'] as $key => $race) {
                    echo '<div><a href="#">' . $key . '</a></div>';
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
                            echo '<tr>';
                            echo '<td>' . $participant['rp_age'] . '</td>';
                            echo '<td> ' . $participant['p_first_name'] . ' ' . $participant['p_last_name'] . '</td>';
                            echo '<td>' . $participant['rp_time'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    echo '</tbody>';
                    echo '</table>';

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
                            echo '<td>' . $participant['rp_age'] . '</td>';
                            echo '<td> ' . $participant['p_first_name'] . ' ' . $participant['p_last_name'] . '</td>';
                            echo '<td>' . $participant['rp_time'] . '</td>';
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
}



