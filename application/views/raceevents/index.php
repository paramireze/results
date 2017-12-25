
<h1><?= $title ?></h1>
<?php foreach($race_events as $race_event) : ?>
    <h3><?php echo $race_event['re_id'] . ' - ' . $race_event['re_date']; ?></h3>
    <small >Date: <?php echo $race_event['re_date']; ?></small><br />
    <small >Created At: <?php echo $race_event['re_created_at']; ?></small><br />
    <div >Rego Time: <?php echo $race_event['re_registration_time']; ?></div><br />
    <div>Start Time: <?php echo $race_event['re_start_time']; ?></div><br />
    <div>Cost: <?php echo $race_event['re_cost']; ?></div><br />
    <hr />
<?php endforeach; ?>
