<form action="<?= URL ?>clientes/importCSV" method="POST" enctype="multipart/form-data">
    <div id="importar" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Subir Archivos</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Archivo</label>
                        <input type="file" name="archivos" accept=".csv">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="subirArchivo">Subir</button>
                </div>
            </div>
        </div>
    </div>
</form>