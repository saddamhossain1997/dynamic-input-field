<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DynamicData;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        return view('product.addProduct');
    }

    public function storeJquery(Request $request)
    {

        $datas = new DynamicData();
        $datas->qty = $request->qty;
        $datas->price = $request->price;
        $datas->total = $request->total;
        $datas->save();
    }

    public function store(Request $request)
    {

        // $data = $request->validate([
        //     'qty.*' => 'required|string|max:255',
        //     'price.*' => 'required|string|max:255',
        //     'total.*' => 'required|string|max:255',

        // ]);

        // $datas = new Company();
        // $datas->name = $request->name;
        // $datas->save();

        // foreach ($data['qty'] as $index => $name) {
        //     DynamicData::create([

        //         'qty' => $name,
        //         'price' => $data['price'][$index],
        //         'total' => $data['total'][$index],
        //     ]);
        // }
        $insertData = [];
        for ($i = 0; $i < count($request->total); $i++) {


            $insertData[] = [
                'qty' => $request->qty[$i],
                'price' => $request->price[$i],
                'total' => $request->total[$i],

            ];
        }
        DynamicData::insert($insertData);




        return redirect()->route('productData')->with('success', 'Inputs stored successfully.');
    }
}
