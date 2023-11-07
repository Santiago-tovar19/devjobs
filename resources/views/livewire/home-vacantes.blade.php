<div>
    <livewire:filtrar-vacantes/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-6">
                Nuestras Vacantes Disponibles</h3>
                <div class="bg-white shadow-sm rounded-sm p-6 divide-y divide-gray-200">
                    @forelse ($vacantes as $vacante)
                        <div class="md:flex md:justify-between md:items-center py-5">
                            <div class="md:flex-1">
                                <a href="{{route('vacantes.show',$vacante->id)}}" class="text-3xl font-extrabold text-gray-600 ">
                                    {{$vacante->titulo}}
                                </a>
                                <p class="text-sm text-gray-600 mb-1 font-bold mt-2">Empresa: {{$vacante->empresa}}</p>
                                <p class="text-sm text-gray-600 mb-1 font-bold">{{$vacante->categoria->categoria}}</p>
                                <p class="font-bold text-sm text-gray-600 mb-1">Ultimo dia para postularse:
                                    <span class="font-bold">{{$vacante->ultimo_dia->format('d/m/Y')}}</span>
                                </p>
                                <p class="text-sm text-gray-600 mb-1">Publicado: <span class="font-normal">{{$vacante->created_at->diffForHumans()}}</span></p>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a class="bg-indigo-500 p-4 text-sm uppercase font-bold rounded-lg text-white block text-center" href="{{route('vacantes.show',$vacante->id)}}">Ver vacante</a>
                            </div>
                        </div>
                    @empty
                        <p class="p-3 text-center text-sm text-gray-600">No hay Vacantes que mostrar</p>
                    @endforelse
                </div>
        </div>
    </div>
</div>
