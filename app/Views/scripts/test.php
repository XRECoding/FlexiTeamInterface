<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Sortable - Connect lists</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        #sortable1, #sortable2, {
            border: 1px solid #eee;
            width: 142px;
            min-height: 20px;
        }
        #sortable1 li, #sortable2 li {
            margin: 0 5px 5px 5px;
            padding: 5px;
            font-size: 1.2em;
            width: 120px;
        }






        /* Basic CSS for scrollable table*/
        .tableFixHead {
            overflow: auto;
            height: 75%;
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            /*  For better Drag & Drop Functionality
                This makes it easier to drop into an empty table */
            padding:5px 0;
            min-width:100px;
            /*min-height: 100px;*/
        }
        th, td {
            padding: 8px 16px;
        }
        th     {
            background:#eee;
        }

        table tr td {
            border: 1px solid red;
        }


        #main-resourceTable, #main-staffTable {
            border: 1px solid #47bc16;
        }






    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable1, #sortable2" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        } );

        $( function() {
            $( "#main-resourceTable, #main-staffTable" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        } );
    </script>
</head>
<body>

<ul id="sortable1" class="connectedSortable">
    <li class="ui-state-default">Item 1</li>
    <li class="ui-state-default">Item 2</li>
    <li class="ui-state-default">Item 3</li>
    <li class="ui-state-default">Item 4</li>
    <li class="ui-state-default">Item 5</li>
</ul>

<ul id="sortable2" class="connectedSortable">
    <li class="ui-state-highlight">Item 1</li>
    <li class="ui-state-highlight">Item 2</li>
    <li class="ui-state-highlight">Item 3</li>
    <li class="ui-state-highlight">Item 4</li>
    <li class="ui-state-highlight">Item 5</li>
</ul>

<div class="tableFixHead">
    <table>
        <thead>
        <tr>
            <th>A1</th>
            <th>A2</th>
        </tr>
        </thead>
        <tbody id="main-resourceTable" class="connectedSortable">
        <!-- Body gets filled with JS -->
        <tr><td>somedata</td><td>somedata</td></tr>
        <tr><td>somedata</td><td>somedata</td></tr>
        <tr><td>somedata</td><td>somedata</td></tr>
        <tr><td>somedata</td><td>somedata</td></tr>
        </tbody>
    </table>
</div>

<div class="tableFixHead">
    <table>
        <thead>
        <tr>
            <th>B1</th>
            <th>B2</th>
        </tr>
        </thead>
        <tbody id="main-staffTable" class="connectedSortable">
        <!-- Body gets filled with JS -->
        <tr><td>somedata</td><td>somedata</td></tr>
        <tr><td>somedata</td><td>somedata</td></tr>
        <tr><td>somedata</td><td>somedata</td></tr>
        <tr><td>somedata</td><td>somedata</td></tr>
        </tbody>
    </table>
</div>

</body>
</html>