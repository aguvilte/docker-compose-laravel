<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DenunciaCreateRequest extends FormRequest
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
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|numeric|digits:10',
            'dni' => 'required|numeric|digits:8',
            'barrio' => 'string|required|max:150',
            'calle'=> 'string|nullable|max:150',
            'numero' => 'nullable|numeric',
            'fecha_hora' => 'required',
            'patente' => 'required|min:6|max:10',
            'descripcion' => 'required|string|max:250'
        ];
    }
     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es campo obligatorio.',
            'apellido.required' => 'El apellido es campo obligatorio',
            'telefono.required' => 'EL telefono es un campo obligatorio.',
            'telefono.numeric' => 'EL telefono es un campo numérico.',
            'telefono.digits' => 'Ingresá tu n° de línea con el cód. de área sin 0 ni 15.',
            'dni.required' => 'El DNI es un campo obligatorio',
            'dni.numeric' => 'EL DNI es un campo numérico.',
            'dni.digits' => 'Formato invalido, el DNI consta de 8 números sin puntos entre ellos.',
            'barrio.required' => 'El campo barrio es obligatorio, en caso de no contener introducir SIN NOMBRE',
            'barrio.max' => 'El campo barrio no puede tener más de 150 caracteres.',
            'calle.max' => 'El capo calle no puede tener más de 150 caracteres.',
            'numero.numeric' => 'El numero es un campo numérico.',
            'fecha_hora.required' => 'La fecha y hora es un campo obligatorio.',
            'fecha_hora.date_format' => 'El formato que intenta ingresar es incorrecto.',
            'patente.max' => 'El formate de patente ingresado es incorrecto. Por favor respete los espacios.',
            'patente.min' => 'Formato de patente invalido. Por favor ingrese una patente correcta.',
            'descripcion.max' => 'El texto es demasiado largo, por favor debe contener solo 250 caracteres.'
        ];
    }
}
