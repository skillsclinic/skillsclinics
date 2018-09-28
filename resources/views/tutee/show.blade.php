@extends('layouts.app')

@section('style')

    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
        }

        .grid h1, h2, h3, h4, h5, h6, p {
            margin: 0;
        }

        .tutee-form {
            grid-column: 1 / 9;

        }

        .form-no {
            grid-column: 9 / 13;
            text-align: right;
        }

        .first-col {
            grid-column: 1 / 3;
        }

        .second-col {
            grid-column: 3 / 5;
        }

        .third-col {
            grid-column: 5 / 7;
        }

        .fourth-col {
            grid-column: 7 / 9;
        }

        .last-col {
            grid-column: 9 / 11;
        }

        .lastlast-col {
            grid-column: 11 / 13;
        }

        .whole-grid {
            grid-column: 1 / 13;
        }
    </style>
@endsection

@section('content')
    <div class="container grid">
        <h2 class="tutee-form mb-1">CSC-T1</h2>
        <h2 class="form-no mb-1">Form #: {{$tutee->id}}</h2>
        <h6 class="first-col mb-1">ID Number</h6>
        <p class="second-col mb-1">: {{$tutee->student->id_number}}</p>
        <h6 class="third-col mb-1">Name</h6>
        <p class="fourth-col mb-1">: {{$tutee->student->id}}</p>
        <h6 class="last-col mb-1">Month</h6>
        <p class="lastlast-col mb-1">: {{$tutee->month}}</p>

        <h6 class="first-col mb-1">Subject Title</h6>
        <p class="second-col mb-1">: {{$tutee->subject->title}}</p>
        <h6 class="third-col mb-1">Course</h6>
        <p class="fourth-col mb-1">:</p>
        <h6 class="last-col mb-1">School Year</h6>
        <p class="lastlast-col mb-1">: {{$tutee->schoolYear}}</p>

        <h6 class="first-col mb-1">Subject Code</h6>
        <p class="second-col mb-1">:</p>
        <h6 class="third-col mb-1">Professor</h6>
        <p class="fourth-col mb-1">: {{$tutee->professor}}</p>
        <h6 class="last-col mb-1">Contact Number</h6>
        <p class="lastlast-col mb-1">:</p>


        <div class="whole-grid mb-1 text-center">
            <h4>STUDENT'S PROGRESS MONITORING</h4>
        </div>
        <div class="whole-grid mb-1 text-center">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Session #</th>
                    <th>Date</th>
                    <th>Time-in</th>
                    <th>Time-out</th>
                    <th>Area of Concern</th>
                    <th>Tutee (sign)</th>
                    <th>Mentor</th>
                    <th>PRE-TEST</th>
                    <th>POST-TEST</th>
                    <th>REMARKS</th>
                    <th>Mentor (sign)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($session->sessions as $sess)
                    <tr>
                        <td>{{$sess->id}}</td>
                        <td>{{$sess->date}}</td>
                        <td>{{$sess->time_in}}</td>
                        <td>{{$sess->time_out}}</td>
                        <td>{{$sess->areaOfConcern}}</td>
                        <td></td>
                        <td>{{$sess->mentor->id}}</td>
                        <td>{{$sess->pre_test}}</td>
                        <td>{{$sess->post_test}}</td>
                        <td>{{$sess->remarks}}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--{{$session}}--}}

        </div>

    </div>


@endsection