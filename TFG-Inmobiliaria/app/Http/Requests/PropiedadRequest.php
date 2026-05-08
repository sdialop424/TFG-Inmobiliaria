<?php
 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropiedadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
           if ($this->user()->isAdmin()) {
            return true;
        }
        return false;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'direccion' => 'required|string|max:255',
            'usuario_id' => 'required|exists:users,id',
            'tipo_propiedad_id' => 'required|exists:tipos_propiedad,id',
        ];
    }
}