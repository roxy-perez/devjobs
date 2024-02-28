<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use App\Notifications\NewCandidate;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ApplyVacancy extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacancy;
    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    public function apply()
    {
        $data = $this->validate();

        //Almacenar CV en el servidor
        $cv = $data['cv']->store('public/cv');
        $data['cv'] = str_replace('public/cv', '', $cv);

        //Crear el candidato de la vacante
        $this->vacancy->candidates()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv'],
        ]);

        //Crear notificación y enviar email
        $this->vacancy->recruiter->notify(new NewCandidate($this->vacancy->id, $this->vacancy->title, auth()->user()->id));


        //Mostrar al usuario un mensaje de OK
        session()->flash('message', __('Your file has been uploaded successfully!'));
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
