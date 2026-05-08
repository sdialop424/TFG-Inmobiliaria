<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Propiedad;

class StoreIncidenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $propiedad = Propiedad::find($this->request->get('propiedad_id'));
        $user = Auth::user();
        
        if ($user->isAdmin() || ($propiedad && $propiedad->usuario_id == $user->id))  {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'propiedad_id' => 'required|exists:propiedades,id',            
            'descripcion' => 'required|string',
            'tipo_incidencia_id' => 'required|exists:tipos_incidencia,id',
            'estado_incidencia_id' => 'required|exists:estados_incidencia,id',
            'fecha_reporte' => 'required|date',
        ];
    }
}
