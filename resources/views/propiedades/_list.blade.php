@if(!$propiedades->isEmpty())

    <ul>
        @foreach($propiedades as $propiedad)
            <li>
                {{ $propiedad->direccion}} -
                {{ $propiedad->tipoPropiedad->nombre}} 
                {{ $propiedad->usuario->nombre}}
                @if(isset($info['mostrarBotones']) && $info['mostrarBotones'])
                <a href="{{ route('propiedades.show', $propiedad) }}">Ver</a> -
                <a href="{{ route('propiedades.edit', $propiedad) }}">Editar</a> -
                <form action="{{ route('propiedades.destroy', $propiedad) }}" method="POST" class="form-eliminar" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar</button>
                </form>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No hay propiedades</p>
@endif