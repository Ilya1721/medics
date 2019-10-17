<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\City;
use App\Job;
use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city_id' => ['required'],
            'department_id' => ['required'],
            'job_id' => ['required'],
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house' => ['required', 'string', 'max:255'],
            'flat' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $employee = Employee::create([
          'city_id' => $data['city_id'],
          'department_id' => $data['department_id'],
          'job_id' => $data['job_id'],
          'last_name' => $data['last_name'],
          'first_name' => $data['first_name'],
          'father_name' => $data['father_name'],
          'street' => $data['street'],
          'house' => $data['house'],
          'flat' => $data['flat'],
          'phone_number' => $data['phone_number'],
        ]);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'employee_id' => $employee->id,
        ]);
    }

    public function showRegistrationForm()
    {
      $cities = City::all();
      $jobs = Job::all();
      $departments = Department::all();

      return view('/auth/register', [
        'departments' => $departments,
        'jobs' => $jobs,
        'cities' => $cities,
      ]);
    }
}
