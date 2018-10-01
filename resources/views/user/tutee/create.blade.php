@extends('layouts.app')
@section('style')

    <style>
        .card-header-color{
            background: #0f0c29;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header card-header-color shadow-sm text-white">
                        <strong>Tutee Form</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.tutee.store', ['id' => $id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Subject</label>
                                <select name="subject_id" class="form-control" required>
                                    <option disabled selected></option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('subject_id'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('subject_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Professor</label>
                                <input type="text" class="form-control" name="professor" required/>
                                @if ($errors->has('professor'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('professor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Month</label>
                                <select name="month" class="form-control" required>
                                    @foreach($months as $month)
                                        <option value="{{$month}}">{{ ucfirst($month) }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('month'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>School Year</label>
                                <input type="number" class="form-control" name="schoolYear" required/>
                                @if ($errors->has('schoolYear'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('schoolYear') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection