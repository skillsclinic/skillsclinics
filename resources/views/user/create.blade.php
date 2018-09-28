@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Profile
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-5 form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstName" required value="{{ old('firstName') }}">
                            @if ($errors->has('firstName'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Middle Initial</label>
                            <input type="text" class="form-control" name="middleInitial" required value="{{ old('middleInitial') }}">
                            @if ($errors->has('middleInitial'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('middleInitial') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-5 form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastName" required value="{{ old('lastName') }}">
                            @if ($errors->has('lastName'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Birthday</label>
                            <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
                            @if ($errors->has('birthday'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Gender</label>
                            <select name="gender" class="form-control" value="{{ old('gender') }}">
                                <option disabled selected></option>
                                <option value="{{$male}}">{{$male}}</option>
                                <option value="{{$female}}">{{$female}}</option>
                            </select>
                            @if ($errors->has('gender'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Contact</label>
                            <input type="text" class="form-control" name="contact" required value="{{ old('contact') }}">
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
                            <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection