<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses=Address::where('user_id', Auth:: user()->id)
        ->orderBy('is_default', 'desc')
        ->get();
        //dd($addresses);
        return(view('profile_details', compact('addresses')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       
        return(view('edit_profile'));
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

        $request->validate([
            'name' =>  'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255'
        ]);

        $updateUsersData=User::find($id);
        $updateUsersData->name=$request->name;
        $updateUsersData->email=$request->email;
        $updateUsersData->phone=$request->phone;
        $updateUsersData->save();
        //

        return redirect('/profile')->with('success', 'Succefull edit details');
    }

    public function edit_address($id)
    {
        $address=Address::find($id);
        
        return(view('edit_profile_address', compact('address')));
    }

    public function update_address(Request $request){

        $request->validate([
            'id'=>'required',
            'address' =>  'required|string|max:255',
            'town' => 'required|string|max:255',
            'zip_code' => 'required|string|max:5'
        ]);
        
        $updateAddress=Address::find($request->id);
        $updateAddress->address=$request->address;
        $updateAddress->town=$request->town;
        $updateAddress->zip_code=$request->zip_code;

        if($request->has('is_default')){
            Address::where('user_id', Auth::user()->id)->where('id', '!=', $updateAddress->id)->update(['is_default' => null]);
             
            $updateAddress->is_default=1;           
        }
        $updateAddress->save();

       

        return redirect('/profile')->with('success', 'Succefull edit address');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $address=Address::find($id);
        $address->delete();

        return redirect()->back()->with('success', 'Succefull delete address');
    }
}
