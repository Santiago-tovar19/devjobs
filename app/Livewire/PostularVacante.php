<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf|max:1024'
    ];

    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function postularme(){


        //alamcenar cv

        $datos = $this->validate();

        //alamcenar la imagen

        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        //crear el candidato a la vacante

        $this->vacante->candidatos()->create([
            "user_id" => auth()->user()->id,
            "cv" => $datos['cv']
        ]);

        //crear notificacion

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        //mostrar al usuario que se postulo correctamente

        session()->flash('mensaje', 'Te has postulado correctamente a la vacante');

        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
