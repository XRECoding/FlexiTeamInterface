<?= form_open('Registration/index', array('role' => 'form')) ?>
    <div class="d-flex justify-content-between border-bottom p-2">
        <div>
            <button name="info" id="info" class="btn m-0 p-0 pr-2">
                <i class="bi bi-info-circle" style="font-size:32px;"></i>
            </button>
            <div class="btn text-left m-0 p-0">
                <h5 class="mb-0">Weekly Todos</h5>
                <h6 class="mb-0">Registrierung</h6>
            </div>
        </div>
        <div class="align-self-center">
            <button name="cancel" id="cancel" class="btn m-0 p-0">
                <i class="bi bi-dash-circle" style="font-size:36px;"></i>
            </button>
            <button name="create" id="create" class="btn  m-0 p-0">
                <i class="bi bi-check-circle" style="font-size:36px;"></i>
            </button>
        </div>
    </div>

    
    <div class="card m-2">
        <div class="card-body">
            <div class="form-group">
                <label for="email">E-Mail Adresse:</label>
                <input id="email" name="email" type="text" class="form-control <?=(isset($error['email'])) ? 'is-invalid' : ''?>" value="<?=(isset($_POST['email'])) ? $_POST['email'] : ''?>"/>
                <div class="invalid-feedback"><?=(isset($error['email'])) ? $error['email'] : ''?></div>
            </div>
            <div class="form-group">
                <label for="password1">Passwort erstellen:</label>
                <input id="password1" name="password1" type="password" class="form-control <?=(isset($error['password1'])) ? 'is-invalid' : ''?>" value="<?=(isset($_POST['password1'])) ? $_POST['password1'] : ''?>"/>
                <div class="invalid-feedback"><?=(isset($error['password1'])) ? $error['password1'] : ''?></div>
            </div>
            <div class="form-group">
                <label for="password2">Passwort wiederholen:</label>
                <input id="password2" name="password2" type="password" class="form-control <?=(isset($error['password2'])) ? 'is-invalid' : ''?>"/>
                <div class="invalid-feedback"><?=(isset($error['password2'])) ? $error['password2'] : ''?></div>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>