
<!DOCTYPE html>
<html>

<!-- Start Header -------------------------------------------------------------------------------------------------------------->
<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    
    <!-- Title -->
    <?php echo '<title>', $title, '</title>'; ?>


    <!-- Bootstrap -->
    <script src="https://unpkg.com/jquery@3.5.1/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" >
    <link href="https://unpkg.com/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.0.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://unpkg.com/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Drag and Drop -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js" integrity="sha512-zYXldzJsDrNKV+odAwFYiDXV2Cy37cwizT+NkuiPGsa9X1dOz04eHvUWVuxaJ299GvcJT31ug2zO4itXBjFx4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <!-- charts -->
    <link rel="stylesheet" href="<?php echo APPPATH . 'Libraries/lib/js/chartphp.css'?>">
    <script src="<?php echo APPPATH . 'Libraries/lib/js/jquery.min.js'?>"></script>
    <script src="<?php echo APPPATH . 'Libraries/lib/js/chartphp.js'?>"></script>

    <!-- another chart try -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


    <script src="raphael-min.js"><
        <script src="flowchart-latest.js"></script>
</head>
<!-- End Header ---------------------------------------------------------------------------------------------------------------->

<!-- Start Body ---------------------------------------------------------------------------------------------------------------->
<body>
