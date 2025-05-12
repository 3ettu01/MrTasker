<div class="modal fade" id="Modalsubt" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body d-flex justify-content-center align-items-center p-4">
                <!-- Contenedor -->
                <?php echo form_open('form/crearsubt/'. $tarea['id'], 
                    ['id' => 'form_crearsubt',
                    'class' => 'g-0 card-wrapper w-100',
                    'style' => 'max-width: 800px; background-color:'. $tarea['colorcod'] .';'
                    ]); ?>

                    <h5 class="w-100 text-center">subtarea</h5>

                    <div class="row px-3">
                        <?php
                            echo form_input(array(
                                'name' => 'sub_titulo', 
                                'class' => 'card-input2',
                                'type' => 'text',
                                'placeholder' => 'Titulo*',
                                'value' => old('sub_titulo')
                            )); 
                            if (session('errors.sub_titulo')){   ?>
                                <div class="form-text text-danger fw-bold text-end"><?= session('errors.sub_titulo') ?></div>
                            <?php } ?>
                    </div>
                    <div class="row form-floating px-3">
                        <?php
                            echo form_textarea([
                                'name' => 'sub_desc',
                                'class' => 'card-input2',
                                'placeholder' => 'Descripcion*',
                                'value' => old('sub_desc'),
                                'style' => 'height:100px'
                            ]);
                            if (session('errors.sub_desc')) { ?>
                                <div class="form-text text-danger fw-bold text-end"><?= session('errors.sub_desc') ?></div>
                            <?php } ?>
                    </div>
                    <div>
                        <div class="pt-2">Prioridad</div>
                        <?php
                            echo form_input([
                                'type' => 'radio',
                                'name' => 'sub_priori',
                                'class' => 'btn-check',
                                'id' => 'sb',
                                'value' => 'b',
                                'autocomplete' => 'off',
                                'checked'     => (old('sub_priori') === 'b' || old('sub_priori') === null)
                            ]);
                            echo form_label('Baja', 'sb', ['class' => 'btn btn-textcheck']); ?>

                            <?php
                            echo form_input([
                                'type' => 'radio',
                                'name' => 'sub_priori',
                                'class' => 'btn-check',
                                'id' => 'sm',
                                'value' => 'm',
                                'autocomplete' => 'off'
                            ]);
                            echo form_label('Media', 'sm', ['class' => 'btn btn-textcheck']); ?>

                            <?php
                            echo form_input([
                                'type' => 'radio',
                                'name' => 'sub_priori',
                                'class' => 'btn-check',
                                'id' => 'sa',
                                'value' => 'a',
                                'autocomplete' => 'off'
                            ]);
                            echo form_label('Alta', 'sa', ['class' => 'btn btn-textcheck']); ?>
                    </div>
                    <div class="row p-0 mt-3">
                        <div class="col me-2">
                            <span>Fecha de vencimiento:</span>
                            <?php
                                echo form_input(array(
                                    'name' => 'sub_fvencimiento', 
                                    'class' => 'm-0 form-control card-input2',
                                    'type' => 'date',
                                    'value' => old('sub_fvencimiento')
                                )); 
                                if (session('errors.sub_fvencimiento')){   ?>
                                    <div class="form-text text-danger fw-bold text-end"><?= session('errors.sub_fvencimiento') ?></div>
                                <?php } ?>
                        </div>
                        <div class="col ms-2">
                            <span>Fecha de recordatorio:</span>
                            <?php
                                echo form_input(array(
                                    'name' => 'sub_frecordatorio', 
                                    'class' => 'm-0 form-control card-input2',
                                    'type' => 'date',
                                    'value' => old('sub_frecordatorio')
                                )); 
                                if (session('errors.sub_frecordatorio')){   ?>
                                    <div class="form-text text-danger fw-bold text-end"><?= session('errors.sub_frecordatorio') ?></div>
                                <?php } ?>
                        </div>
                    </div>
                    <div class="row form-floating px-3">
                        <?php
                            echo form_textarea([
                                'name' => 'sub_com',
                                'class' => 'card-input2',
                                'placeholder' => 'Comentarios adicionales',
                                'value' => old('sub_com'),
                                'style' => 'height:50px'
                            ]);
                        ?>
                    </div>
                    <div class="row d-flex justify-content-center mt-3">
                        <button type="submit" class="card-button text-white" onclick="document.getElementById('form_crearsubt').submit();" style="background-color: #802b1a;">
                            Añadir
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
    if (session('errors.sub_titulo')||session('errors.sub_desc')||session('errors.sub_fvencimiento')||session('errors.sub_frecordatorio')) { ?>
        var modal = new bootstrap.Modal(document.getElementById('Modalsubt'));
        modal.show();
    <?php }  ?>
});
</script>