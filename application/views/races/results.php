
            <h1><?php echo $race['race_name']; ?></h1>
            <p><?php echo $race['race_description']; ?></p> <?php

            if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) { ?>

                <div>
                    <div>
                        Featured
                    </div>
                    <div >
                        <h5>Special title treatment</h5>
                        <p>With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Go somewhere</a>
                    </div>
                </div> <br /><?php
            } ?>

            <h3>Results</h3>
        </div>
        <?php
        if (empty($race_participants)) { ?>
            <div>Race results have not been posted yet. Check back at a later time.</div><?php
        } else { ?>
            <div>

                <div>
                    <table>
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Age</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        dumpData($race_participants, 1);
                        foreach ($race_participants as $race_participant) : ?>
                            <tr>
                                <td><a href="<?php echo base_url(); ?>races/"><?php echo $race_participant['p_first_name'] . ' ' . $race_participant['p_last_name']; ?></a>
                                </td>
                                <td><?php echo $race_participant['rp_time']; ?></td>
                                <td><?php echo $race_participant['rp_time']; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div><?php
        }
        ?>
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