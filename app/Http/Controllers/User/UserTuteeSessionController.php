<?php

namespace App\Http\Controllers\User;

use App\Session;
use App\Tutee;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserTuteeSessionController extends Controller
{

    public function index()
    {
        //
    }


    public function create(User $user, Tutee $tutee)
    {
        //
        $mentors = User::with('profile')->whereIn('role',[User::JUNIOR_MENTOR,User::SENIOR_MENTOR,User::STREAM])->get();

        return View::make('user.tutee.session.create')
            ->with(compact('user'))
            ->with(compact('tutee'))
            ->with(compact('mentors'));
    }


    public function store(Request $request, User $user, Tutee $tutee)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'date' => 'required',
            'mentor_id' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
            'areaOfConcern' => 'required',
            'pre_test' => 'required|min:1|max:2',
            'post_test' => 'required|min:1|max:2',
            'remarks' => 'required|min:1|max:1',
        ]);

        if($validator->fails()){
            return redirect(route('users.tutee.session.create', ['id' => $user->id, 'tutee_id' => $tutee->id]))
                ->withErrors($validator)
                ->withInput();
        }

        $data['time_in'] = date("H:i:s", strtotime($data['time_in']));
        $data['time_out'] = date("H:i:s", strtotime($data['time_out']));

        Session::create([
            'tutee_id' => $tutee->id,
            'mentor_id' => $data['mentor_id'],
            'date' => $data['date'],
            'time_in' => $data['time_in'],
            'time_out' => $data['time_out'],
            'areaOfConcern' => $data['areaOfConcern'],
            'pre_test' => (int)$data['pre_test'],
            'post_test' => (int)$data['post_test'],
            'remarks' => (int)$data['remarks']
        ]);

        return redirect(route('users.tutee.show', ['user_id' => $user->id, 'tutee_ud' => $tutee->id]));


    }


    public function show($id)
    {
        //
    }


    public function edit(User $user, Tutee $tutee, Session $session)
    {
        $mentors = User::with('profile')->whereIn('role',[User::JUNIOR_MENTOR,User::SENIOR_MENTOR,User::STREAM])->get();


        return View::make('user.tutee.session.edit')
            ->with(compact('user'))
            ->with(compact('tutee'))
            ->with(compact('session'))
            ->with(compact('mentors'));
    }


    public function update(Request $request, User $user, Tutee $tutee, Session $session)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'date' => 'required',
            'mentor_id' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
            'areaOfConcern' => 'required',
            'pre_test' => 'required|min:1|max:2',
            'post_test' => 'required|min:1|max:2',
            'remarks' => 'required|min:1|max:1',
        ]);

        if($validator->fails()){
            return redirect(route('users.tutee.session.create', ['id' => $user->id, 'tutee_id' => $tutee->id]))
                ->withErrors($validator)
                ->withInput();
        }

        $data['time_in'] = date("H:i:s", strtotime($data['time_in']));
        $data['time_out'] = date("H:i:s", strtotime($data['time_out']));

        $session->date = $data['date'];
        $session->mentor_id = $data['mentor_id'];
        $session->time_in = $data['time_in'];
        $session->time_out = $data['time_out'];
        $session->areaOfConcern = $data['areaOfConcern'];
        $session->pre_test = (int)$data['pre_test'];
        $session->post_test = (int)$data['post_test'];
        $session->remarks = (int)$data['remarks'];

        $session->save();
        return redirect(route('users.tutee.show', ['user_id' => $user->id, 'tutee_ud' => $tutee->id]));

    }


    public function destroy($id)
    {
        //
    }
}
