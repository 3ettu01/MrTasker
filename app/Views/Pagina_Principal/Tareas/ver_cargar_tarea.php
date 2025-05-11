<?php
    $sesion = session();
?>
<div class="row align-items-start">
    <div class="col-10 d-flex align-items-center">
        
        <?php if ($tarea['prioridad']=='a'): ?>
            <h4 class="me-1"><i class="bi bi-chevron-right"></i> <b> <?= $tarea['tema'] ?> </b> <i class="bi bi-exclamation-diamond"></i> </h4>
        <?php else: ?>
            <h4 class="me-1"><i class="bi bi-chevron-right"></i> <?= $tarea['tema'] ?> </h4>
        <?php endif; ?>

        <span class="card-subtext-btn"> - <?= $tarea['estadotxt'] ?> </span>

        <?php if ($tarea['archivo']=='1'): ?>
            <span class="card-subtext-btn">, Y ARCHIVADA </span>
        <?php endif; ?>

        <!-- <span class="card-subtext ms-1">- asignada a Tofi</span> -->
    </div>
    <div class="col-2 d-flex flex-column align-items-end">
        <?php if ($tarea['estado']==='c' && $tarea['archivo']=='0'): ?>
            <a href="<?= base_url('tareas/archivar/' . $tarea['id']) ?>"
            onclick="return confirm('¿Estás seguro de que quieres archivar esta tarea?')" 
            class="card-subtext-btn">ARCHIVAR</a>
        <?php endif; ?>
        <a href="<?= base_url('tareas/editar/' . $tarea['id']) ?>" class="card-subtext-btn">Editar</a>
        <?php if($tarea['iddueño'] == $sesion->get('userid')): ?> <!-- solo figura la opcion eliminar al dueño -->
            <a href="<?= base_url('/tareas/eliminar/' . $tarea['id']) ?>" 
            onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')"
            class="card-subtext-btn">Eliminar</a>
        <?php endif; ?>
        
    </div>
</div>
<div class="card-subtext mt-0">prioridad <?= $tarea['prioridadtxt'] ?> </div>
<p class="mt-1 mb-1 text-dark">
    <?= $tarea['descripcion'] ?>
</p>
<div class="d-flex justify-content-between">
    <?php if (!empty($tarea['frecordatorio'])): ?>
        <span class="card-subtext"><i class="bi bi-bell-fill"></i> <?= $tarea['frecordatorio'] ?> </span>
    <?php else: ?>
        <span> </span>
    <?php endif; ?>

    <span class="card-subtext">Vence el <?= $tarea['fvencimiento'] ?> </span>
</div>