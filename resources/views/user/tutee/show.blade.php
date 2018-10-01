@extends('layouts.app')

@section('style')

    <style>
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
        p {
            margin-bottom: 0px;
        }

        .card-header-color{
            background: #0f0c29;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header shadow-sm text-white card-header-color">
                <strong>CSC-T1</strong>
                <strong class="float-right">Form #{{ $tutee->id }}</strong>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <span class="font-weight-bold">ID Number:</span>
                        <span class="font-weight-bold">{{ $user->id_number }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="font-weight-bold">Name:</span>
                        <span class="font-weight-bold">{{ ucfirst($profile->lastName) }}
                            , {{ ucfirst($profile->firstName) }} {{ strtoupper($profile->middleInitial[0]) }}.</span>
                    </div>
                    <div class="col-md-4">
                        <span class="font-weight-bold">Month:</span>
                        <span class="font-weight-bold">{{ ucfirst($tutee->month) }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="font-weight-bold">Subject Title:</span>
                        <span class="font-weight-bold">{{ ucfirst($subject->title) }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="font-weight-bold">School Year:</span>
                        <span class="font-weight-bold">{{ $tutee->schoolYear }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="font-weight-bold">Professor:</span>
                        <span class="font-weight-bold">{{ ucfirst($tutee->professor) }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="font-weight-bold">Contact: </span>
                        <span class="font-weight-bold">{{ $profile->contact }} </span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>Session ID</td>
                            <td>Date</td>
                            <td>Time-in</td>
                            <td>Time-out</td>
                            <td>Area of Concern</td>
                            <td>
                                <p class="font-weight-normal">Mentor</p>
                                <p class="font-weight-normal">Name</p>
                            </td>
                            <td>Pre-Test</td>
                            <td>Post-Test</td>
                            <td>
                                <p class="font-weight-normal">Mentor</p>
                                <p class="font-weight-normal">Remarks</p>
                            </td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sessions as $session)
                            <tr>
                                <td>{{$session->id}}</td>
                                <td>{{$session->date}}</td>
                                <td>{{date('h:i a', strtotime($session->time_in))}}</td>
                                <td>{{date('h:i a', strtotime($session->time_out))}}</td>
                                <td>{{$session->areaOfConcern}}</td>
                                <td>{{$session->mentor->profile->lastName}}</td>
                                <td>{{$session->pre_test}}</td>
                                <td>{{$session->post_test}}</td>
                                <td>{{$session->remarks}}</td>
                                <td><a href="{{ route('users.tutee.session.edit', ['user_id' => $user->id, 'tutee_id' => $tutee->id, 'session_id' => $session->id]) }}" class=" shadow-sm btn btn-info btn-circle"><i class="far fa-edit"></i></a><a href="#" class="btn btn-info btn-circle ml-1"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a class=" shadow-sm btn btn-primary float-right text-white"
                   href="{{ route('users.tutee.session.create', ['user_id' => $user->id, 'tutee_id' => $tutee->id]) }}">New
                    Session</a>
            </div>
        </div>
    </div>
@endsection