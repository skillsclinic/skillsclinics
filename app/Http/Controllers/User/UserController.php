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
        $student = Auth::user();
        $this->authorize('view', $user);
        $admin = false;
        if(Auth::user()->role === User::ADMIN || Auth::user()->role === User::SENIOR_MENTOR || Auth::user()->role === User::STA){
            $admin = true;
        }


        $tutees = $user->tutees()->with('subject','sessions')->get();
        $sessionCount = $tutees->pluck('sessions')->collapse();
        $sessionCount = count($sessionCount);
        $tuteeCount = count($tutees);
//        $students = $student->role === User::STUDENT ? true:false;
//        $sta = $student->role === User::STA ? true:false;
//        $admin = $student->role === User::ADMIN ? true:false;
//        $seniorMentor = $student->role === User::SENIOR_MENTOR ? true:false;
//        $juniorMentor = $student->role === User::JUNIOR_MENTOR ? true:false;


        //$profile = Profile::where('user_id', '=', $id)->first();

        return View::make('user.show')
            ->with(compact('tutees'))
            ->with(compact('user'))
            ->with(compact('id'))
            ->with(compact('admin'))
            ->with(compact('tuteeCount'))
            ->with(compact('sessionCount'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
