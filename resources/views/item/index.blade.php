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
                Item
            </div>
            <div class="card-body">
                <table id="table_id">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->type }}</td>
                                <td>
                                    <button type="button" onclick="{{ $data = $item }}" class="btn btn-primary" data-toggle="modal" data-target="#item-modal-{{ $item->id }}">Details</button>
                                    <a href="{{ route('items.edit', ['id' => $item->id]) }}" class="btn btn-warning">Edit</a>
                                    @if($item->inventory === null)
                                    <form action="{{ route('items.inventory.store', ['item_id' => $item->id]) }}" method="post">
                                    @csrf
                                        <button type="submit" class="btn btn-success">Add to Inventory</button>
                                    </form>
                                    @endif

                                </td>
                            </tr>

                            <div class="modal fade" id="item-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Item Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>{{ "Name: $item->name" }}</h4>
                                        <h4>{{ "Location: $item->location" }}</h4>
                                        <h4>{{ "Type: $item->type" }}</h4>
                                        @if($item->type === 'equipment')
                                            <!-- <h4>{{ "Property Number: $item->equipment['property_number']" }}</h4> -->
                                            @foreach($equipments as $equipment)
                                                @if($equipment->id==$item->id)
                                                    @break;
                                                @endif
                                            @endforeach
                                            <h4>{{ "Property Number: $equipment->property_number" }}</h4>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function (){
        $('#table_id').DataTable();
    });
</script>
@endsection