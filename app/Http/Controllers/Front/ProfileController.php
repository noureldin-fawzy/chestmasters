<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $solutions = $user->solutions()
                          ->latest()
                          ->whereHas('quiz', function ($query) {
                              return $query->available();
                          })->get();

        $data = [
          'user' => $user,
          'solutions' => $solutions
        ];

        return view('front.profile.show', $data);
    }

    public function edit()
    {
        $user = Auth::user();
        $data = [
          'user' => $user
        ];
        return view('front.profile.edit', $data);
    }

    protected function update(Request $request)
    {
      $user = Auth::user();

      $this->validate($request, [
          'name' => 'required|string|max:255',
          'lastName' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
          'phoneNumber' => 'string|max:255',
          'societyMembershipId' => 'string|max:255',
      ]);


      if($request->password != '')
      {
        $this->validate($request, [
          'password' => 'sometimes|string|min:8|confirmed',
        ]);

        $user->password = Hash::make($request->password);
      }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->last_name = $request->lastName;
        $user->phone_number = $request->phoneNumber;
        $user->country = $request->country;
        $user->specialty = $request->specialty;
        $user->graduation_year = $request->graduationYear;
        $user->education_degree = $request->educationDegree;
        $user->society_membership = $request->societyMembershipId;

        $user->save();
        return redirect()->route('front.user.profile.show');
    }
}
