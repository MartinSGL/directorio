<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'apaterno' =>'required',
            'amaterno' => 'required',
            'name' => 'required',
            'grupo_id' => 'required',
            'numero' => 'required|size:10',
            'numero_tutor' => 'required|size:10',
        ];
    }

    public function messages()
    {
        return[
            'apaterno.required'=> 'El campo Apellido paterno es requerido',
            'amaterno.required'=> 'El campo Apellido materno es requerido',
            'name.required'=> 'El campo Nombre(s) es requerido',
            'grupo_id.required'=> 'El Grupo es requerido',
            'numero.required'=> 'El campo Teléfono del alumno es requerido',
            'numero_tutor.required'=> 'El campo Teléfono del tutor es requerido',
            'numero.size'=> 'El campo Teléfono del alumno debe tener 10 numeros',
            'numero_tutor.size'=> 'El campo Teléfono del tutor debe tener 10 numeros',
        ];
    } 
}
