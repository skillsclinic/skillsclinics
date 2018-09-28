@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                User
            </div>
            <div class="card-body">
                <table id="table_id">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>ID Number</td>
                        <td>status</td>
                        <td>role</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->id_number}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->role}}</td>
                            <td><a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-warning">Details</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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