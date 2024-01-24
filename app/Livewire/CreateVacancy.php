<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;

class CreateVacancy extends Component
{
    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacancy', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
