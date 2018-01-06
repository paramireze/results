<html>
    <head>
        <title>Results</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/style.css">
        <script type = "text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script type = "text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type = "text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            } );
        </script>
    </head>
    <body>

    <div class="container">
        <hr />
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>races">Races</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>people">People</a>
                    </li>

                </ul>

            </nav>
            <h3 class="text-muted">Madison h3 Results Page</h3>
        </div>
        <hr />

