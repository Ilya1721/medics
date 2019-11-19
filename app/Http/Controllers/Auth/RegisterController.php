<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\City;
use App\Job;
use App\Department;
use App\Employee;
use App\Country;
use App\Clinic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;

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
    protected $redirectTo = '/welcome';

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
            'city' => ['required'],
            'country' => ['required'],
            'department' => ['required'],
            'clinic_id' => ['required'],
            'job' => ['required'],
            'last_name' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string'],
            'first_name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house' => ['required', 'string', 'max:255'],
            'flat' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'image' => ['image'],
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
        $country = Country::updateOrCreate(
          ['name' => $data['country'] ],
          ['name' => $data['country'] ]
        );
        $cityData = [];
        $cityData['name'] = $data['city'];
        $cityData['country_id'] = $country->id;
        $city = City::updateOrCreate(
          ['name' => $cityData['name'] ],
          ['name' => $cityData['name'],
           'country_id' => $country->id],
        );
        $job = Job::updateOrCreate(
          ['name' => $data['job'] ],
          ['name' => $data['job'] ],
        );
        $clinic_id = $data['clinic_id'];
        $departmentData = [];
        $departmentData['name'] = $data['department'];
        $departmentData['clinic_id'] = $clinic_id;
        $department = Department::updateOrCreate(
          ['name' => $departmentData['name'],
           'clinic_id' => $departmentData['clinic_id']],
          ['name' => $departmentData['name'],
           'clinic_id' => $departmentData['clinic_id']],
        );
        $imagePath = $data['image']->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(125, 150);
        $image->save();

        $employee = Employee::create([
          'city_id' => $city->id,
          'department_id' => $department->id,
          'job_id' => $job->id,
          'about' => $data['about'],
          'last_name' => $data['last_name'],
          'first_name' => $data['first_name'],
          'father_name' => $data['father_name'],
          'street' => $data['street'],
          'house' => $data['house'],
          'flat' => $data['flat'],
          'phone_number' => $data['phone_number'],
          'image' => $imagePath,
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
      $clinics = Clinic::all();

      return view('/auth/register', [
        'clinics' => $clinics,
      ]);
    }
}
