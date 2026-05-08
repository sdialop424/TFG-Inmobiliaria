@if(!$incidencias->isEmpty())

    <ul>
        @foreach($incidencias as $incidencia)
            <li>
                {{ $incidencia->propiedad->direccion}} -
                {{ $incidencia->descripcion}} -
                {{ $incidencia->tipoIncidencia->nombre}} -
                {{ $incidencia->estadoIncidencia->nombre }} -
                @if(isset($info['mostrarBotones']) && $info['mostrarBotones'])
                <a href="{{ route('incidencias.show', $incidencia) }}">Ver</a> -
                <a href="{{ route('incidencias.edit', $incidencia) }}">Editar</a> -
                <form action="{{ route('incidencias.destroy', $incidencia) }}" method="POST" class="form-eliminar" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar</button>
                </form>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No hay incidencias</p>
@endif