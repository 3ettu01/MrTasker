<div class="modal fade" id="Modaleditp" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body d-flex justify-content-center align-items-center p-4">

                <!-- Contenedor -->
                <?php echo form_open('form/editperfil', ['id' => 'form_editperfil',
                                                        'class' => 'g-0 card-design w-50']); ?>
                    <div class="row">
                        <?php echo form_input(array(
                            'name' => 'editnombre', 
                            'class' => 'card-input',
                            'type' => 'text',
                            'value' => $user_datos['nombre'],
                            'placeholder' => 'Nombre'
                        ));
                        if (session('errors.editnombre')){   ?>
                            <div class="form-text text-dark text-end"><?= session('errors.editnombre') ?></div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <?php echo form_input(array(
                            'name' => 'editemail', 
                            'class' => 'card-input',
                            'type' => 'text',
                            'value' => $user_datos['email'],
                            'placeholder' => 'email'
                        ));
                        if (session('errors.editemail')){   ?>
                            <div class="form-text text-dark text-end"><?= session('errors.editemail') ?></div>
                        <?php } ?>
                    </div>

                    <p class="mb-0 auxiliartext mt-3">Icono</p>
                    <div class="row text-center pb-3 pt-3 card-icons px-2 mb-4">

                        <?php
                        $img_base_url = base_url('public/recursos/img/iconsuser/');
                        for ($i = 0; $i <= 9; $i++): ?>
                            <?php if ($i % 5 == 0): ?>
                                <div class="row p-0 m-0">
                            <?php endif; ?>
                            
                            <div class="col p-0">
                                <?= form_radio([
                                    'name' => 'editIcon',
                                    'id' => 'cat' . $i,
                                    'value' => $i,
                                    'class' => 'd-none',
                                    'checked' => $user_datos['icono'] == $i
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

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="card-button w-50 mt-3 text-white" onclick="document.getElementById('form_editperfil').submit();" style="background-color: #802b1a;">
                            Editar
                        </button>
                    </div>
                    </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        <?php 
        if (session('errors.editnombre')||session('errors.editemail')) { ?>
            var modal = new bootstrap.Modal(document.getElementById('Modaleditp'));
            modal.show();
        <?php } ?>
    });
</script>