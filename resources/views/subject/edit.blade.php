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
                        <strong>Subject</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subject.update', ['subject_id' => $subject->id]) }}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label>Title</label>
                                <input required type="text" name="title" class="form-control" value="{{ $subject->title }}">
                            </div>
                            <button type="submit" class="btn btn-success float-right">Submit</button>
                            <a href="{{ route('subject.index') }}" class="btn btn-danger float-right mr-3">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection