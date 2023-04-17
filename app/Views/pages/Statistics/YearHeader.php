<form method="post" action="<?php echo base_url('index.php/Statistics/button_filter')?>">
    <div class="d-flex justify-content-between border-bottom pb-2 pt-2 pl-2 pr-2">
        <div>
            <button name="back" id="back" class="btn m-0 p-0 pr-2">
                <i class="bi-arrow-left-circle" style="font-size:32px;"></i>
            </button>
            <div class="btn text-left m-0 p-0">
                <h5 class="mb-0">Weekly Todos</h5>
                <h6 class="mb-0">Statistiken</h6>
            </div>
        </div>

        <div>
            <button class="btn m-0 p-0" name="monthStatistics">
                <i class="bi bi-calendar-minus" style="font-size:36px;"></i>
            </button>
            <button class="btn m-0 p-0" name="yearPrev">
                <i class="bi bi-arrow-left" style="font-size:36px;"></i>
            </button>
            <button class="btn m-0 p-0" name="yearNext">
                <i class="bi bi-arrow-right" style="font-size:36px;"></i>
            </button>
        </div>
    </div>
</form>