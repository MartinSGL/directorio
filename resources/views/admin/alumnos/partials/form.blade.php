<div class="row">           
    <div class="form-group col-md-6">
        {!! Form::label('apaterno', 'Apellido paterno') !!}
        {!! Form::text('apaterno', null, ['class'=>'form-control','placeholder'=>'Garcia','autocomplete'=>'off']) !!}
        @error('apaterno')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('amaterno', 'Apellido materno') !!}
        {!! Form::text('amaterno', null, ['class'=>'form-control','placeholder'=>'Robles','autocomplete'=>'off']) !!}
        @error('amaterno')
            <small class="text-danger">{{$message}}</small>
        @enderror         
    </div>
</div>  
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('name', 'Nombre(s)') !!}
        {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Maria Fernanda','autocomplete'=>'off']) !!}
        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('grupo_id', 'Grupo') !!}
        {!! Form::select('grupo_id', $grupos, null, ['class'=>'form-control','placeholder'=>'seleccione un grado y grupo']) !!} 
        @error('grupo_id')
            <small class="text-danger">{{$message}}</small>
        @enderror 
    </div>
</div>  
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('numero', 'Teléfono del alumno') !!}
        {!! Form::number('numero', null, ['class'=>'form-control mt-1','placeholder'=>'3133324457']) !!}
        @error('numero')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('numero_tutor', 'Teléfono del tutor') !!}
        {!! Form::number('numero_tutor', null, ['class'=>'form-control mt-1','placeholder'=>'3133324457']) !!}
        @error('numero_tutor')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>  