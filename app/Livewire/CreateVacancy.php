<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacancy;
use Livewire\WithFileUploads;

class CreateVacancy extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    use WithFileUploads;

    public function createVacancy()
    {
        $data = $this->validate();

        //Almacenar imagen
        $image = $this->image->store('public/vacancies');
        $data['image'] = str_replace('public/vacancies', '', $image);

        //Crear vacante
        Vacancy::create([
            'title' => $data['title'],
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company' => $data['company'],
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $data['image'],
            'user_id' => auth()->user()->id,
        ]);

        //Crear mensaje de sesion en distintos idiomas
        session()->flash('message', __('actions.vacancy_published'));

        //Redireccionar a la pagina de vacantes
        return redirect()->route('vacancy.index');
    }

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required|string',
        'last_day' => 'required|date',
        'description' => 'required|string',
        'image' => 'required|image|max:1024',
    ];

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
