<?php

namespace App\Http\Controllers\User;

use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class UserTuteeController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
        $subjects = Subject::all();
        return View::make('user.tutee.create')
            ->with(compact('subjects'));
    }


    public function store(Request $request)
    {
        //
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
