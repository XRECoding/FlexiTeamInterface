<!-- header -->
    <div class="d-flex justify-content-between border-bottom p-2">
        <div>
            <button name="back" id="back" class="btn m-0 p-0 pr-2">
                <i class="bi-calendar-week" style="font-size:32px;" onclick="javascript:calendarPicker()"></i>
            </button>
            <button class="btn m-0 p-0">
                <h5 class="mb-0"><?php echo $week ?>te Kalenderwoche</h5>
                <h6 class="mb-0"><?php echo $monday ?> bis <?php echo $sunday ?></h6>
            </button>
        </div>

        <div class="align-self-center">
            <form method="post" action="<?php echo base_url('index.php/WeekOverview/redirect_filter')?>">
                <button class="btn m-0 p-0" name="statistics" id="statistics">
                    <i class="bi bi-pie-chart" style="font-size:32px;"></i>
                </button>
                <button class="btn m-0 p-0" name="categories" id="categories">
                    <i class="bi bi-gear" style="font-size:32px;"></i>
                </button>
            </form>
        </div> 
    </div>


<!-- body -->
<div class="container-flex p-2 gap-3">
        <form method="post" action="<?php echo base_url('index.php/WeekOverview/button_filter')?>">
            <button class="btn btn-block border" name="monday" value="<?php echo $monday ?>"><b>Montag</b> <br> den <?php echo $monday ?></button>

            <button class="btn btn-block border" name="tuesday" value="<?php echo $tuesday ?>"><b>Dienstag</b> <br> den <?php echo $tuesday ?></button>

            <button class="btn btn-block border" name="wednesday" value="<?php echo $wednesday ?>"><b>Mittwoch</b> <br> den <?php echo $wednesday ?></button>

            <button class="btn btn-block border" name="thursday" value="<?php echo $thursday ?>"><b>Donnerstag</b> <br> den <?php echo $thursday ?></button>

            <button class="btn btn-block border" name="friday" value="<?php echo $friday ?>"><b>Freitag</b> <br> den <?php echo $friday ?></button>

            <button class="btn btn-block border" name="saturday" value="<?php echo $saturday ?>"><b>Samstag</b> <br> den <?php echo $saturday ?></button>

            <button class="btn btn-block border" name="sunday" value="<?php echo $sunday ?>"><b>Sonntag</b> <br> den <?php echo $sunday ?></button>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="calenderPickerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Wähle ein Datum aus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--  Modal Body   -->
                        <form action="<?php echo base_url('index.php/WeekOverview/pickDate')?>" method="post">
                            <container>
                                <!-- inline CSS to override bootstrap small sized datepicker -->
                                <style>
                                    .datepicker, .table-condensed {
                                        width: 100%;
                                        height: 100%;
                                    }
                                </style>
                                <!-- datepicker -->
                                <input id="dateInput" name="dateInput" class="form-control">
                                <div id="my-datepicker"></div>

                    <!-- create the datepicker with JS -->
                    <script>
                        $("#my-datepicker").datepicker().on('changeDate', function (e) {
                            $("#dateInput").val(e.format("dd.mm.yyyy"));
                        });
                    </script>
                    </container>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-success">Bestätigen</button>
                </div>
            </div>
        </div>
</div>


    <div id="diagram"></div>
    <script>
        var diagram = flowchart.parse("the code definition");
        diagram.drawSVG('diagram');

        // you can also try to pass options:

        diagram.drawSVG('diagram', {
            'x': 0,
            'y': 0,
            'line-width': 3,
            'line-length': 50,
            'text-margin': 10,
            'font-size': 14,
            'font-color': 'black',
            'line-color': 'black',
            'element-color': 'black',
            'fill': 'white',
            'yes-text': 'yes',
            'no-text': 'no',
            'arrow-end': 'block',
            'scale': 1,
            // style symbol types
            'symbols': {
                'start': {
                    'font-color': 'red',
                    'element-color': 'green',
                    'fill': 'yellow'
                },
                'end':{
                    'class': 'end-element'
                }
            },
            // even flowstate support ;-)
            'flowstate' : {
                'past' : { 'fill' : '#CCCCCC', 'font-size' : 12},
                'current' : {'fill' : 'yellow', 'font-color' : 'red', 'font-weight' : 'bold'},
                'future' : { 'fill' : '#FFFF99'},
                'request' : { 'fill' : 'blue'},
                'invalid': {'fill' : '#444444'},
                'approved' : { 'fill' : '#58C4A3', 'font-size' : 12, 'yes-text' : 'APPROVED', 'no-text' : 'n/a' },
                'rejected' : { 'fill' : '#C45879', 'font-size' : 12, 'yes-text' : 'n/a', 'no-text' : 'REJECTED' }
            }
        });
    </script>