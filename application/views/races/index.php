<div class="py-5">
    <div class="container"><?php

    $i = 0;
    foreach($race_types as $key=>$race_type) {

?>

        <div class="py-5 text-center section-aquamarine" style="background-image: url(<?php echo $race_type['rt_image_url']; ?>);" >
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4 mb-0"><?php echo $key; ?></h1>
                        <p class="text-light"><?php echo $race_type['rt_description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($i % 2 == 0) {
            displayEven($key, $race_type);
        } else {
            displayOdd($key, $race_type);
        }
        $i++;

    } ?>
    </div>
</div>
<?php
function displayEven($key, $race_type) { ?>
    <div class="row mb-5">
        <div >
            <p><?php

                foreach ($race_type['races'] as $key=>$race){
                    echo '<div><a href="#">' . $key . '</a></div>';
                    echo '<ol>';
                    foreach ($race['participants'] as $key=>$participant) {

                        echo '<li>' . $key . ' - ' . $participant['p_first_name'] . ' ' . $participant['p_last_name'] . '</li>';
                    }
                    echo '</ol>';
                }
               ?>
            </p>
        </div>

    </div>

<?
}

function displayOdd($key, $race_type) { ?>
    <div class="row mb-5">
        <div>

            <h2><?php echo $key; ?></h2>
            <p><?php echo $race_type['rt_description']; ?></p>

            <?php

            foreach ($race_type['races'] as $key=>$race){
                echo '<div><a href="">' . $key . '</a></div>';
                echo '<table class="table">
                    <thead>
                        <tr>
                          <th scope="col">slug</th>
                          <th scope="col">name</th>
                       
                        </tr>
                      </thead>
                      <tbody>';
                foreach ($race['participants'] as $key=>$participant) {
                    echo '<tr><td>' . $key . '</td><td>' . $participant['p_first_name'] . ' ' . $participant['p_last_name'] . '</td></tr>';
                }

                echo '</table>';
            } ?>

        </div>
    </div>


    <?php
}


