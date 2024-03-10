<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacancy;

class VacancyHome extends Component
{
    public $category;
    public $salary;
    public $term;

    // Escuchar evento searchTerms
    protected $listeners = ['searchTerms' => 'search'];

    public function search($term, $category, $salary)
    {
        $this->term = $term;
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {
        $vacancies = Vacancy::when($this->term, function ($query) {
            $query->where('title', 'like', '%' . $this->term . '%');
        })->when($this->term, function ($query) {
            $query->orWhere('company', 'like', '%' . $this->term . '%');
        })->when($this->category, function ($query) {
            $query->where('category_id', $this->category);
        })->when($this->salary, function ($query) {
            $query->where('salary_id', $this->salary);
        })->paginate(10);

        return view('livewire.vacancy-home', compact('vacancies'));
    }
}
