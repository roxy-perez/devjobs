<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class EditVacancy extends Component
{
    use WithFileUploads;
    
    public $vacancy_id;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $new_image;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required|string',
        'last_day' => 'required|date',
        'description' => 'required|string',
        'new_image' => 'nullable|image|max:1024',
    ];


    public function mount(Vacancy $vacancy)
    {
        $this->vacancy_id = $vacancy->id;
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

        // Si se sube una nueva imagen
        if ($this->new_image) {
            // Guardar nueva imagen
            $image = $this->new_image->store('public/vacancies');
            $data['image'] = str_replace('public/vacancies/', '', $image);
        } else {
            $data['image'] = $this->image;
        }

        //Encontrar vacante
        $vacancy = Vacancy::find($this->vacancy_id);

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
