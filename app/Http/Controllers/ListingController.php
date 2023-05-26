<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\ApartmentType;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('listings.index',[
            'heading'=>'Latest Listings',
            'listings'=>Listing::latest()->filter(request(['extras','search']))->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('listings.create',[
            'counties'=>County::all(),
            'apartment_types'=>ApartmentType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $formFields= $request->validate([
            'aprtmnt_name'=>'required',
            'house_aprt_type'=>['required'],
            'location'=>'required',
            'price'=>['required','numeric'],
            'closest_town'=>'required',
            'email'=>['required','email'],
            'contact_phone_number'=>['required','numeric'],
            'description'=>'required',
            'extras'=>'required',
            'county_id'=>'required'
       ]);
       
       if($request->hasFile('main_image')){
        $formFields['main_image']= $request->file('main_image')->store('logos','public');
       }
       $formFields['user_id']= auth()->user()->id;
      
       Listing::create($formFields);
       return redirect('/')->with('message', 'Listing created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
       // dd($listing);
        return view('listings.show',[
            'listing'=> $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
        return view('listings.edit',['listing'=>$listing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
        if($listing->user_id != auth()->user()->id ){
            abort(403,'Unauthorized Action');
        }
        $formFields= $request->validate([
            'aprtmnt_name'=>'required',
            'house_aprt_type'=>['required'],
            'location'=>'required',
            'price'=>['required','numeric'],
            'closest_town'=>'required',
            'email'=>['required','email'],
            'extras'=>'',
            'contact_phone_number'=>['required','numeric'],
            'description'=>'required',
            'county_id'=>'required'
       ]);

       if($request->hasFile('main_image')){
        $formFields['main_image']= $request->file('main_image')->store('logos','public');
       }
       $formFields['user_id']= auth()->user()->id;
       $listing->update($formFields);
       return back()->with('message', 'Listing Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
        if($listing->user_id != auth()->user()->id ){
            abort(403,'Unauthorized Action');
        }
        $title = $listing->title;
        $listing->delete();
        return redirect('/')->with('message', 'Listing: '.$title. ' Deleted!');

    }
    //Manage Listings
    public function manage()
    {
        
        return view('listings.manage',[
            'listings'=>auth()->user()->listings()->get()
        ]);
    }
}
