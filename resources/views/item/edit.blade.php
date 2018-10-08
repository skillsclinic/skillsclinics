@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Item Details
            </div>
            <div class="card-body">
                <form action="{{ route('items.update', ['item_id' => $item->id])  }}" method="post">
                {{method_field('PUT')}}
                @csrf
                    <div class="form-row">
                        <div class="col-md-5">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
                            @if ($errors->has('name'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ $item->location }}">
                            @if ($errors->has('location'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option selected disabled></option>
                                <option value="consumable">consumable</option>
                                <option value="equipment">equipment</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="alert-danger" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5" id="pn">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(function() {
        $('#type').change(function(){
            if( $(this).val() === 'equipment'){
                $('#pn').append('<label for="property_number">Property Number</label>');
                $('#pn').append('<input id="property_number" name="property_number" class="form-control" type="number" />');
            }
        });

        $('#type').change(function(){
            if( $(this).val() === 'consumable'){
                $('#pn').empty();
            }
        });
    });

</script>
@endsection