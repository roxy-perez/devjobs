<?php

namespace App\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacancy;
use Carbon\Carbon;

class EditVacancy extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required|string',
        'last_day' => 'required|date',
        'description' => 'required|string',
    ];


    public function mount(Vacancy $vacancy)
    {
        $this->title = $vacancy->title;
        $this->salary = $vacancy->salary_id;
        $this->category = $vacancy->category_id;
        $this->company = $vacancy->company;
        $this->last_day = Carbon::parse($vacancy->last_day)->format('Y-m-d');
        $this->description = $vacancy->description;
        $this->image = $vacancy->image;
    }

    public function updateVacancy(Vacancy $vacancy)
    {
        $data = $this->validate();

        //Almacenar imagen
        if ($this->image) {
            $image = $this->image->store('public/vacancies');
            $data['image'] = str_replace('public/vacancies', '', $image);
        }

        //Actualizar vacante
        $vacancy->update($data);

        //Crear mensaje de sesion en distintos idiomas
        session()->flash('message', __('actions.vacancy_updated'));

        //Redireccionar a la pagina de vacantes
        return redirect()->route('vacancy.index');
    }
    public function render()
    {
        //Query the database
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacancy')->with([
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
