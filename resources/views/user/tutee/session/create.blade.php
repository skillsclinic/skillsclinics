@extends('layouts.app')


@section('style')

    <style>
        p {
            margin-bottom: 0;
        }

        .card-header-color {
            background: #0f0c29; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #24243e, #302b63, #0f0c29); /* Chrome 10-25, Safari 5.1-6 */
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
                        <strong>Session Form</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.tutee.session.store', ['user_id' => $user->id, 'tutee_id' => $tutee->id]) }}"
                              method="POST">
                            @csrf

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Mentor</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="mentor_id">
                                    <option selected disabled>Enter Name...</option>

                                    @foreach($mentors as $mentor)
                                        <option value="{{ $mentor->id }}">{{ $mentor->profile->lastName }}
                                            , {{ $mentor->profile->firstName }}</option>

                                    @endforeach
                                </select>
                                @if ($errors->has('mentor_id'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('mentor_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" class="form-control" name="date" required value="{{ old('date') }}">
                                @if ($errors->has('date'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Time-in</label>
                                <input type="text" id="time" class="form-control" readonly name="time_in" required
                                       value="{{ old('time_in') }}"/>
                                @if ($errors->has('time_in'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('time_in') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Time-out</label>
                                <input type="text" id="timeout" class="form-control" readonly name="time_out" required
                                       value="{{ old('time_out') }}"/>
                                @if ($errors->has('time_out'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('time_out') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Area of concern</label>
                                <textarea class="form-control" name="areaOfConcern" required></textarea>
                                @if ($errors->has('areaOfConcern'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('areaOfConcern') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Pre Test</label>
                                <input class="form-control" min="1" max="10" name="pre_test" type="number"
                                       placeholder="1-10" required value="{{ old('pre_test') }}"/>
                                @if ($errors->has('pre_test'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('pre_test') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Post Test</label>
                                <input class="form-control" min="1" max="10" name="post_test" type="number"
                                       placeholder="1-10" required value="{{ old('post_test') }}"/>
                                @if ($errors->has('post_test'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('post_test') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mentor Remark</label>
                                <input class="form-control" min="1" max="5" name="remarks" type="number"
                                       placeholder="1-5" required value="{{ old('remarks') }}"/>
                                @if ($errors->has('remarks'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('remarks') }}</strong>
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

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#time').mdtimepicker();
            $('#timeout').mdtimepicker();

        });

        function preventBack() {
            window.history.forward();
        }
        preventBack();
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };


    </script>
@endsection