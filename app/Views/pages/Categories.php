<form method="post" action="<?php echo base_url('index.php/Categories/index')?>">
    <div class="d-flex justify-content-between border-bottom pb-2 pt-2 pl-2 pr-2">
        <div>
            <button name="back" id="back" class="btn m-0 p-0 pr-2">
                <i class="bi-arrow-left-circle" style="font-size:32px;"></i>
            </button>
            <div class="btn text-left m-0 p-0">
                <h5 class="mb-0">Weekly Todos</h5>
                <h6 class="mb-0">Kategorien</h6>
            </div>
        </div>

        <div class="align-self-center">
            <i class="bi bi-info-circle" style="font-size:32px;" onclick="javascript:$('#info').modal();"></i>
            <i class="bi bi-plus-circle" style="font-size:32px;" onclick="javascript:actionInsert();"></i>
        </div>    
    </div>

    <div class="column m-2" id="draggablePanelList" name="draggablePanelList">
        <?php
            foreach ($entries as $categories=>$category) {
                echo '<div class="btn-lg btn-block border item" onclick="javascript:actionUpdate('.$category["categoryID"].');" id="'.$category["categoryID"].'" name="'.$category["order"].'">'.$category["designation"].'</div>';
            }
        ?>
    </div>
</form>


<!-- <form method="post" action="<?php echo base_url('index.php/Categories/btnAction')?>">
    <div class="card">
        <div class="card-header p-2">
            <div class="d-flex justify-content-between">
                <div>
                    <button name="back" id="back" class="btn m-0 p-0 pr-2">
                        <i class="bi-arrow-left-circle" style="font-size:32px;"></i>
                    </button>
                    <div class="btn text-left m-0 p-0">
                        <h5 class="mb-0">Weekly Todos</h5>
                        <h6 class="mb-0">Einstellungen</h6>
                    </div>
                </div>

                <div class="align-self-center">
                    <i class="bi bi-info-circle" style="font-size:32px;" onclick="javascript:$('#info').modal();"></i>
                    <i class="bi bi-plus-circle" style="font-size:32px;" onclick="javascript:actionInsert();"></i>
                </div>    
            </div>
        </div>
        <div class="card-body p-2">
            <div class="column" id="draggablePanelList" name="draggablePanelList">
                <?php
                    // foreach ($entries as $categories=>$category) {
                    //     echo '<div class="btn-lg btn-block border item" onclick="javascript:actionUpdate('.$category["categoryID"].');" id="'.$category["categoryID"].'" name="'.$category["order"].'">'.$category["designation"].'</div>';
                    // }
                ?>
            </div>
        </div>
    </div>
</form> -->