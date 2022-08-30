<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

// use App\Models\product;

class mycontroller extends Controller
{

    public function insert(Request $req)
    {
        $name = $req->get('pname');
        $price = $req->get('pprice');
        $pimg = $req->file('image')->getClientOriginalName();
        $req->image->move(public_path('images'), $pimg);

        $prod = new product();
        $prod->PName = $name;
        $prod->PPrice = $price;
        $prod->PImage = $pimg;

        $prod->save();

        return redirect('/');
    }

    public function readData()
    {
        $pdata = product::all();

        return view('insertRead', ['data' => $pdata]);
    }

    public function updateordelete(Request $req)
    {
        $pId = $req->get('Id');
        $pName = $req->get('Pname');
        $pPrice = $req->get('Pprice');

        if ($req->get('editar')) {

            return view('updateView', ['pId' => $pId, 'pName' => $pName, 'pPrice' => $pPrice]);

        } else if ($req->get('eliminar')) {
            $prod = product::find($pId);
            $prod->delete();
            return redirect('/');
        } else {
            return redirect('/');
        }

    }

    public function update(Request $req)
    {
        $id = $req->get('pId');
        $name = $req->get('pName');
        $price = $req->get('pPrice');

        $prod = product::find($id);
        $prod->PName = $name;
        $prod->PPrice = $price;
        $prod->save();

        return redirect('/');

    }

}
