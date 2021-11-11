<?php

namespace App\Http\Livewire\Backend\Dashboard;

use App\Models\EmployeesReport;
use App\Models\Postions;
use App\Models\User;
use Livewire\Component;

class Statistics extends Component
{
    public $allEmps = 0;
    public $alljobs = 0;
    public $allReports = 0;
    public $allFemale = 0;


    public function render()
    {

        $this->allEmps =  User::count();
        $this->alljobs =  Postions::count();
        $this->allReports =  EmployeesReport::count();
        $this->allFemale =  User::whereGender(0)->count();


        return view('livewire.backend.dashboard.statistics');
    }
}
