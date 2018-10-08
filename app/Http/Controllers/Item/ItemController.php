<?php

namespace App\Http\Controllers\Item;

use App\Item;
use App\Equipment;
use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::with('inventory')->whereIn('type', ['equipment','consumable'])->get();
        $equipments = Equipment::with('item')->get();
        //$items = Item::all();

        return View::make('item.index')
                    ->with(compact('items'))
                    ->with(compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View::make('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'location' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('items.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $item = Item::create([
            'name' => strtolower($data['name']),
            'location' => strtolower($data['location']),
            'type' => strtolower($data['type'])
        ]);

        // if(isset($data['property_number'])){
        if($data['type'] === 'equipment'){
            Equipment::create([
                'item_id' => $item['id'],
                'property_number' => $data['property_number']
            ]);
        }

        return redirect(route('items.index'));
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
        $item = Item::findOrFail($id);

        return View::make('item.edit')
                ->with(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'location' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('items.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $item->name = $data['name'];
        $item->location = $data['location'];
        $item->type = $data['type'];

        $item->save();

        if($data['type'] === 'equipment'){
            $equipment = $item->equipment()->first();
            if($equipment==null){
                Equipment::create([
                    'item_id' => $item['id'],
                    'property_number' => $data['property_number']
                ]);
            } else{
                $equipment->property_number = $data['property_number'];
                $equipment->save();
            }
        } else {
            $equipment = $item->equipment()->first();
            if($equipment!=null){
                //dd($equipment);
                // $item->equipment()->detach();
                $equipment->item_id = null;
                $equipment->save();
            }
        }

        return redirect(route('items.index'));
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
