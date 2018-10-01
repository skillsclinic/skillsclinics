@extends('layouts.app')

@section('style')

    <style>
        .card-header-color {
            background: #0f0c29; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header card-header-color shadow-sm text-white">
                User
            </div>
            <div class="card-body">
                <table id="table_id">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Number</th>
                        <th>status</th>
                        <th>role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if($authenticatedUser->role === 'admin')
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->id_number}}</td>
                                <td>{{$user->status}}</td>
                                <td>{{$user->role}}</td>
                                <td><a href="{{ route('users.show', ['id' => $user->id]) }}"
                                       class="btn btn-info text-white shadow-sm">Details</a></td>
                            </tr>
                        @elseif($authenticatedUser->role === 'sta')
                            @if($user->role !== 'admin')
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->id_number}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>{{$user->role}}</td>
                                    <td><a href="{{ route('users.show', ['id' => $user->id]) }}"
                                           class="btn btn-info text-white shadow-sm">Details</a></td>
                                </tr>
                            @endif
                        @elseif($authenticatedUser->role === 'seniorMentor')
                            @if($user->role === 'admin' || $user->role === 'sta')
                            @else
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->id_number}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>{{$user->role}}</td>
                                    <td><a href="{{ route('users.show', ['id' => $user->id]) }}"
                                           class="btn btn-info text-white shadow-sm">Details</a></td>
                                </tr>
                            @endif
                        @elseif($authenticatedUser->role === 'juniorMentor')
                            @if($user->role === 'admin' || $user->role === 'sta' || $user->role === 'seniorMentor')
                            @else
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->id_number}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>{{$user->role}}</td>
                                    <td><a href="{{ route('users.show', ['id' => $user->id]) }}"
                                           class="btn btn-info text-white shadow-sm">Details</a></td>
                                </tr>
                            @endif
                        @elseif($authenticatedUser->role === 'stream')
                            @if($user->role === 'student')
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->id_number}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>{{$user->role}}</td>
                                    <td><a href="{{ route('users.show', ['id' => $user->id]) }}"
                                           class="btn btn-info text-white shadow-sm">Details</a></td>
                                </tr>
                            @endif
                        @else

                        @endif

                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>status</th>
                        <th>role</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
                initComplete: function () {
                    this.api().columns([2, 3]).every(function () {
                        var column = this;
                        var select = $('<select><option value="">all</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });
        });
    </script>
@endsection