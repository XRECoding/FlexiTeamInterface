<script>
    // TODO: Lade alle Skripte aus dem Ordner Views/scripts als Java Script und nicht als php
    let baseurl = '<?= base_url()?>';

    /**
        * Create elements that can be moved with an mouse and touch.
        *  
        *
        * @example      {@link https://sortablejs.github.io/Sortable}
        * @documenation {@link https://github.com/SortableJS/Sortable}
        * @tutorial     {@link https://stackabuse.com/drag-and-drop-in-vanilla-javascript/}
    */
    
    const column = document.querySelector('.column');

    new Sortable(column, {
        animation: 150,
        ghostClass: 'blue-background-class',
        onStart: function (/**Event*/evt) {
            console.log('drag started');
        },
        onEnd: function (/**Event*/evt) {
            testus();
            console.log('drag ended');
        }
    });




    /**
        * Outgoing from the view => Interact with the database and view
        * 
        * Iterate over all elements and check if the order has changed
        * if the order changed than update the element and databse entry
    */

    function testus() {
        var items = $("#draggablePanelList").children();

        $.each(items, function(index, value) {
            if ($(value).attr('name') != $(value).index()) {
                // alert($(value).attr('name') + " <= Old || New => " + $(value).index());

                $.ajax({
                    type: "POST",
                    url: baseurl + "/Categories/updateOrder",
                    data: {
                        categoryID: $(value).attr('id'),
                        order: $(value).index()
                    },
                    success: function () {
                        // $(value).html(($(value).index() + 1) + ". " + $(value).html().slice(3)); // TODO: Must be changed
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
        $('#designation_insert').removeClass('is-invalid');
        $('#error_designation_insert').html("");
        $('#designation_insert').val(null);
        $('#save_insert').attr("onclick", "javascript:insertCategory();");

        $('#modal_insert').modal();
    }

    function actionUpdate(categoryID) {
        $('#designation_edit').removeClass('is-invalid');
        $('#error_designation_edit').html("");

        $.ajax({
            type: "POST",
            url: baseurl + "/Categories/selectCategory",
            data: {
                categoryID: categoryID
            },
            dataType: "json",
            success: function (data) {

                $('#designation_edit').val(data.designation);
                $('#save_edit').attr("onclick", "javascript:updateCategory(" + categoryID + ");");
                $('#delete_edit').attr("onclick", "javascript:deleteCategory("+categoryID+");");

                $('#modal_edit').modal();
            },
            error: function (request, status, error) {
                alert("AJAX Error: " + error);
            }
        });
    }


    /**
        * Outgoing from the modal => Interact with the database and view
        *  
        * Functions that will be called if a button of the Modal has been pressed.
        * Update the database and change the view according to the Modal
    */

    function insertCategory() {
        if($('#designation_insert').val() == "") {
            $('#designation_insert').addClass('is-invalid');
            $('#error_designation_insert').html("Bitte geben Sie eine Bezeichnung an.");
        } else {
            $.ajax({
                type: "POST",
                url: baseurl + "/Categories/insertCategory",
                data: {
                    designation: $('#designation_insert').val(),
                    order: $('#draggablePanelList').children().length
                },
                dataType: "json",
                success: function (categoryID) {
                    $('#draggablePanelList').append('<div class="btn-lg btn-block border" onclick="javascript:actionUpdate('+categoryID+');" id="'+categoryID+'" name="'+($('#draggablePanelList').children().length)+'">'+$('#designation_insert').val()+'</div>');
                    $("#modal_insert").modal('hide');
                },
                error: function (request, status, error) {
                    alert("AJAX Error:" + error);
                }
            });
        }
    }

    function updateCategory(categoryID) {
        if($('#designation_edit').val() == "") {
            $('#designation_edit').addClass('is-invalid');
            $('#error_designation_edit').html("Bitte geben Sie eine Bezeichnung an.");
        } else {
            $.ajax({
                type: "POST",
                url: baseurl + "/Categories/updateCategory",
                data: {
                    categoryID: categoryID,
                    designation: $('#designation_edit').val()
                },
                success: function (data) {
                    $('#' + categoryID).html($('#designation_edit').val());
                    $("#modal_edit").modal('hide');
                },
                error: function (request, status, error) {
                    alert("AJAX Error: " + error);
                }
            });
        }
    }

    function deleteCategory(categoryID) {
        if (confirm("Alle Einträge die zu dieser Kategorie gehören werden ebenfalls gelöscht!")) {
            $.ajax({
                type: "POST",
                url: baseurl + "/Categories/deleteCategory",
                data: {
                    categoryID: categoryID
                },
                success: function () {
                    $('#' + categoryID).remove();
                    testus();
                },
                error: function (request, status, error) {
                    alert("AJAX Error:" + error);
                }
            });
        }
    }


</script>