@props(['name','usaerId'])
<div wire:ignore.self class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar discapacidad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">  
                    <h5>¿ Esta seguro de eliminar <strong>{{$name}} ?</strong></h5>
                </div>
            </div>
        </div>
        <div class="modal-footer">
           <button wire:click="destroy({{$usaerId}})" class="btn btn-danger btn-sm">Eliminar</button>
        </div>
    </div>
  </div>
</div>