<?php


echo '<pre>';
print_r($race);
echo '</pre>';
?>
    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Time</th>
        </tr>
        </thead>
        <?php foreach($race_participants as $race_participant) : ?>
            <tr>
                <td><a href="<?php echo base_url(); ?>races/"><?php echo $race_participant['p_first_name'] . ' ' . $race_participant['p_last_name']; ?></a></td>
                <td><?php echo $race_participant['rp_age']; ?></td>
                <td><?php echo $race_participant['rp_time']; ?></td>
            </tr>
        <?php endforeach; ?>

        <tfoot>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Time</th>
        </tr>
        </tfoot>
        <tbody>



        </tbody>
    </table>
<?php

echo '<hr />';
echo '<pre>';
print_r($race_participants);
echo '</pre>';
