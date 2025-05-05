<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
            <div class="modal-body d-flex justify-content-center align-items-center p-4">
                <div class="row g-0 card-wrapper w-100" style="max-width: 800px;">

                    <!-- llamado a login -->
                    <?php echo view('Login_Registro/form_login') ?>

                    <hr class="d-block d-md-none dark-hr">

                    <!-- llamado a registro -->
                    <?php echo view('Login_Registro/form_registro') ?>

                </div>
            </div>
            </div>
        </div>
</div>
    
<script>
    window.addEventListener('DOMContentLoaded', function () {
        <?php 
        if (session('errors.email')||session('errors.pass')) { ?>
            var modal = new bootstrap.Modal(document.getElementById('authModal'));
            modal.show();
        <?php }
        if (session('errors.nombre')||session('errors.emailr')||session('errors.pass1')||session('errors.pass2')) { ?>
            var modal = new bootstrap.Modal(document.getElementById('authModal'));
            modal.show();
        <?php } ?>
    });
</script>