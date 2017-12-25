
<h1><?= $title ?></h1>
<hr />
<?php foreach($people as $person) : ?>
    <h3><?php echo $person['p_id'] . ': ' . $person['p_first_name'] . ' ' .  $person['p_last_name']; ?></h3>
    <div>Email: <?php echo $person['p_email']; ?></div><br />
    <div>Phone: <?php echo $person['p_phone']; ?></div><br />
    <div>Address: <?php echo $person['p_address']; ?></div><br />
    <div>DOB: <?php echo $person['p_dob']; ?></div><br />
    <hr />
<?php endforeach; ?>
