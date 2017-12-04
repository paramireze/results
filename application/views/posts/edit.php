<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>" />
<div class="form-group">
    <label>title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>" aria-describedby="title">

</div>
<div class="form-group">
    <label for="exampleInputPassword1">body</label>
    <textarea class="form-control" name="body" placeholder="add body" ><?php echo $post['body']; ?></textarea>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>