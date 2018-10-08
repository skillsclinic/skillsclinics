@extends('layouts.app')

@section('style')
    <style>

        .card-header-color {
            background: #0f0c29; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header shadow-sm card-header-color text-white">
                <strong>Profile</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', ['user_id' => $user->id]) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <div class="col-md-5 form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstName" required
                                   value="{{ $user->profile->firstName }}">

                        </div>
                        <div class="col-md-2 form-group">
                            <label>Middle Initial</label>
                            <input type="text" class="form-control" name="middleInitial" required
                                   value="{{ $user->profile->middleInitial }}">

                        </div>
                        <div class="col-md-5 form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastName"
                                   value="{{ $user->profile->lastName }}">

                        </div>
                    </div>
                    @if($admin)
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $role)
                                        @if($user->role === $role)
                                            <option value="{{ $role }}" selected>{{ $role }}</option>
                                        @else
                                            <option value="{{ $role }}">{{ $role }}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Birthday</label>
                            <input type="date" class="form-control" name="birthday"
                                   value="{{ $user->profile->birthday }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                @if($user->profile->gender ===  $male)
                                    <option value="{{$male}}" selected>{{$male}}</option>
                                    <option value="{{$female}}">{{$female}}</option>
                                @else
                                    <option value="{{$male}}">{{$male}}</option>
                                    <option value="{{$female}}" selected>{{$female}}</option>
                                @endif
                            </select>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Contact</label>
                            <input type="text" class="form-control" name="contact" required
                                   value="{{ $user->profile->contact }}">
                            @if ($errors->has('contact'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required
                                   value="{{ $user->profile->email }}">

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                    <a href="{{ route('users.show', ['user_id' => $user->id]) }}"
                       class="btn btn-danger float-right mr-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection