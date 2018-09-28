@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-4 mb-3 ">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                Tutee
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                Session
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-dark text-white">
                                <strong>
                                    Tutee
                                </strong>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-primary mb-3 text-white" href="{{ route('users.tutee.create', ['id'=> $user->id]) }}">New Tutee Form</a>
                                <div class="table-responsive">
                                    <table id="table_id">
                                        <thead>
                                        <tr>
                                            <td>Tutee ID</td>
                                            <td>Subject</td>
                                            <td>Actions</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tutees as $tutee)
                                            <tr>
                                                <td>{{ $tutee->id }}</td>
                                                <td>{{ $tutee->subject->title }}</td>
                                                <td><a href="" class="btn btn-success">Details</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
                responsive: true
            });
        });
    </script>
@endsection