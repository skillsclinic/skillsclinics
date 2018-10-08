@extends('layouts.app')


@section('content')

    <div class="container">
        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>Form</th>
                <th>Subject Title</th>
                <th>name</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tutees as $tutee)
                <tr>
                    <td>{{$tutee->id}}</td>
                    <td>{{$tutee->subject->title}}</td>
                    <td>{{$tutee->student->id}}</td>
                    <td><a href="{{route('tutee.show',['id' => $tutee->id])}}" class="btn btn-info">Info</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable();
        });
    </script>
@endsection