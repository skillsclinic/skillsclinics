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
                        <form action="#">
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
                                <input type="text" class="form-control" name="month"/>
                            </div>
                            <div class="form-group">
                                <label>School Year</label>
                                <input type="text" class="form-control" name="schoolYear"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection