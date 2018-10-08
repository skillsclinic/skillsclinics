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
                        <form action="{{ route('inventories.stockout.store', ['id' => $inventory->id]) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" name="date" required value="{{ old('date') }}">
                                @if ($errors->has('date'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="" class="form-control" value="{{ $items->name }}" readonly>
                                @if ($errors->has('name'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="" class="form-control">
                                @if ($errors->has('quantity'))
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <input type="text" name="remarks" id="" class="form-control">
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