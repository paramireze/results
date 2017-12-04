<h2><?php echo $post['title']; ?></h2>
<div class="post-body">
    <small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br />
    <?php echo $post['body']; ?>
</div>

<hr />

<?php  echo form_open('/posts/delete/' . $post['id']); ?>
    <input  type="submit" value="delete" class="btn btn-danger float-left ">
</form>

<a class="btn btn-primary float-right" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>

