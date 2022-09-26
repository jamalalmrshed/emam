<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function __construct()
    {

    }

    public function getoffers()
    {
        return Offer::select('id','name')->get();
    }
    // public function store()
    // {
    //     Offer::create([
    //         'name' => 'offer2',
    //         'price' => 2000,
    //         'photo'=> 'jamalallljehdiuwrhrdjvh',
    //         'details' => 'jamalllll',

    //     ]);
    // }

    public function create()
    {
        return view('offer.create');
    }


    public function store(Request $request)
    {
    //validate


    $rules = $this->getrules();
    $massages = $this->getmassages();
    $validate = Validator::make($request->all(), $rules,$massages);
    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInput($request->all());
    }


        //insert to date
        Offer::create([
            'name'=> $request->name,
            'price'=>$request->price,
            'details'=>$request->details,
            'photo'=>$request->photo,
        ]);
        return redirect()->back()->with(['success' => 'تم اضافة العرض بنجاح']);

    }
    protected function getmassages(){
        return $massages = [
            'name.required' =>__(key:'messages.offer name required'),
            'name.max'=>__(key:'messages.name max'),
            'name.unique'=>__(key:'messages.name unique'),
            'price.numeric'=>__(key:'messages.price numirac'),
            'price.required'=>__(key:'messages.price required'),
            'details.required'=>__(key:'messages.detailes required'),
            'photo.required'=>__(key:'messages.photo required'),

        ];
    }

    protected function getrules()
    {
        return $rules =[
            'name'=>'required|max:100 |unique:offers,name',
            'price'=>'required|numeric',
            'details'=>'required',
            'photo'=>'required',
        ];
    }
    public function getalloffer()
    {
        $offer =  Offer::select('id','name','price','details')->get();
        return $offer;
    }

}
