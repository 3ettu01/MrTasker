<?php foreach ($subtareas as $sub) : ?>

    <div class="row w-100 mt-2">
        <div class="col-10">
            <?php if($tarea['archivo']=='0'): ?> <!-- NO ESTA ARCHIVADA -->

            <?php echo form_open('tareas/actestado/'. $sub['id'] , ['id' => 'form_actestado_'. $sub['id']]);
                echo form_input(array(
                    'name' => 'idtarea', 
                    'type' => 'hidden',
                    'value' => $sub['idtarea']
                ));
                ?>
                <input type="checkbox" name="estado<?= $sub['id'] ?>" value="c" 
                    class="form-check-input custom-checkbox me-2" 
                    onchange="document.getElementById('form_actestado_<?=$sub['id']?>').submit();" 
                    <?= $sub['estado'] === 'c' ? 'checked' : '' ?>>

                <?php if ($sub['prioridad']=='a'): ?>
                    <span class="subtask-title me-2 pt-2"> <b> <?= $sub['tema'] ?> </b> <i class="bi bi-exclamation-diamond-fill"></i> </span>
                <?php else: ?>
                    <span class="subtask-title me-2 pt-2"> <?= $sub['tema'] ?> </span>
                <?php endif; ?>
                <!-- <span class="card-subtext pt-2">- asignada a Milo</span> -->
            <?php echo form_close(); ?>

            <?php else: ?> <!-- ESTA ARCHIVADA -->

                <?php if ($sub['prioridad']=='a'): ?>
                    <span class="subtask-title me-2 pt-2"> <b> <?= $sub['tema'] ?> </b> <i class="bi bi-exclamation-diamond-fill"></i> </span>
                <?php else: ?>
                    <span class="subtask-title me-2 pt-2"> <?= $sub['tema'] ?> </span>
                <?php endif; ?>
                <!-- <span class="card-subtext pt-2">- asignada a Milo</span> -->

            <?php endif; ?>
            
            <div class="card-subtext mt-0">Prioridad <?= $sub['prioridadtxt'] ?></div>
            <p class="m-0 text-dark"><?= $sub['descripcion'] ?></p>
            <?php if (!empty($sub['comentario'])): ?>
                <span class="card-subtext-btn">Nota: <?= $sub['comentario'] ?> </span>
            <?php endif; ?>
        </div>

        <div class="col-2 d-flex flex-column justify-content-end align-items-end p-0" style="min-height: 100%;">
        <a href="" class="card-subtext-btn">Editar</a>
        <a href="" class="card-subtext-btn">Eliminar</a>
            <?php if (!empty($sub['frecordatorio'])): ?>
                <span class="card-subtext"> <i class="bi bi-bell-fill"></i> <?= $sub['frecordatorio'] ?> </span>
            <?php endif; ?>
            <span class="card-subtext">Vence el <?= $sub['fvencimiento'] ?></span>
        </div>
    </div>

    <hr class="mb-1 mt-2">

<?php endforeach; ?>