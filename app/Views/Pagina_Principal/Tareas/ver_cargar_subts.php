<?php foreach ($subtareas as $sub) : ?>

    <div class="row align-items-start">
        <div class="col-10 d-flex align-items-center">
            <input class="form-check-input custom-checkbox me-2" type="checkbox" id="subtask1">
            <span class="subtask-title me-2 pt-2"> <?= $sub['tema'] ?> </span>
            <!-- <span class="card-subtext pt-2">- asignada a Milo</span> -->
        </div>
        <div class="col-2 d-flex flex-column align-items-end">
            <a href="" class="card-subtext-btn">Editar</a>
            <a href="" class="card-subtext-btn">Eliminar</a>
        </div>
    </div>
    <div class="row w-100 mt-2">
        <div class="col-10">
            <div class="card-subtext mt-0">Prioridad <?= $sub['prioridadtxt'] ?></div>
            <p class="my-0 text-dark"><?= $sub['descripcion'] ?></p>
            <?php if (!empty($sub['comentario'])): ?>
                <span class="card-subtext">Comentario: <?= $sub['comentario'] ?> </span>
            <?php endif; ?>
        </div>

        <div class="col-2 d-flex flex-column justify-content-end align-items-end p-0" style="min-height: 100%;">
            <?php if (!empty($sub['frecordatorio'])): ?>
                <span class="card-subtext"> <i class="bi bi-bell-fill"></i> <?= $sub['frecordatorio'] ?> </span>
            <?php endif; ?>
            <span class="card-subtext">Vence el <?= $sub['fvencimiento'] ?></span>
        </div>
    </div>

    <hr class="mb-1 mt-2">

<?php endforeach; ?>