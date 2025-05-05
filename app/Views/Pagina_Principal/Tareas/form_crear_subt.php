<div class="modal fade" id="Modalsubt" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body d-flex justify-content-center align-items-center p-4">
                <!-- Contenedor -->
                <form class="g-0 card-wrapper w-100" style="max-width: 800px;" id="subtarea-card">
                    <h5 class="w-100 text-center">Crear subtarea</h5>

                    <div class="row">
                        <input type="text" placeholder="Titulo" class="card-input2" name="sub_titulo" />
                    </div>
                    <div class="row form-floating">
                        <textarea class="card-input2" placeholder="Descripcion" style="height: 100px" name="sub_desc"></textarea>
                    </div>
                    <div>
                        <div>Prioridad</div>
                        <input type="radio" class="btn-check" name="sub_priori" id="sb" autocomplete="off" checked>
                        <label class="btn btn-textcheck" for="sb">Baja</label>

                        <input type="radio" class="btn-check" name="sub_priori" id="sm" autocomplete="off">
                        <label class="btn btn-textcheck" for="sm">Media</label>

                        <input type="radio" class="btn-check" name="sub_priori" id="sa" autocomplete="off">
                        <label class="btn btn-textcheck" for="sa">Alta</label>
                    </div>
                    <div class="row p-0 mt-3">
                        <div class="col me-2">
                            <span>Fecha de vencimiento:</span>
                            <input type="date" class="form-control card-input2" name="sub_fvencimiento">
                        </div>
                        <div class="col ms-2">
                            <span>Fecha de recordatorio:</span>
                            <input type="date" class="form-control card-input2" name="sub_frecordatorio">
                        </div>
                    </div>
                    <div class="row form-floating">
                        <textarea class="card-input2" placeholder="Comentarios adicionales" style="height: 50px" name="sub_com"></textarea>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <button type="submit" class="card-button w-100 text-white" style="background-color: #802b1a;">
                            Añadir subtarea
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
