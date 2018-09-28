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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        //


        $users = User::all();

        return View::make('user.index')
            ->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $female = Profile::FEMALE;
        $male = Profile::MALE;

        return View::make('user.create')
            ->with(compact('female'))
            ->with(compact('male'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('view', $user);

        $tutees = $user->tutees()->with('subject')->get();
        //$profile = Profile::where('user_id', '=', $id)->first();

        return View::make('user.show')
            ->with(compact('tutees'))
            ->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
