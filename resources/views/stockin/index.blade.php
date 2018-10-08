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
                Stock In Transactions
            </div>
            <div class="card-body">
                <table id="table_id">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stockins as $stockin)
                            <tr>
                                <td>{{ $stockin->date }}</td>
                                <td>{{ $stockin->inventory->item->name }}</td>
                                <td>{{ $stockin->quantity }}</td>
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
    $(document).ready(function (){
        $('#table_id').DataTable();
    });
</script>
@endsection