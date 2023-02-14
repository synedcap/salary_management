<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   
    /**
     * Store employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:255|unique:employes,name',
            'matricule' => 'string|required|max:255|unique:employes,matricule',
            'account' => 'numeric|required|unique:employes,account',
            'sex' => 'string|required',
            'country_id' => 'string|required',
            'salary' => 'numeric|required',
        ]);

        Employe::create([
            'name' => $request->name,
            'matricule' => $request->matricule,
            'account' => $request->account,
            'sex' => $request->sex,
            'country_id' => $request->country_id,
            'salary' => $request->salary,
           
        ]);

        return redirect()->route('home')
        ->with('success','Salarié ajouté avec succès.');
    }

  

    /**
     * Update employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {

        $request->validate([
            'name' => 'string|required|max:255|unique:employes,name,' . $employe->id,
            'matricule' => 'string|required|max:255|unique:employes,matricule,'. $employe->id,
            'account' => 'numeric|required|unique:employes,account,' . $employe->id,
            'sex' => 'string|required',
            'country_id' => 'string|required',
            'salary' => 'numeric|required',
        ]);

        $employe->update([
            'name' => $request->name,
            'matricule' => $request->matricule,
            'account' => $request->account,
            'sex' => $request->sex,
            'country_id' => $request->country_id,
            'salary' => $request->salary,
        ]);
        return back()->with('successMessage', "La modification  a été effectuée avec succès !");
       
    }

    /**
     * delete employee.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return back()->with('successMessage', "La suppression  a été effectuée avec succès !");
    }
}
