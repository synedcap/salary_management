<?php

namespace App\Http\Controllers;

use App\Models\country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('country',[
            'countries' => Country::all(),
        ]);
    }

   

    /**
     * Store a country.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $request->validate([
            'name' => 'string|required|max:255|unique:countries,name',
        ]);

        Country::create([
            "name" => $request->name,
           
        ]);

        return redirect()->route('countries.index')
        ->with('success','Pays ajouté avec succès.');
    }

   

    /**
     * Update country.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, country $country)
    {
        $request->validate([
            'name' => 'string|required|unique:countries,name,' . $country->id,
        ]);

        $country->update(['name' => $request->name]);
        return back()->with('successMessage', "La modification  a été effectuée avec succès !");
       
    }

    /**
     * delete country
     *
     * @param  \App\Models\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(country $country)
    {
       
        $country->delete();
        return back()->with('successMessage', "La suppression  a été effectuée avec succès !");
    }
}
