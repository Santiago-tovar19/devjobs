<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Vacante;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|min:3',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024'
    ];

    use WithFileUploads;

    public function crearVacante(){
        $datos = $this->validate();

        //alamcenar la imagen

        $imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        //crear la vacante

        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id
        ]);

        //crear mensaje //redireccionar al usuario

        session()->flash('mensaje', 'La vacante se creo correctamente');

        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        //consultar base de datos
        //la forma mas sencilla de consultar la base de datos es con un modelo

        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
