
<h1><?= $title ?></h1>
<?php foreach($posts as $post) : ?>
    <h3><?php echo $post['title']; ?></h3>
    <small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br />
    <div><string><?php echo $post['name']; ?></string></div>
    <?php echo word_limiter($post['body'], 50); ?>
    <p><a class="btn btn-primary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">read more</a></p><hr />
<?php endforeach; ?>
