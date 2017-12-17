<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>
    <div class="form-group">
        <label>title</label>
        <input type="text" class="form-control" name="title" aria-describedby="title">

    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">body</label>
        <textarea class="form-control" name="body" placeholder="add body" ></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
echo '<pre>';
print_r($categories);
echo '</pre>';

?>