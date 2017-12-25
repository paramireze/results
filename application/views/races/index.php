
<h1><?= $title ?></h1>
<?php foreach($race_types as $race_type) : ?>
    <a href="<?php echo base_url(); ?>races/<?php echo $race_type['rt_slug']; ?>"><?php echo $race_type['rt_name']; ?></a><br />
<?php endforeach; ?>
