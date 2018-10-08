<?php

namespace App\Http\Controllers\User;

use App\Subject;
use App\Tutee;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserTuteeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['show']);
    }

    public function index()
    {
        //
    }


    public function create($id)
    {
        //
        $subjects = Subject::all();
        $months = collect(['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']);
        return View::make('user.tutee.create')
            ->with(compact('subjects'))
            ->with(compact('months'))
            ->with(compact('id'));
    }


    public function store(Request $request, $id)
    {
        $data = $request->all();
//        $data['student_id'] = $id;

        $validator = Validator::make($data, [
            'subject_id' => 'required|integer',
            'professor' => 'required|min:3',
            'month' => 'required',
            'schoolYear' => 'required|min:4|max:4'
        ]);

        if($validator->fails()) {
            return redirect(route('users.tutee.create', ['id' => $id]))
                ->withErrors($validator)
                ->withInput();
        }

        Tutee::create([
            'student_id' => $id,
            'subject_id' => $data['subject_id'],
            'professor' => $data['professor'],
            'month' => $data['month'],
            'schoolYear' => $data['schoolYear']
        ]);

        return redirect(route('users.show', ['id' => $id]));
    }


    public function show(User $user, Tutee $tutee)
    {
        //
        $profile = $user->profile()->first();
        $subject = $tutee->subject()->first();
        $sessions = $tutee->sessions()->with('mentor.profile')->get();
        $admin = (Auth::user()->role === User::ADMIN || Auth::user()->role === User::STA || Auth::user()->role === User::SENIOR_MENTOR || Auth::user()->role === User::JUNIOR_MENTOR || Auth::user()->role === User::STREAM ) ? true : false;

        return View::make('user.tutee.show')
            ->with(compact('tutee'))
            ->with(compact('user'))
            ->with(compact('profile'))
            ->with(compact('subject'))
            ->with(compact('sessions'))
            ->with(compact('admin'));
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
