
<h1><?= $title ?></h1>
<?php foreach($categories as $category) : ?>
    <h3><?php echo $category['name']; ?></h3>
    <small>Posted on: <?php echo $category['created_at']; ?></small><br />


<?php endforeach; ?>
