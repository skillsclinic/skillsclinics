<?php

namespace App\Http\Controllers\User;

use App\Subject;
use App\Tutee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserTuteeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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


    public function show($id)
    {
        //
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
