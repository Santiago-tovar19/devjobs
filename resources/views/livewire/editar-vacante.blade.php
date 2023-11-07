<form class="md:w-1/2 space-y-5" wire:submit.prevent="editarVacante">
        <div>
            <x-input-label for="titulo" :value="__('Titulo Vacante')" />
            <x-text-input
            id="titulo"
            class="block mt-1 w-full"
            type="text"
            wire:model="titulo"
            :value="old('titulo')"
            placeholder="Titulo de la vacante"
               />
            @error('titulo')
                <span class="text-red-500">
                    <livewire:mostrar-alerta :message="$message"/>
                </span>
            @enderror
        </div>

        <div>
            <x-input-label for="salario" :value="__('Salario Mensual')" />
            <select
            id="salario"
            wire:model="salario"
            class="rounded-sm shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full">
            <option y>Seleccione</option>
            @foreach ($salarios as $salario )
                <option value="{{$salario->id}}">{{$salario->salario}}</option>

            @endforeach
            </select>
            @error('salario')
                <span class="text-red-500">
                    <livewire:mostrar-alerta :message="$message"/>
                </span>
            @enderror
        </div>
        <div>
            <x-input-label for="categoria" :value="__('Categoría')" />
            <select
            id="categoria"
            wire:model="categoria"
            class="rounded-sm shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full">

            <option >Seleccione</option>
            @foreach ($categorias as $categoria )
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach
            </select>
            @error('categoria')
                <span class="text-red-500">
                    <livewire:mostrar-alerta :message="$message"/>
                </span>
            @enderror
        </div>
         <div>
            <x-input-label for="empresa" :value="__('Empresa')" />
            <x-text-input
            id="empresa"
            class="block mt-1 w-full"
             type="text"
             wire:model="empresa"
             :value="old('empresa')"
            placeholder="Empresa"
               />
            @error('empresa')
                <span class="text-red-500">
                    <livewire:mostrar-alerta :message="$message"/>
                </span>
            @enderror
        </div>
        {{-- //ahora ultimo dia para postulrse --}}
        <div>
            <x-input-label for="ultimo_dia" :value="__('Fecha de cierre')" />
            <x-text-input
            id="ultimo_dia"
            class="block mt-1 w-full"
             type="date"
             wire:model="ultimo_dia"
             :value="old('ultimo_dia')"

               />
        @error('ultimo_dia')
                <span class="text-red-500">
                    <livewire:mostrar-alerta :message="$message"/>
                </span>
            @enderror
        </div>
        {{-- //descripcion del puesto --}}
        <div>
            <x-input-label for="ultimo_dia" :value="__('Descricpcion del puesto')" />
           <textarea wire:model="descripcion" placeholder="Descripcion general del puesto" class="rounded-sm shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full h-52"></textarea>
           @error('descripcion')
                <span class="text-red-500">
                    <livewire:mostrar-alerta :message="$message"/>
                </span>
            @enderror
        </div>
        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input
            id="imagen"
            class="block mt-1 w-full"
             type="file"
             wire:model="imagen_nueva"
             accept="image/*"

               />

               <div class="my-5 w-88">
                <x-input-label  :value="__('Imagen actual')" />
                    <img src="{{asset('storage/vacantes/' . $imagen)}}" alt="{{"Imagen vacante " . $titulo}}">
               </div>

            <div class="mt-5 w-80">
                @if ($imagen_nueva)
                    <x-input-label  :value="__('Imagen nueva')" />
                    <img src="{{$imagen_nueva->temporaryUrl()}}" alt="imagen_nueva">
                @endif
            </div>
            @error('imagen_nueva')
                <span class="text-red-500">
                    <livewire:mostrar-alerta :message="$message"/>
                </span>
            @enderror
        </div>

        <x-primary-button  type=submit class="mt-8">
            Guardar cambios
        </x-primary-button>

</form>
