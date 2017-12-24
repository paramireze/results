
<h1><?= $title ?></h1>
<?php foreach($races as $race) : ?>
    <h3><?php echo $race['race_title']; ?></h3>
    <small >created at: <?php echo $race['race_created_at']; ?></small><br />
    <div><string><?php echo $race['race_description']; ?></string></div>

<?php endforeach; ?>
