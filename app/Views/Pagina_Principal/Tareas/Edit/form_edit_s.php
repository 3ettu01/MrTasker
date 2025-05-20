<?php $id=$sub['id']; ?>
<div class="modal fade" id="Modaleditsubt<?=$id?>" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body d-flex justify-content-center align-items-center p-4">
                <?php
                $errors = session('form_errors_'.$id);
                $old = session('form_old_'.$id);
                ?>
                <!-- Contenedor -->
                <?php echo form_open('form/editsubt/'. $sub['id'] .'/'. $tarea['id'] , 
                    ['id' => 'form_editsubt'. $id,
                    'class' => 'g-0 card-wrapper w-100',
                    'style' => 'max-width: 800px; background-color:'. $tarea['colorcod'] .';'
                    ]); ?>

                    <h5 class="w-100 text-center">Subtarea</h5>

                    <div class="row px-3">
                        <?php
                            echo form_input(array(
                                'name' => 'sub_titulo', 
                                'class' => 'card-input2',
                                'type' => 'text',
                                'placeholder' => 'Titulo*',
                                'value' => $old['sub_titulo'] ?? $sub['tema']
                            )); 
                            if (!empty($errors['sub_titulo'])): ?>
                                <div class="form-text text-danger fw-bold text-end"><?= $errors['sub_titulo'] ?></div>
                            <?php endif; ?>
                    </div>
                    <div class="row form-floating px-3">
                        <?php
                            echo form_textarea([
                                'name' => 'sub_desc',
                                'class' => 'card-input2',
                                'placeholder' => 'Descripcion*',
                                'value' => $old['sub_desc'] ?? $sub['descripcion'],
                                'style' => 'height:100px'
                            ]);
                            if (!empty($errors['sub_desc'])): ?>
                                <div class="form-text text-danger fw-bold text-end"><?= $errors['sub_desc'] ?></div>
                            <?php endif; ?>
                    </div>
                    <div>
                        <div class="pt-2">Prioridad</div>
                            <input type="radio" name='sub_priori' 
                                class="btn-check" id="sb<?=$id?>" 
                                value="b" autocomplete="off"
                                <?= $sub['prioridad'] == 'b' ? 'checked' : ''; ?>>
                            <?php echo form_label('Baja', 'sb'. $id, ['class' => 'btn btn-textcheck']); ?>

                            <input type="radio" name='sub_priori' 
                                class="btn-check" id="sm<?=$id?>" 
                                value="m" autocomplete="off"
                                <?= $sub['prioridad'] == 'm' ? 'checked' : ''; ?>>
                            <?php echo form_label('Media', 'sm'. $id, ['class' => 'btn btn-textcheck']); ?>

                            <input type="radio" name='sub_priori' 
                                class="btn-check" id="sa<?=$id?>" 
                                value="a" autocomplete="off"
                                <?= $sub['prioridad'] == 'a' ? 'checked' : ''; ?>>
                            <?php echo form_label('Alta', 'sa'. $id, ['class' => 'btn btn-textcheck']); ?>
                    </div>
                    <div class="row p-0 mt-3">
                        <div class="col me-2">
                            <span>Fecha de vencimiento:</span>
                            <?php
                                echo form_input(array(
                                    'name' => 'sub_fvencimiento', 
                                    'class' => 'm-0 form-control card-input2',
                                    'type' => 'date',
                                    'value' => $old['sub_fvencimiento'] ?? $sub['fvencimiento']
                                )); 
                                if (!empty($errors['sub_fvencimiento'])): ?>
                                    <div class="form-text text-danger fw-bold text-end"><?= $errors['sub_fvencimiento'] ?></div>
                                <?php endif; ?>
                        </div>
                        <div class="col ms-2">
                            <span>Fecha de recordatorio:</span>
                            <?php
                                echo form_input(array(
                                    'name' => 'sub_frecordatorio', 
                                    'class' => 'm-0 form-control card-input2',
                                    'type' => 'date',
                                    'value' => $old['sub_frecordatorio'] ?? $sub['frecordatorio']
                                )); 
                                if (!empty($errors['sub_frecordatorio'])): ?>
                                    <div class="form-text text-danger fw-bold text-end"><?= $errors['sub_frecordatorio'] ?></div>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="row form-floating px-3">
                        <?php
                            echo form_textarea([
                                'name' => 'sub_com',
                                'class' => 'card-input2',
                                'placeholder' => 'Comentarios adicionales',
                                'value' => $old['sub_com'] ?? $sub['comentario'],
                                'style' => 'height:50px'
                            ]);
                        ?>
                    </div>
                    <div>
                        <?php
                        echo form_dropdown('idresponsable', $responsables, $old['idresponsable'] ?? $sub['idresponsable'], [
                            'class' => 'card-input2'
                        ]);
                        ?>
                    </div>
                    <div class="row d-flex justify-content-center mt-3">
                        <button type="submit" class="card-button text-white" onclick="document.getElementById('form_editsubt'. $sub['id']).submit();" style="background-color: #802b1a;">
                            Editar
                        </button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
