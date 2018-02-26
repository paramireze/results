<h1> </h1>
<?php


foreach($races as $raceName=>$race) { ?>

    <div class="py-5">
        <div class="container">
            <h2 class="text-primary"><a href=""><?php echo $raceName ?></a></h2>
            <div class="row mb-6">
                <div class="col-md-6">

                        <h3>Top Male</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>age</th>
                                    <th>time</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $place = 1;
                            foreach ($race['participants_top_males'] as $nameSlug=>$participant) { ?>
                                <tr>
                                    <td><?php echo $place . '. ' . $participant['p_display_name'] ?></td>
                                    <td><?php echo $participant['rp_age'] ?></td>
                                    <td><?php echo $participant['rp_time'] ?></td>
                                </tr>
                                <?php
                                $place++;
                            } ?>
                            </tbody>
                        </table>


                </div>
                <div class="col-md-6 align-self-center">
                    <h3>Top Female</h3>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>age</th>
                            <th>time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $place = 1;

                        foreach ($race['participants_top_females'] as $nameSlug=>$participant) { ?>
                            <tr>
                                <td><?php echo $place . '. ' .  $participant['p_display_name'] ?></td>
                                <td><?php echo $participant['rp_age'] ?></td>
                                <td><?php echo $participant['rp_time'] ?></td>
                            </tr>
                            <?php
                            $place++;

                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo '<pre>';
    print_r($races);
    echo '</pre>';
} ?>