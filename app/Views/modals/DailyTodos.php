<div class="modal fade" id="modal_insert" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eintrag hinzufügen</h5>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="category_insert">Kategorie:</label>
                    <select class="form-control" id="category_insert" name="category_insert">
                        <option selected hidden>--Bitte auswählen--</option>
                        <?php
                            foreach ($categories as $category=>$entry) {
                                echo '<option id="'.$entry["categoryID"].'">'.$entry["designation"].'</option>';
                            }
                        ?>
                    </select>
                    <div class="text-danger" id="error_category_insert"></div>
                </div> 
                <div class="form-group">
                    <label for = "designation_insert">Bezeichnung:</label>
                    <input type="text" class="form-control" id="designation_insert" name="designation_insert" placeholder="Bezeichnung">
                    <div class="text-danger" id="error_designation_insert"></div>
                </div>
                <div class="form-group">
                    <label for = "description_insert">Beschreibung:</label>
                    <input type="text" class="form-control" id="description_insert" name="description_insert" placeholder="Beschreibung">
                    <div class="text-danger" id="error_description_insert"></div>
                </div>
                <br>

                <div class="form-row">
                    <div class="form-group col-6">
                        <label for = "started_insert">Gestartet:</label>
                        <input type="time" class="form-control" id="started_insert" name="started_insert" placeholder="Gestarted">
                        <div class="text-danger" id="error_started_insert"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for = "completed_insert">Beendet:</label>
                        <input type="time" class="form-control" id="completed_insert" name="completed_insert" placeholder="Beendet">
                        <div class="text-danger" id="error_completed_insert"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="footer">
                <button id="cancel_insert" class="btn btn-primary" data-dismiss="modal">Abbrechen</button>
                <button id="save_insert" class="btn btn-success"  onclick="javascript:insertEntry();">Speichern</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eintrag bearbeiten</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="category_edit">Kategorie:</label>
                    <select class="form-control" id="category_edit" name="category_edit">
                        <?php
                            foreach ($categories as $category=>$entry) {
                                echo '<option id="'.$entry["categoryID"].'">'.$entry["designation"].'</option>';
                            }
                        ?>
                    </select>
                    <div class="text-danger" id="error_category_edit"></div>
                </div> 
                <div class="form-group">
                    <label for = "designation_edit">Bezeichnung:</label>
                    <input type="text" class="form-control" id="designation_edit" name="designation_edit" placeholder="Bezeichnung">
                    <div class="text-danger" id="error_designation_edit"></div>
                </div>
                <div class="form-group">
                    <label for = "description_edit">Beschreibung:</label>
                    <input type="text" class="form-control" id="description_edit" name="description_edit" placeholder="Beschreibung">
                </div>
                <br>

                <div class="form-row">
                    <div class="form-group col-6">
                        <label for = "started_edit">Gestarted:</label>
                        <input type="time" class="form-control" id="started_edit" name="started_edit" placeholder="Gestarted">
                    </div>
                    <div class="form-group col-6">
                        <label for = "completed_edit">Beendet:</label>
                        <input type="time" class="form-control" id="completed_edit" name="completed_edit" placeholder="Beendet">
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="footer">
                <button id="delete_edit" class="btn btn-danger" data-dismiss="modal">Löschen</button>
                <button id="save_edit" class="btn btn-success">Speichern</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="info" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Infos zu den Kategorien</h5>
            </div>
            <div class="modal-body">
                <p>Erstelle, bearbeiten oder lösche To-dos. Durch Drag-and-drop kann die Reihenfolge der To-dos angepasst werden. Hast du ein To-do angefangen oder beendet, so wird er dementsprechend angezeigt.</p>
            </div>
            <div class="modal-footer" id="footer">
                <button id="close" class="btn btn-primary" data-dismiss="modal">Schließen</button>
            </div>
        </div>
    </div>
</div>