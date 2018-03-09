<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Results</title>
    <link rel="icon" href="<?= asset_url();?>images/favicon-beer.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://v40.pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css"> </head>

<body>
<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa d-inline fa-lg fa-beer"></i><b>  MadHashHouseHarriers</b></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
            <ul class="navbar-nav">
                <?php

                if ($this->ion_auth->is_admin()) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>auth/" class="nav-link <?php if ($this->uri->uri_string === 'auth' && $this->uri->uri_string !== 'auth/login') { echo ' btn-secondary '; } ?> text-white" href="#"><i class="fa d-inline fa-lg fa-bookmark-o"></i> Admin</a>
                    </li>
                <?php
                }
                ?>

            </ul>
            <?php
            if (is_logged_in()) { ?>
                <a href="<?php echo base_url(); ?>auth/logout" class="btn navbar-btn ml-2 text-white "><i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign out</a>
            <?php
            } else { ?>
                <a href="<?php echo base_url(); ?>auth/login" class="btn navbar-btn ml-2  <?php if ($this->uri->uri_string === 'auth/login') { echo ' text-white btn-secondary';} ?>"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign in</a>
            <?php
            } ?>

        </div>
    </div>
</nav>
