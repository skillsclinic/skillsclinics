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


    public function store(Request $request)
    {
        $data = $request->all();

        dd($data);
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
