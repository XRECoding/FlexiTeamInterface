<script>
    let baseurl = '<?= base_url()?>';

    const columns = document.querySelectorAll(".card-body");


    
    columns.forEach((column) => {
        new Sortable(column, {
            animation: 150,
            ghostClass: "blue-background-class",
            onStart: function (/**Event*/evt) {
                console.log('drag started');
            },
            onEnd: function (/**Event*/evt) {
                console.log('drag ended');
                checkOrder();

            },
            onChange: function(/**Event*/evt) {
                console.log(evt.newIndex); 
            }
        });
    });

    function checkOrder() {
        const items = document.querySelectorAll(".btn-block");
                    
        $.each(items, function(index, value) {
            if ($(value).attr('name') != $(value).index()) {
                console.log($(value).attr('name') + " || " + $(value).index()) 

                $.ajax({
                    type: "POST",
                    url: baseurl + "/DailyTodos/updateOrder",
                    data: {
                        entryID: $(value).attr('id'),
                        order: $(value).index()
                    },
                    success: function () {
                        $(value).attr('name', $(value).index());
                    },
                    error: function (request, status, error) {
                        alert("AJAX Error: " + error);
                    }
                });
            }
        });
    }
   



    /**
        * Outgoing from the view => Interact with the database and view
        * 
        * Functions that will be called if a button of the view has been pressed.
        * Call the database and change the Modal according to the database
    */

    function actionInsert() {
        $('#error_category_insert').html("");
        $('#category_insert').removeClass('is-invalid');
        $('#error_designation_insert').html("");
        $('#designation_insert').removeClass('is-invalid');

        $('#category_insert').val('--Bitte auswählen--');
        $('#designation_insert').val(null);
        $('#description_insert').val(null);
        $('#started_insert').val(null);
        $('#completed_insert').val(null);

        $('#modal_insert').modal();
    }

    function actionUpdate(entryID) {
        $.ajax({
            type: "POST",
            url: baseurl + "/DailyTodos/selectEntry",
            data: {
                entryID: entryID
            },
            dataType: "json",
            success: function (data) {
                $('#error_category_edit').html("");
                $('#category_edit').removeClass('is-invalid');
                $('#error_designation_edit').html("");
                $('#designation_edit').removeClass('is-invalid');

                $('#category_edit').val(data["category"]),
                $('#designation_edit').val(data["designation"]),
                $('#description_edit').val(data["description"]),
                $('#started_edit').val(data["started"]),
                $('#completed_edit').val(data["completed"])
                
                $('#save_edit').attr("onclick", "javascript:updateEntry(" + entryID + ");");
                $('#delete_edit').attr("onclick", "javascript:deleteEntry(" + entryID + ");");
                $('#modal_edit').modal();

            },
            error: function (request, status, error) {
                alert("AJAX Error: " + error + request + status);
            }
        });
    }


    /**
        * Outgoing from the modal => Interact with the database and view
        *  
        * Functions that will be called if a button of the Modal has been pressed.
        * Update the database and change the view according to the Modal
    */

    // TODO: Date is not set!
    function insertEntry() {
        $.ajax({
            type: "POST",
            url: baseurl + "/DailyTodos/insertEntry",
            data: {
                categoryID: $('#category_insert option:selected').attr('id'),
                designation: $('#designation_insert').val(),
                description: $('#description_insert').val(),
                started: $('#started_insert').val(),
                completed: $('#completed_insert').val(),
                order: $("#"+$('#category_insert option:selected').attr('id')).children().length
            },
            dataType: "json",
            success: function (data) {
                if (isNaN(data)) {
                    if (data["categoryID"]) {
                        $('#category_insert').addClass('is-invalid');
                        $('#error_category_insert').html(data["categoryID"]);
                    } else {
                        $('#category_insert').removeClass('is-invalid');
                        $('#error_category_insert').html("");
                    }

                    if (data["designation"]) {
                        $('#designation_insert').addClass('is-invalid');
                        $('#error_designation_insert').html(data["designation"]);
                    } else {
                        $('#designation_insert').removeClass('is-invalid');
                        $('#error_designation_insert').html("");
                    }
                } else {          
                    const myLength = $("#"+$('#category_insert option:selected').attr('id')).children().length;
                    
                    if (($('#started_insert').val()).length != 0 && ($('#completed_insert').val()).length != 0) {
                        $("#"+$('#category_insert option:selected').attr('id')).append('<div class="btn-block" name="'+myLength+'" id="'+data+'"onclick="javascript:actionUpdate('+data+')"><i class="bi bi-check-circle" style="color:green"></i> '+$('#designation_insert').val()+', '+$('#description_insert').val()+'</div>');
                    } else if (($('#started_insert').val()).length != 0) {
                        $("#"+$('#category_insert option:selected').attr('id')).append('<div class="btn-block" name="'+myLength+'" id="'+data+'"onclick="javascript:actionUpdate('+data+')"><i class="bi bi-stop-circle" style="color:blue"></i> '+$('#designation_insert').val()+', '+$('#description_insert').val()+'</div>');
                    } else {
                        $("#"+$('#category_insert option:selected').attr('id')).append('<div class="btn-block" name="'+myLength+'" id="'+data+'"onclick="javascript:actionUpdate('+data+')"><i class="bi bi-circle"></i> '+$('#designation_insert').val()+', '+$('#description_insert').val()+'</div>');
                    }
                $("#modal_insert").modal('hide');
                }
            },
            error: function (request, status, error) {
                alert("AJAX Error: " + error + request + status);
            }
        });
    }


    
    function updateEntry(entryID) {
        $.ajax({
            type: "POST",
            url: baseurl + "/DailyTodos/updateEntry",
            data: {
                entryID: entryID,
                categoryID: $('#category_edit option:selected').attr('id'),
                designation: $('#designation_edit').val(),
                description: $('#description_edit').val(),
                started: $('#started_edit').val(),
                completed: $('#completed_edit').val()
            },
            dataType: "json",
            success: function (data) {
                if (data != null) {
                    if (data["categoryID"]) {
                        $('#category_edit').addClass('is-invalid');
                        $('#error_category_edit').html(data["categoryID"]);
                    } else {
                        $('#category_edit').removeClass('is-invalid');
                        $('#error_category_edit').html("");
                    }

                    if (data["designation"]) {
                        $('#designation_edit').addClass('is-invalid');
                        $('#error_designation_edit').html(data["designation"]);
                    } else {
                        $('#designation_edit').removeClass('is-invalid');
                        $('#error_designation_edit').html("");
                    }
                } else {
                    if (($('#started_edit').val()).length != 0 && ($('#completed_edit').val()).length != 0) {
                         $('#' + entryID).html('<i class="bi bi-check-circle" style="color:green"></i> '+$('#designation_edit').val()+', '+$('#description_edit').val());
                    } else if (($('#started_edit').val()).length != 0) {
                        $('#' + entryID).html('<i class="bi bi-stop-circle" style="color:blue"></i> '+$('#designation_edit').val()+', '+$('#description_edit').val());
                    } else {
                        $('#' + entryID).html('<i class="bi bi-circle"></i> '+$('#designation_edit').val()+', '+$('#description_edit').val());
                    }

                    $("#modal_edit").modal('hide');
                }
            },
            error: function (request, status, error) {
                alert("AJAX Error: " + error + request + status);
            }
        });
    }

    function deleteEntry(entryID) {
        $.ajax({
            type: "POST",
            url: baseurl + "/DailyTodos/deleteEntry",
            data: {
                entryID: entryID
            },
            success: function (data) {
                $('#'+entryID).remove();
            },
            error: function (request, status, error) {
                alert("AJAX Error: " + error + request + status);
            }
        });
    }

</script>
