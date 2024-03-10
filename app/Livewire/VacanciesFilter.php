<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;

class VacanciesFilter extends Component
{
    public $term;
    public $category;
    public $salary;
    
    public function readData()
    {
        $this->dispatch('searchTerms', $this->term, $this->category, $this->salary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        
        return view('livewire.vacancies-filter', compact('salaries', 'categories'));
    }
}
