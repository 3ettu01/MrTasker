<!-- Login -->
<div class="col-md-6 p-3 border-end border-dark d-flex flex-column">
    <div class="card-title">Inicia sesión</div>
    <?php
    echo form_open('form/login', ['id' => 'form_login']); //para mandarlo al ruteo
    echo form_input(array(
        'name' => 'email', 
        'class' => 'card-input',
        'type' => 'email',
        'placeholder' => 'Correo',
        'value' => old('email') //para mantener el input en caso de error
    ));
     if (session('errors.email')){   ?>
        <div class="form-text text-light text-end"><?= session('errors.email') ?></div>
    <?php } 
    echo form_input(array(
        'name' => 'pass', 
        'class' => 'card-input',
        'type' => 'password',
        'placeholder' => 'Contraseña'
    ));
     if (session('errors.pass')){   ?>
        <div class="form-text text-light text-end"><?= session('errors.pass') ?></div>
    <?php } ?>
            
    <button type="submit" class="card-button mt-4" onclick="document.getElementById('form_login').submit();">Entrar</button>
    <?php echo form_close(); ?>
</div>