<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacancy;

class VacancyHome extends Component
{
    public function render()
    {
        $vacancies = Vacancy::all();
        return view('livewire.vacancy-home', compact('vacancies'));
    }
}
