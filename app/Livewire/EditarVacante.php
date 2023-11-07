<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $descripcion;
    public $empresa;
    public $ultimo_dia;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

     protected $rules = [
        'titulo' => 'required|min:3',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024'

    ];


    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->descripcion = $vacante->descripcion;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format(('Y-m-d'));
        $this->imagen = $vacante->imagen;

    }

    public function editarVacante(){

        $datos = $this->validate();

        //si  hay nueva imagen

        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        //encontrar la vacante a editar

        $vacante = Vacante::find($this->vacante_id);

        //asiganar los valores

        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;


        //guardar la vacante

        $vacante->save();

        //redireccionar

        session()->flash('mensaje', 'La vacante se actualizo correctamente');

        return redirect()->route('vacantes.index');

    }
    public function render()
    {

        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
