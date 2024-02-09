<form action="<?= URL ?>album/upload/<?= $album->id ?>" method="POST" enctype="multipart/form-data">
    <div id="subir<?= $album->id ?>" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Subir Archivos</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Archivo</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                        <input type="file" name="archivo[]" multiple="multiple" accept=".png, .jpg, .gif">
                        
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