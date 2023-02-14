<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Employe;
use App\Models\Echeance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoanController extends Controller
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
    public function index(Request $request)
    {

        $data = [];

        
        if ($request->query('name')) {

            $name = $request->query('name');

            //get specific employee loans with detail
            $loan = Loan::with('employe', 'echeances')
            ->whereHas('employe', function ($query) use ($name) {
                $query->where('name', 'LIKE', '%' . $name . '%');
            })->get();


            if ($loan) {

                foreach ($loan as  $value) {

                    // make sum of employee payments  for each loan
                    $sum = Echeance::select(DB::raw("SUM(montant_rembourser) as total"))
                        ->where('loan_id', $value->id)
                        ->get();

                   
                    // array of global loan and global payments 
                    $data[] = [

                        'id' => $value->id,
                        'date' => $value->created_at->format("d-m-Y"),
                        'name' => $value['employe']['name'],
                        'montantPret' => $value->montant_pret,
                        'paye' => $sum[0]['total'] == null ? 0 : $sum[0]['total']
                    ];
                }
            }
        } else {

            //get all employees loans with detail
            $loan = Loan::with('employe', 'echeances')->get();
            if ($loan) {

                foreach ($loan as  $value) {

                    // make sum of employee payments for each loan
                    $sum = Echeance::select(DB::raw("SUM(montant_rembourser) as total"))
                        ->where('loan_id', $value->id)
                        ->get();

                    // array of global loan and global payments 
                    $data[] = [

                        'id' => $value->id,
                        'date' => $value->created_at->format("d-m-Y"),
                        'name' => $value['employe']['name'],
                        'montantPret' => $value->montant_pret,
                        'paye' => $sum[0]['total'] == null ? 0 : $sum[0]['total']
                    ];
                }
            }
        }


        return view('loan', [
            'employes' => Employe::all(),
            'data' => $data,
        ]);
    }

   
    /**
     * Store a loan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'employe' => 'required',
            'montant' => 'numeric|required',
        ]);

        // check if employee already has a loan

        $employe = Employe::where('name', $request->employe)->first();
        $loan = Loan::where('employe_id', $employe->id)->where('solder', 0)->first();

        if ($loan) {
            return Redirect::back()->withErrors(['msg' => 'Cet employé à déjà un pret en cours!']);
        }else {
          
            Loan::create([
                "employe_id" => $employe->id,
                "montant_pret" => $request->montant,
    
            ]);
            return redirect()->route('loan.index')->with('success', 'prêt ajouté avec succès.');
        }


    }

    /**
     * Display payment detail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailPayement($id)
    {
        return view('payement-detail', [

            'data' => Echeance::where('loan_id', $id)->get(),
        ]);
    }
   

}
