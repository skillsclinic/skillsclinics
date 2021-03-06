<?php

namespace App\Http\Controllers\Inventory;

use App\Item;
use App\StockIn;
use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class InventoryStockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Inventory $inventory)
    {
        //
        $items = $inventory->item()->first();
        return View::make('inventory.stockin.create')
                    ->with(compact('items'))
                    ->with(compact('inventory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Inventory $inventory)
    {
        //
        $data = $request->all();
        // dd($data, $inventory);

        $validator = Validator::make($data, [
            'date' => 'required',
            'quantity' => 'required|gt:0'
        ]);

        if ($validator->fails()) {
            return redirect(route('inventories.stockin.create', $inventory))
                ->withErrors($validator)
                ->withInput();
        }

        StockIn::create([
            'date' => $data['date'],
            'inventory_id' => $inventory->id,
            'quantity' => $data['quantity']
        ]);

        $inventory->quantity = $inventory->quantity+$data['quantity'];
        $inventory->status = 'available';
        $inventory->save();

        return redirect(route('inventories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
