<!-- Registro -->
<div class="col-md-6 p-3 d-flex flex-column justify-content-center">
    <div class="card-title">o registrate</div>
    <?php
    echo form_open('form/registro', ['id' => 'form_registro']);
    echo form_input(array(
        'name' => 'nombre', 
        'class' => 'card-input',
        'type' => 'nombre',
        'placeholder' => 'Nombre',
        'value' => old('nombre')
    ));?>
    <?php if (session('errors.nombre')){   ?>
        <div class="form-text text-light text-end"><?= session('errors.nombre') ?></div>
    <?php } 
    echo form_input(array(
        'name' => 'emailr', 
        'class' => 'card-input',
        'type' => 'email',
        'placeholder' => 'Correo',
        'value' => old('emailr')
    ));?>
    <?php if (session('errors.emailr')){   ?>
        <div class="form-text text-light text-end"><?= session('errors.emailr') ?></div>
    <?php } 
    echo form_input(array(
        'name' => 'pass1', 
        'class' => 'card-input',
        'type' => 'password',
        'placeholder' => 'Contraseña',
        'value' => old('pass1')
    ));?>
    <?php if (session('errors.pass1')){   ?>
        <div class="form-text text-light text-end"><?= session('errors.pass1') ?></div>
    <?php } 
    echo form_input(array(
        'name' => 'pass2', 
        'class' => 'card-input',
        'type' => 'password',
        'placeholder' => 'Repite la contraseña',
        'value' => old('pass2')
    ));?>
    <?php if (session('errors.pass2')){   ?>
        <div class="form-text text-light text-end"><?= session('errors.pass2') ?></div>
    <?php } ?>
    
    <p class="mb-0 auxiliartext mt-3">Escoge tu icono</p>
    <div class="row text-center pb-3 pt-3 card-icons px-2 mb-4">

        <?php
        $img_base_url = base_url('public/recursos/img/iconsuser/');
        for ($i = 0; $i <= 9; $i++): ?>
            <?php if ($i % 5 == 0): ?>
                <div class="row p-0 m-0">
            <?php endif; ?>
            
            <div class="col p-0">
                <?= form_radio([
                    'name' => 'catIcon',
                    'id' => 'cat' . $i,
                    'value' => $i,
                    'class' => 'd-none',
                    'checked' => set_radio('catIcon', $i) || (old('catIcon') === null && $i == 9) // mantener selección o por defecto elegir cat9
                ]) ?>
                <label for="cat<?= $i ?>">
                    <img src="<?= $img_base_url . 'cat' . $i . '.png' ?>" class="img-fluid cat-icon" alt="Cat <?= $i ?>">
                </label>
            </div>

            <?php if ($i % 5 == 4): ?>
                </div>
            <?php endif; ?>
        <?php endfor; ?>

    </div>


    <button type="submit" class="card-button" onclick="document.getElementById('form_registro').submit();">Comenzar!</button>
    <?php echo form_close(); ?>

</div>