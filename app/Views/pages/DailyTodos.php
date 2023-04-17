<form method="post" action="<?php echo base_url('index.php/DailyTodos/index')?>">
    <div class="d-flex justify-content-between border-bottom p-2">
        <div>
            <button name="back" id="back" class="btn m-0 p-0 pr-2">
                <i class="bi-arrow-left-circle" style="font-size:32px;"></i>
            </button>
            <div class="btn text-left m-0 p-0">
                <h5 class="mb-0">Todos für <?= $wochentag ?></h5>
                <h6 class="mb-0">den <?= $selectedDate ?></h6>
            </div>
        </div>
        <div class="align-self-center">
            <i class="bi bi-info-circle" style="font-size:32px;" onclick="javascript:$('#info').modal();"></i>
            <i class="bi bi-plus-circle" style="font-size:32px;" onclick="javascript:actionInsert();"></i>
        </div>
    </div>

    <?php
        foreach ($categories as $category=>$entry1) {
            echo '<div class="card m-2">';
                echo '<div class="card-header">'.$entry1["designation"].'</div>';
                echo '<div class="card-body" id='.$entry1["categoryID"].'>';
                foreach ($entries as $entry=>$entry2) {
                    if ($entry1["categoryID"] == $entry2["categoryID"]) {
                        if (strlen($entry2["completed"]) != 0 & strlen($entry2["started"]) != 0) {
                            echo '<div class="btn-block item" id="'.$entry2["entryID"].'" name="'.$entry2["order"].'" onclick="javascript:actionUpdate('.$entry2["entryID"].')"><i class="bi bi-check-circle" style="color:green"></i>'." ".$entry2["designation"].', '.$entry2["description"].'</div>';
                        } elseif (strlen($entry2["started"]) != 0) {
                            echo '<div class="btn-block item" id="'.$entry2["entryID"].'" name="'.$entry2["order"].'" onclick="javascript:actionUpdate('.$entry2["entryID"].')"><i class="bi bi-stop-circle" style="color:blue"></i>'." ".$entry2["designation"].', '.$entry2["description"].'</div>';
                        } else {
                            echo '<div class="btn-block item" id="'.$entry2["entryID"].'" name="'.$entry2["order"].'" onclick="javascript:actionUpdate('.$entry2["entryID"].')"><i class="bi bi-circle"></i>'." ".$entry2["designation"].', '.$entry2["description"].'</div>';
                        }

                    }
                }
                echo '</div>';
            echo '</div>';
        }
    ?>

</form>