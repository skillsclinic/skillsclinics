<?php

namespace App\Http\Controllers\User;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only('index');
        $this->middleware('login')->only('create');
    }


    public function index()
    {
        //


        $users = User::all();
        $authenticatedUser = Auth::user();

        return View::make('user.index')
            ->with(compact('users'))
            ->with(compact('authenticatedUser'));
    }


    public function create()
    {
        //
        $female = Profile::FEMALE;
        $male = Profile::MALE;

        return View::make('user.create')
            ->with(compact('female'))
            ->with(compact('male'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'lastName' => 'required',
            'firstName' => 'required',
            'middleInitial' => 'required',
            'birthday' => 'required',
            'contact' => 'required|min:11',
            'email' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('users.create'))
                ->withErrors($validator)
                ->withInput();
        }


        Profile::create([
            'user_id' => Auth::User()->id,
            'lastName' => strtolower($data['lastName']),
            'firstName' => strtolower($data['firstName']),
            'middleInitial' => strtolower($data['middleInitial']),
            'birthday' => $data['birthday'],
            'gender' => $data['gender'],
            'contact' => $data['contact'],
            'email' => $data['email'],
        ]);

        $user = User::findOrFail(Auth::id());
        $user->status = User::OLD;
        $user->save();

        return redirect(route('home'));
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('view', $user);
        $admin = false;
        if (Auth::user()->role === User::ADMIN || Auth::user()->role === User::SENIOR_MENTOR || Auth::user()->role === User::STA) {
            $admin = true;
        }
        $mentor = ($user->role === User::STA || $user->role === User::ADMIN || $user->role === User::SENIOR_MENTOR || $user->role === User::JUNIOR_MENTOR || $user->role === User::STREAM) ? true : false;
        $student = $user->role === User::STUDENT ? true : false;

        $sessions = $user->sessions()->get();
        $remarks = $sessions->avg('remarks');
        $remarks = round($remarks, 2);


        $tutees = $user->tutees()->with('subject', 'sessions')->get();
        $sessionCount = $tutees->pluck('sessions')->collapse();
        $sessionCount = count($sessionCount);
        $tuteeCount = count($tutees);
//        $students = $student->role === User::STUDENT ? true:false;
//        $sta = $student->role === User::STA ? true:false;
//        $admin = $student->role === User::ADMIN ? true:false;
//        $seniorMentor = $student->role === User::SENIOR_MENTOR ? true:false;
//        $juniorMentor = $student->role === User::JUNIOR_MENTOR ? true:false;


        $profile = Profile::where('user_id', '=', $id)->first();

        return View::make('user.show')
            ->with(compact('tutees'))
            ->with(compact('user'))
            ->with(compact('id'))
            ->with(compact('admin'))
            ->with(compact('tuteeCount'))
            ->with(compact('sessionCount'))
            ->with(compact('profile'))
            ->with(compact('student'))
            ->with(compact('mentor'))
            ->with(compact('remarks'));
    }


    public function edit(User $user)
    {
        $female = Profile::FEMALE;
        $male = Profile::MALE;
        $admin = Auth::user()->role === User::ADMIN ? true : false;
        $roles = collect([User::ADMIN, User::STA, User::SENIOR_MENTOR, User::JUNIOR_MENTOR, User::STREAM, User::STUDENT]);


        $user = $user->where('id', '=', $user->id)->with('profile')->first();

        return View::make('user.edit')
            ->with(compact('female'))
            ->with(compact('male'))
            ->with(compact('user'))
            ->with(compact('admin'))
            ->with(compact('roles'));
    }


    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $user = $user->where('id', '=', $user->id)->with('profile')->first();

        if (isset($data['role'])) {
            $user->role = $data['role'];
            $user->save();
        }


        $validator = Validator::make($data, [
            'lastName' => 'required',
            'firstName' => 'required',
            'middleInitial' => 'required',
            'birthday' => 'required',
            'contact' => 'required|min:11',
            'email' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('users.edit', ['user_id' => $user->id]))
                ->withErrors($validator)
                ->withInput();
        }

        $user->profile->lastName = $data['lastName'];
        $user->profile->firstName = $data['firstName'];
        $user->profile->middleInitial = $data['middleInitial'];
        $user->profile->birthday = $data['birthday'];
        $user->profile->contact = $data['contact'];
        $user->profile->email = $data['email'];
        $user->profile->gender = $data['gender'];
        $user->profile->save();


        return redirect(route('users.show', ['user_id' => $user->id]));
    }

    public function changePassword(User $user)
    {


        return View::make('user.changepassword');
    }

    public function updatePassword(Request $request, User $user)
    {

    }


    public function destroy($id)
    {
        //
    }
}
