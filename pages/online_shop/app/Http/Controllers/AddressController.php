<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function addresses()
    {
        $user = User::where('id',auth()->user()->id)->firstOrFail();
        $addresses = Address::where('user_id',auth()->user()->id)->get();

        return view('addresses',compact('user','addresses'));
    }

    public function update($id , Request $request)
    {
        $address = Address::where('id',$id)->firstOrFail();
        $address->update($request->validate([
            'country'=>'required',
            'city'=>'required',
            'address'=>'required',
            'zipcode'=>'required|min:10|max:10',
            'receiver_name'=>'required',
            'receiver_phone'=>'required|min:11|max:11'
        ]));
        return $this->addresses();
    }

    public function edit($id)
    {
        $user = User::where('id',auth()->user()->id)->firstOrFail();
        $addresses = Address::where('user_id',auth()->user()->id)->get();
        $address = Address::where('id',$id)->firstOrFail();
        return view('edit_address',compact('user','addresses','address'));
    }

    public function destroy($id)
    {
        Address::where('id',$id)->delete();
        return $this->addresses();
    }

    public function create(Request $request)
    {
        $request->validate([
            'country'=>'required',
            'city'=>'required',
            'address'=>'required',
            'zipcode'=>'required|min:10|max:10',
            'receiver_name'=>'required',
            'receiver_phone'=>'required|min:11|max:11'
        ]);

        $address = new Address();
        $address->country = $request->input('country');
        $address->city = $request->input('city');
        $address->address = $request->input('address');
        $address->zipcode = $request->input('zipcode');
        $address->receiver_name = $request->input('receiver_name');
        $address->receiver_phone = $request->input('receiver_phone');
        $address->user_id = auth()->user()->id;
        $address->save();

        $user = User::where('id',auth()->user()->id)->firstOrFail();
        $addresses = Address::where('user_id',auth()->user()->id)->get();

        return view('addresses',compact('user','addresses'));
    }
}
