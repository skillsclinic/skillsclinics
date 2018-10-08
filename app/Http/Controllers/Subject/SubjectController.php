<?php

namespace App\Http\Controllers\Subject;

use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class SubjectController extends Controller
{

    public function index()
    {
        //
        $subjects = Subject::all();

        return View::make('subject.index')
            ->with(compact('subjects'));
    }


    public function create()
    {
        //


        return View::make('subject.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();


        Subject::create([
            'title' => $data['title']
        ]);

        return redirect(route('subject.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Subject $subject)
    {
        //


        return View::make('subject.edit')
            ->with(compact('subject'));
    }


    public function update(Request $request, Subject $subject)
    {

        $data = $request->all();

        $subject->title = $data['title'];


        $subject->save();

        return redirect(route('subject.index'));
    }


    public function destroy(Subject $subject)
    {

        $subject->delete();

        return redirect(route('subject.index'));
    }
}
