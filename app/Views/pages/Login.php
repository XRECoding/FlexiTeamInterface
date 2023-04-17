<?= form_open('Login/index', array('role' => 'form')) ?>
    <div class="d-flex justify-content-between border-bottom p-2">
        <div>
            <button name="back" id="back" class="btn m-0 p-0 pr-2">
                <i class="bi bi-info-circle" style="font-size:32px;"></i>
            </button>
            <div class="btn text-left m-0 p-0">
                <h5 class="mb-0">Weekly Todos</h5>
                <h6 class="mb-0">Anmeldevorgang</h6>
            </div>
        </div>
        <div class="align-self-center">
            <button class="btn m-0 p-0" name="signup" id="signup">
                <i class="bi bi-plus-circle" style="font-size:36px;"></i>
            </button>
            <button class="btn m-0 p-0" name="signin" id="signin">
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
                <label for="password">Passwort:</label>
                <input id="password" name="password" type="password" class="form-control <?=(isset($error['password'])) ? 'is-invalid' : ''?>" value="<?=(isset($_POST['password'])) ? $_POST['password'] : ''?>"/>
                <div class="invalid-feedback"><?=(isset($error['password'])) ? $error['password'] : ''?></div>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>