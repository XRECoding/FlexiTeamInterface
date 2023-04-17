<form method="post" action="<?php echo base_url('index.php/Settings/btnAction')?>">
    <div class="d-flex justify-content-between border pb-2 pt-2 pl-3 pr-3">
        <div>
            <button name="back" id="back" class="btn m-0 p-0 pr-2">
                <i class="bi-arrow-left-circle" style="font-size:32px;"></i>
            </button>
            <div class="btn text-left m-0 p-0">
                <h5 class="mb-0">Weekly Todos</h5>
                <h6 class="mb-0">Einstellungen</h6>
            </div>
        </div>
    </div>


    <div class="container-flex p-3">
        <button class="btn-lg btn-block text-left" name="btnCat">Kategorien</button>
        <button class="btn-lg btn-block text-left" name="btnLog">Abmelden</button>
    </div>

</form>