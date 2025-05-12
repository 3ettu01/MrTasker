<div class="modal fade" id="Modalcoop" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body d-flex justify-content-center align-items-center p-4">

                <!-- Contenedor -->
                <?php echo form_open('form/addcoop', ['id' => 'form_addcoop',
                                                        'class' => 'g-0 card-design w-50',
                                                        'style' => 'background-color:'. $tarea['colorcod'] .';']); ?>
                    
                    <p>Agregar colaborador</p>
                    <?php
                    echo form_input(array(
                                'name' => 'col_email', 
                                'class' => 'm-0 card-input2',
                                'type' => 'email',
                                'placeholder' => 'Agregar email',
                                'value' => old('col_email')
                    )); 
                    if (session('errors.col_email')) { ?>
                        <div class="form-text text-danger fw-bold text-end"><?= session('errors.col_email') ?></div>
                    <?php } ?>
                    <span class="card-subtext"> Tipo de colaboracion </span>
                    
                    <?php
                    $roles = [
                        'p' => 'Participante',
                        'e' => 'Editor'
                    ];
                    echo form_dropdown('col_rol', $roles, '', [
                        'class' => 'p-0 m-0 card-input2',
                        'id'    => 'col_rol'
                    ]);
                    ?>
                    <?php
                    echo form_input(array(
                                'name' => 'col_idtarea', 
                                'type' => 'hidden',
                                'value' => $tarea['id']
                    )); ?>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="card-button w-50 mt-3 text-white" style="background-color: #802b1a;"
                        onclick="">
                            Solicitar
                        </button>
                    </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        <?php 
        if (session('errors')) { ?>
            var modal = new bootstrap.Modal(document.getElementById('Modalcoop'));
            modal.show();
        <?php } ?>
    });
</script>