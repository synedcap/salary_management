@extends('layouts.app')


@section('content')

<div class="breadcrumb-area">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
      
        <li class="item">Traitement de salaire</li>
      
    </ol>

    <div class="mx-auto  col-md-6 ">
       
        <input list="brow"  class="form-control" placeholder="Sélectionner employé" autocomplete="off" id="agent" required>
        <datalist id="brow">
            @foreach ($employes as $item)
            <option value="{{ $item->name }}">
        @endforeach
        </datalist>
       
    </div>

</div>

<div class="card mt-5 mx-auto  col-md-6 " id="recherche">
<form action="{{ route('treatment.index')}}" method="get">
        <div class="row py-4">
            <div class="col">
                <input name="debut" type="date"  class="form-control"  required>
            </div>
            <div class="col">
                <input name="fin" type="date"  class="form-control"  required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
        </div>
</form>
      
</div>


<div class="card mt-5" style="display:none;" id="cardInfo">

    <h3 class="text-uppercase text-danger" style="font-style:italic;">Information</h3> 
    <div class="row py-4">
        <div class="col">
            <label for=""> N° matricule</label>
            <input type="text" class="form-control" placeholder="Matricule" id="matricule"  onkeyup="this.value = this.value.toUpperCase();" readonly>
        </div>
        <div class="col">
            <label for=""> Nom & prénoms</label>
            <input type="text" class="form-control" placeholder="Nom & prénoms" id="name" onkeyup="this.value = this.value.toUpperCase();" readonly>
        </div>
    </div>
    <div class="row py-4">
        <div class="col">
            <label for=""> Pays</label>
            <input type="text" class="form-control" placeholder="Pays" id="country" onkeyup="this.value = this.value.toUpperCase();" readonly>
        </div>
        <div class="col">
            <label for="">Sexe</label>
            <input type="text" class="form-control" placeholder="Sexe" id="sex" onkeyup="this.value = this.value.toUpperCase();" readonly>
           
        </div>
    </div>
    <div class="row py-4">
        <div class="col">
            <label for="">N° compte</label>
            <input type="number" class="form-control" placeholder="N compte"  id="account" onkeyup="this.value = this.value.toUpperCase();" readonly>
        </div>
        <div class="col">
            <label for="">Salaire</label>
            <input type="number" class="form-control" placeholder="Salaire"  id="salary"  onkeyup="this.value = this.value.toUpperCase();" readonly>
        </div>
    </div>
    <form action="{{route('treatment.store')}}" id="treatmentForm" method="post">
       
        <div class="row py-4">
            <div class="col">
                <label for="">Date</label>
                <input type="date" class="form-control" placeholder="" id="date" name="date" required>
            </div>
            <div class="col">
                <label for="">Montant pret</label>
                <input type="number" class="form-control" placeholder="" name="" id="montantPret" readonly>
            </div>
            <div class="col">
                <label for="">Reste à payer</label>
                <input type="number" class="form-control" placeholder=""   id="reste" readonly>
            </div>
            <div class="col" id="apayer" style="display: none;">
                <label for="">A payer</label>
                <input type="number" class="form-control" placeholder="Montant à payer" id="pay"  name="pay" >
            </div>
        </div>
        <button  type="submit" class="btn btn-primary">Traiter</button>
    </form>
</div>

<div class="table-responsive mt-5" id="tableTraitement">
    <table class="table table-hover" id="example" >
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center" >Date de traitement</th>
                <th scope="col" class="text-center" >N° matricule</th>
                <th scope="col" class="text-center">Nom & prénoms </th>
                <th scope="col" class="text-center">N° Compte</th>
                <th scope="col" class="text-center">Pays</th>
                <th scope="col" class="text-center">Salaire traité</th>
                <th scope="col" class="text-center">Salaire payé ?</th>
               
            </tr>
        </thead>
        <tbody>


            @if (count($datas) > 0)
                @foreach ($datas as $item)
                    <tr>
                        <td class="text-center">
                            @if ($item->date_treatment != null)
                            {{ date('d-m-Y', strtotime($item->date_treatment)) }}   
                            @endif
                        </td>
                        <td class="text-center">{{ $item->employe['matricule']}}</td>
                        <td class="text-center">{{ $item->employe['name']}}</td>
                        <td class="text-center">{{ $item->employe['account']}}</td>
                        <td class="text-center">{{ $item->employe['country']['name']}}</td>
                        <td class="text-center">
                            @if ($item->isTreat == 1)
                            <span class="badge badge-success">Traité</span>
                        
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($item->isPay == 1)
                            <span class="badge badge-success">Payé</span>
                            @else
                                <a href="{{ route('salary-pay',['treatment' => $item->id])}}">
                                    <span class="badge badge-danger">Non payé</span>
                                </a>
                            @endif
                        </td>
                    
                    </tr>

                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center"> Aucun enregistrement</td>
                </tr>
            @endif
           
           
        </tbody>
    </table>
</div>


@endsection







