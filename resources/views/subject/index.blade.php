@extends('layouts.app')

@section('style')

    <style>
        .card-header-color {
            background: #0f0c29; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

    </style>

@endsection

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header card-header-color shadow-sm text-white"><strong>Subject</strong></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_id">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $subject->id }}</td>
                                <td>{{ $subject->title }}</td>
                                <td>
                                    <a href="{{ route('subject.edit', ['subject_id' => $subject->id]) }}" class="btn-circle btn btn-primary text-white d-inline-block"> <i class="far fa-edit"></i></a>
                                    <form action="{{ route('subject.destroy', ['subject_id' => $subject->id]) }}" class="d-inline-block" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-circle"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable();
        });
    </script>

@endsection