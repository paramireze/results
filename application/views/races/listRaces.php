<h1><?= $title ?></h1>

<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
    </tr>
    </thead>
    <?php foreach($races as $race) : ?>
        <tr>
            <td><a href="<?php echo base_url(); ?>races/<?php echo $race['rt_slug'] . '/' . $race['race_slug']; ?>"><?php echo $race['race_title']; ?></a></td>
            <td><?php echo $race['race_description']; ?></td>
        </tr>
    <?php endforeach; ?>

    <tfoot>
    <tr>
        <th>Name</th>
        <th>Description</th>
    </tr>
    </tfoot>
    <tbody>



    </tbody>
</table>