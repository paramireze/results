<html>
<head>
    <title>import excel spreadsheet</title>
</head>
<body>
<h1>Excel Page</h1><?php
echo form_open_multipart('excel/import-data');
echo form_upload('file');
echo '<br/>';
echo form_submit(null, 'upload');
echo form_close();
?>
</body>
</html>