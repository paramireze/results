<div class="py-5">
    <div class="container">


</div>
<h1><?= $title ?></h1><hr />

    <?php

    $i = 0;
    foreach($race_types as $race_type) {

        if ($i % 2 == 0) {
            displayEven();
        } else {
            displayOdd();
        }
        $i++;

    } ?>

<?php

function displayEven() {
    ?>
    <div class="row mb-5">
        <div class="col-md-7">
            <h2>this is the race</h2>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-md-5 align-self-center">
            <img class="img-fluid d-block w-100 img-thumbnail" src="https://pingendo.github.io/templates/sections/assets/gallery_9.jpg"> </div>
    </div>
<?
}

function displayOdd() {
    ?>
    <div class="row">
        <div class="col-md-5">
            <img class="img-fluid d-block mb-4 w-100 img-thumbnail" src="https://pingendo.github.io/templates/sections/assets/gallery_3.jpg"> </div>
        <div class="col-md-7">
            <h2 class="text-primary pt-3">Article subtitle #2</h2>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
</div>
    <?php
}

echo '<pre>';
print_r($race_types);
echo '</pre>';

