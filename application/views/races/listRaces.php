<h1><?= $title ?></h1>
<?php foreach($races as $race) : ?>

    <h2><a href="<?php echo base_url(); ?>races/<?php echo $race['rt_slug'] . '/' . $race['race_slug']; ?>"><?php echo $race['race_title']; ?></a></h2>
    <div><?php echo $race['race_description']; ?></div>
    <pre>
        <?php print_r($race); ?>
    </pre>
<?php endforeach; ?>
