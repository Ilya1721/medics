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
}
