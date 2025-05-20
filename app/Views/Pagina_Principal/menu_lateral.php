<?php
    $sesion = session();
?>

<div class="col-3" id="menu"> <!-- MENU LATERAL -->
    <div id="logo" class="d-flex align-items-center justify-content-center p-4"> <!-- LOGO -->
        <img src="<?= base_url('public/recursos/img/iconsuser/cat'.$sesion->get('usericon').'.png') ?>" alt="" width="50" class="me-3">
        <img src="<?= base_url('public/recursos/img/mrtasker.png') ?>" alt="Organizador de tareas" width="150">
    </div>

    <div class="menu-content">
        <a href="<?= base_url('/Crear') ?>" class="menu-link principal-btn">
            <i class="bi bi-plus-circle me-2"></i> Crear tarea
        </a>

        <hr>

        <nav class="nav flex-column">
            <a href="<?= base_url('/') ?>" class="menu-link">
            <i class="bi bi-stickies-fill me-2"></i> Mis Tareas
            </a>
            <a href="<?= base_url('/Perfil') ?>" class="menu-link">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACj0lEQVR4nO2ZO2tUQRiGn4g2WojGC+Jqodiof8BSRRDBKKiVdl5+gBjBUjvFQm2sNlVKFRtJ8A7exeA9xHUtvEchVmaTiDoy8AbWcMbz7dmzmxHOCy9kJ/N983w7c86ZMwuFChUqFKNmAd3AIDAOvAFOAqVA/4XAHvXpByrAV6Amf1Fbv/rsVkySSupTVexL4JCYTPIdLwMuwRPAaWAuMBs4ADwAfgX6/8s+5j6wX7l8zjMaI6m/Z5ppKaDbMPgwMJIBOuQR5Uzr52ciVYM5guXtF5YCQlMYgycsBbjInar/voBaBJAu4FFLAe8jAHUBv7UU8CQCUBfwgKWACxGAuoDPWQo4EgGoC/iwpYCNEYC6gNdbClgVAagL2LOlalcEoC7gnZYCTkQA6gI+bingagMJy8AiudyGuCuWAp4bk/UlxPa1MM4BzywFfDAm25DxDpY1zmmXkKpRY7LOhNgFLYxzwHdLAeMRFzBmKcDyauc07VmWQtY4B3zO+yLuqIvr0KlDq+Kc9SLuNSbz7gEWyz1tiOtNg5/T4H055NdAFzBP7lJbs3nLYvxLM4Dt2qrm9Ta2OuHLWZNT7ppYt4mde3X//A3c0SlaM4N42Kla22TOIeCuGCfbPCs3BXyw7uhwa5ODVTWrfvnM19/VJnNuFltJrJ75Ruha6GhwT9RqXyKDVgA/I4D/ASxvFN5P/bUI4J18S09rk5YCrxQ4rBPoj9MA/Q7YV7czGBJbqgYU8BhYprYlwMU2wp/XuwJaPpNHPY8sBfgr+6HuHlO1RWf6rQK/DWxKGLdTTNfJSeuAs8CnHKArwLHAw68t8g+tvcAp3e6eat1+068wY/pc0RLwB2dHgR3AyumCLlSoUCFy0R8ElsWSdoqZ6wAAAABJRU5ErkJggg==" alt="" width="20" class="me-2"> Perfil
            </a>
            <a href="<?= base_url('/Archivo') ?>" class="menu-link">
                <i class="bi bi-archive-fill me-2"></i> Archivo
            </a>
            <a href="<?= base_url('/Colaboraciones/d') ?>" class="menu-link">
                <img src="<?= base_url('public/recursos/img/coop.png') ?>" class="me-2" width="20"> Colaboraciones
            </a>
        </nav>
    </div>
    <div class="menu-footer">
        <a href="<?= base_url('/Cerrar'); ?>" class="menu-link logout-link">
            <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
        </a>
    </div>
    
</div> <!-- FIN MENU LATERAL -->
<div class="col-3"></div>