<div>
<div class="bg-white shadow-sm overflow-hidden  sm:rounded-lg">
    @forelse ($vacantes as $vacante)


        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{route('vacantes.show',$vacante->id)}}" class="text-xl font-bold">
                            {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Último día: {{$vacante->ultimo_dia->format("d/m/Y")}} </p>
                </div>
                <div class="flex flex-col md:flex-row gap-3 items-strech mt-5 md:mt-0">
                    <a
                    href="{{route('candidatos.index',$vacante)}}"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                    >{{$vacante->candidatos->count()}} Candidatos</a>
                    <a href="{{route('vacantes.edit',$vacante->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                    <form action="{{route('vacantes.destroy',$vacante)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input
                    type="submit"
                    value="Eliminar"
                    class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center cursor-pointer">

                </div>
        </div>

    @empty
        <p>No hay vacantes para mostrar</p>
    @endforelse



</div>
@if ($vacantes->count() > 0)
    <div class="mt-8">
    {{ $vacantes->links() }}

</div>
@endif
</div>

{{-- @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', (vacante,vacanteId) => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'La vacante se eliminará por completo.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirige a la ruta de eliminación
                    window.location.href = "{{ route('vacantes/', ['id' => '']) }}/" + vacanteId;

                    Swal.fire(
                        'La vacante ha sido eliminada',
                        'La vacante ha sido eliminada correctamente.',
                        'success'
                    );
                }
            });
        });
    </script>
@endpush --}}


