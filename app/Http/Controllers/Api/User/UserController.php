<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{

    public function index()
    {
        $mentors = User::with('profile')->whereIn('role',[User::JUNIOR_MENTOR,User::SENIOR_MENTOR,User::STREAM])->get();
        return $this->showAll($mentors);
    }


    public function create()
    {
        //
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
