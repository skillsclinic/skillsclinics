@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tutee Form
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.tutee.store', ['id' => $id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Subject</label>
                                <select name="subject_id" class="form-control">
                                    <option disabled selected></option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Professor</label>
                                <input type="text" class="form-control" name="professor"/>
                            </div>
                            <div class="form-group">
                                <label>Month</label>
                                <select name="month" class="form-control">
                                    @foreach($months as $month)
                                        <option value="{{$month}}">{{ ucfirst($month) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>School Year</label>
                                <input type="text" class="form-control" name="schoolYear"/>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection