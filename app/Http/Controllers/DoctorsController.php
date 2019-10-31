<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Job;

class DoctorsController extends Controller
{
    public function index()
    {
      $doctors = Employee::query()
                 ->join('jobs', 'jobs.id', '=', 'employees.job_id')
                 ->where('jobs.name', 'Лікар')
                 ->orderBy('employees.updated_at', 'DESC')
                 ->paginate(6);

      return view('doctors', [
        'doctors' => $doctors,
      ]);
    }

    public function filter()
    {
      $data = request()->validate([
        'search' => '',
        'category' => '',
      ]);
      if($data['category'] == 'city')
      {
        $data['category'] = 'cities.name';
      }
      else if($data['category'] == 'job')
      {
        $data['category'] = 'jobs.name';
      }
      else if($data['category'] == 'department')
      {
        $data['category'] = 'departments.name';
      }
      else
      {
        $data['category'] = 'employees.'.$data['category'];
      }

      $doctors = Employee::query()
                 ->join('jobs', 'jobs.id', '=', 'employees.job_id')
                 ->join('cities', 'cities.id', '=', 'employees.city_id')
                 ->join('departments', 'departments.id', '=', 'employees.department_id')
                 ->where($data['category'], 'like', '%'.$data['search'].'%')
                 ->orderBy('employees.updated_at', 'DESC')
                 ->paginate(6);

      return view('doctors', [
        'doctors' => $doctors,
      ]);
    }
}
