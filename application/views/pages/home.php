<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Madison Hash House Harriers</h1>
                <p class="lead">We like getting together and hosting events</p>
            </div>
        </div>
        <div class="row">
        <?php

        foreach ($race_types as $race_type) {
            echo '<pre>';
            print_r($race_type);
        }

        ?>
        </div>
    </div>
</div>

