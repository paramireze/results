
<h1><?= $title ?></h1>

<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Race</th>
    </tr>
    </thead>
    <?php foreach($race_types as $race_type) : ?>
        <tr>
            <td><a href="<?php echo base_url(); ?>races/<?php echo $race_type['rt_slug']; ?>"><?php echo $race_type['rt_name']; ?></a></td>
        </tr>
    <?php endforeach; ?>

    <tfoot>
    <tr>
        <th>Race</th>
    </tr>
    </tfoot>
    <tbody>



    </tbody>
</table>