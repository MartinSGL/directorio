<div wire:ignore.self class="modal fade" id="modal_agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar discapacidad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
              <div class="card">
                  <div class="card-body">  
                      <div class="form-group">
                        <label for="name">Nombre</label>
                        <input wire:model.defer='name' name="name" type="text" class="form-control" autocomplete="off">
                          @error('name')
                              <small class="text-danger">
                                *{{$message}}
                              </small>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="body">Descripción</label>
                          <textarea wire:model.defer='body' name="body" rows="4" class="form-control"></textarea>
                          @error('body')
                            <small class="text-danger">
                              *{{$message}}
                            </small>
                          @enderror 
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button wire:click="store()" class="btn btn-success btn-small">Guardar</button>               
          </div>
      </div>
    </div>
  </div>