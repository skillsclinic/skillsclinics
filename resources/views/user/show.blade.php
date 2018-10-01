@extends('layouts.app')

<style>
    .card-header-color {
        background: #0f0c29; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

</style>

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
                    <div class="col-md-6 mb-3 ">
                        <div class="card shadow-sm bg-primary text-white">
                            <div class="card-header">
                                <p class="h3 mb-0">Tutees</p>
                            </div>
                            <div class="card-body text-center p-1">
                                <h1 class="display-4">{{ $tuteeCount }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm bg-warning text-white">
                            <div class="card-header">
                                <p class="h3 mb-0">Sessions</p>
                            </div>
                            <div class="card-body text-center p-1">
                                <h1 class="display-4">{{ $sessionCount }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card shadow-sm">
                            <div class="card-header card-header-color text-white shadow-sm">
                                <strong>
                                    Tutee
                                </strong>
                            </div>
                            <div class="card-body">

                                @if($admin)
                                    <a class="btn btn-primary mb-3 text-white"
                                       href="{{ route('users.tutee.create', ['id'=> $user->id]) }}">New Tutee Form</a>
                                @endif
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
                                                <td>
                                                    <a href="{{ route('users.tutee.show', ['user_id' => $id, 'tutee_id' => $tutee->id]) }}"
                                                       class="btn btn-success">Details</a></td>
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