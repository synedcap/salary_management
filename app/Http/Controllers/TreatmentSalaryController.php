<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Employe;
use App\Models\Echeance;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class TreatmentSalaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * treatement list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = Treatment::with('employe.country')->orderBy('date_treatment', 'desc');

    
        if ($request->query('debut')  != null && $request->query('fin')  != null){  

            $datas->whereBetween('date_treatment', [$request->query('debut'), $request->query('fin')]);
        }

        return view('treatmentOfsalary', [
            'employes' => Employe::all(),
            'datas' => $datas->get(),
        ]);
    }


     /**
     * Display employee information.
     *
     */
    public function employeeInfo(Request $request)
    {

        $employe = Employe::where('name', $request->employe)->first();
        $pret = Employe::where('id', $employe->id)->with('loans')->get();
        $data = 0;
        $pay = 0;

        if (sizeof($pret[0]['loans']) == 0) {
            return response()->json([
                'info' => $employe->load('country'),
                'montantTotal' => 0,
                'reste' => 0,
            ]);
        } else {

            foreach ($pret[0]['loans'] as   $value) {
                if ($value->solder == 0) {

                    $data = $value->montant_pret;
                    $echeance = Echeance::where('loan_id', $value->id)->get();

                    if (sizeof($echeance) == 0) {
                        $pay =  $data;
                    } else {
                        foreach ($echeance as $value) {
                            $pay += $value->montant_rembourser;
                        }
                    }
                }
            }
            return response()->json([
                'info' => $employe->load('country'),
                'montantTotal' => $data,
                'reste' => $data - $pay,
            ]);
        }
    }


    /**
     * change treatment status
     */
    public function salaryPay(Treatment $treatment)
    {

       $treatment->ispay = 1;
       $treatment->save();
       return Redirect::back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check employee
        $employe = Employe::where('matricule', $request->matricule)->first();


        //treat salary
        Treatment::create([
            'employe_id' => $employe->id,
            'date_treatment' => $request->date,
            'isTreat' => true
        ]);

       
        if ($request->pay != null) {
            $loan = Loan::where('solder', 0)->first();

            Echeance::create([
                'loan_id' => $loan->id,
                'montant_rembourser' => $request->pay
            ]);

            $detail =  $loan->load('echeances');

            $sum = null;

            foreach ($detail['echeances'] as   $value) {

                $sum += $value->montant_rembourser;
  
            }
            if ($sum == $loan->montant_pret) {
                    
                $loan->solder = 1;
                $loan->save();
            }
        }

        return response()->json("succès");
    }

}
