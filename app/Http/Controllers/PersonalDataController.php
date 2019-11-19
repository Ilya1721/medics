<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Clinic;
use App\User;
use App\City;
use App\Job;
use App\Department;
use App\Employee;
use App\Country;

class PersonalDataController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('personalData', [
      'user' => Auth::user(),
    ]);
  }

  public function edit()
  {
    $clinics = Clinic::all();

    return view('editPersonalData', [
      'user' => Auth::user(),
      'clinics' => $clinics,
    ]);
  }

  public function update()
  {
    $data = request()->validate([
        'name' => ['required', 'string', 'max:255'],
        'city' => ['required'],
        'country' => ['required'],
        'department' => ['required'],
        'clinic_id' => ['required'],
        'job' => ['required'],
        'about' => ['string'],
        'last_name' => ['required', 'string', 'max:255'],
        'first_name' => ['required', 'string', 'max:255'],
        'father_name' => ['required', 'string', 'max:255'],
        'street' => ['required', 'string', 'max:255'],
        'house' => ['required', 'string', 'max:255'],
        'flat' => ['required', 'string', 'max:255'],
        'phone_number' => ['required', 'string', 'max:255'],
        'image' => ['image'],
    ]);

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

    $user = Auth::user();

    if(request(['image']) != null)
    {
      $imagePath = $data['image']->store('uploads', 'public');
      $image = Image::make(public_path("storage/{$imagePath}"))->fit(125, 150);
      $image->save();
    }
    else
    {
      $imagePath = $user->employee->image;
    }

    $user->update([
      'name' => $data['name'],
    ]);

    $user->employee->update([
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

    return redirect()->route('personalData.show', [
      'user' => $user,
    ]);
  }
}
