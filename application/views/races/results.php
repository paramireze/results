<div class="py-5">
    <div class="container">
        <div class="align-center">
        <h1><?php echo $race['race_name']; ?></h1>
        <p><?php echo $race['race_description']; ?></p>
        <h3>Males</h3>
        </div>
        <div class="row">
            <div class="col-md-2"> </div>
            <div class="col-md-8">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th class="text-center">Age</th>
                        <th class="text-center">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($race_participants as $race_participant) : ?>
                        <tr>
                            <td class="align-left" style="text-align:left;"><a href="<?php echo base_url(); ?>races/"><?php echo $race_participant['p_first_name'] . ' ' . $race_participant['p_last_name']; ?></a></td>
                            <td><?php echo $race_participant['rp_time']; ?></td>
                            <td><?php echo $race_participant['rp_time']; ?></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
</div>
<?php

echo '<hr />';
echo '<pre>';
print_r($race);
echo '</pre>';

echo '<pre>';
print_r($race_participants);
echo '</pre>';
?>