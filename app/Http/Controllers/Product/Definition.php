<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\LineItem;
use Illuminate\Http\Request;

class Definition extends Controller
{
    public function index() {

        $data['line_item'] = LineItem::get();

        return view('product.definition', $data);
    }

    public function line_item(Request $request) {

        $item = LineItem::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);
    }

    public function get_line_item($id) {

        if(!empty($id)) {

            $item = LineItem::select('id', 'name', 'code')->where('id', $id)->first();
        } else {

            $item = LineItem::select('id', 'name', 'code')->get();
        }

        return response()->json(['item' => $item]);
    }
}
