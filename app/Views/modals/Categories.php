<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kategorie bearbeiten</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for = "designation_edit">Bezeichnung:</label>
                    <input type="text" class="form-control" id="designation_edit" name="designation_edit" placeholder="Bezeichnung">
                    <div class="text-danger" id="error_designation_edit"></div>
                </div>
            </div>
            <div class="modal-footer" id="footer">
                <button id="delete_edit" class="btn btn-danger" data-dismiss="modal">Löschen</button>
                <button id="save_edit" class="btn btn-success">Speichern</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal_insert" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kategorie erstellen</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for = "designation_insert">Bezeichnung:</label>
                    <input type="text" class="form-control" id="designation_insert" name="designation_insert" placeholder="Bezeichnung">
                    <div class="text-danger" id="error_designation_insert"></div>
                </div>
            </div>
            <div class="modal-footer" id="footer">
                <button id="cancel_insert" class="btn btn-primary" data-dismiss="modal">Abbrechen</button>
                <button id="save_insert" class="btn btn-success">Speichern</button>
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
                <p>Erstelle oder bearbeite Kategorien, welche dann automatisch im To-do Fenster erscheinen. Durch Drag-and-drop kann die Reihenfolge der Kategorien angepasst werden.</p>
            </div>
            <div class="modal-footer" id="footer">
                <button id="close" class="btn btn-primary" data-dismiss="modal">Schließen</button>
            </div>
        </div>
    </div>
</div>