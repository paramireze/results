
<h1><?= $title ?></h1>
<hr />
<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Gender</th>
    </tr>
    </thead>
    <?php foreach($people as $person) : ?>
        <tr>
            <td><?php echo $person['p_id'] . ': ' . $person['p_first_name'] . ' ' .  $person['p_last_name']; ?></td>
            <td><?php echo $person['p_gender']; ?></td>
        </tr>
    <?php endforeach; ?>

    <tfoot>
    <tr>
        <th>Name</th>
        <th>Gender</th>
    </tr>
    </tfoot>
    <tbody>



    </tbody>
</table>