@extends('layouts.app')


@section('content')

<div class="breadcrumb-area">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
      
        <li class="item">Salariés</li>
      
    </ol>

</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary my-3" data-toggle="modal" data-target=".basicModalLG">
    <i class="fa fa-plus"></i>
    Ajouter salarié
</button>

<!-- Modal -->
<div class="modal fade basicModalLG" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enregistrement d'un salarié</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('employee.store')}}" method="post">
                @csrf
            <div class="modal-body">
                    <div class="row py-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="N° matricule"
                             name="matricule" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();"  required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Nom & prénoms" name="name"
                             onkeyup="this.value = this.value.toUpperCase();" required>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col">
                            <select name="country_id"  class="form-control" id="" required>
                                <option value="">Sélèctionner pays</option>
                                @foreach ($countries as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="sex"  class="form-control" id="" required>
                                <option value="">Sélèctionner sexe</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Féminin">Féminin</option>
                            </select>
                           
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col">
                            <input type="number" class="form-control" placeholder="N° compte" 
                            name="account" onkeyup="this.value = this.value.toUpperCase();" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Salaire" 
                            name="salary" onkeyup="this.value = this.value.toUpperCase();"  required>
                        </div>
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="table-responsive mt-5">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center" >N° matricule</th>
                <th scope="col" class="text-center">Nom & prénoms </th>
                <th scope="col" class="text-center">Pays</th>
                <th scope="col" class="text-center">Sexe</th>
                <th scope="col" class="text-center">N° compte</th>
                <th scope="col" class="text-center">Salaire</th>
                <th scope="col" class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($employes) > 0)
            
                @php
                $i = 1
                @endphp
                @foreach ($employes as $item)
                    <tr>
                        <td class="text-center">{{ $item->matricule }}</td>
                        <td class="text-center">{{ $item->name }}</td>
                        <td class="text-center">{{ $item->country->name }}</td>
                        <td class="text-center">{{ $item->sex }}</td>
                        <td class="text-center">{{ $item->account }}</td>
                        <td class="text-center">{{ $item->salary }}</td>
                        <td class="text-right"> 
                            <a href="javascript:void(0)" id="editionEmploye" type="button"  data-toggle="modal" data-target="#exampleModaledit"
                            data-name="{{ $item->name }}" data-id="{{ $item->id }}" data-account="{{ $item->account }}" 
                            data-salary="{{ $item->salary }}" data-sex="{{ $item->sex }}" data-matricule="{{ $item->matricule }}"
                            data-country="{{ $item->country_id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="#e2a03f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#exampleModal" id="deleteEmploye"
                    data-id="{{ $item->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#e7515a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                            </path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg></a></td>
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
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          
            <div class="modal-body">
                <p class="modal-text text-center">Êtes vous sur de vouloir supprimer ce salarié </p>
                <form action="" id="deleteform" method="post">@csrf</form>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" form="deleteform" class="btn btn-danger">Supprimer</button>
            </div>
       
        </div>
    </div>
</div>

<div class="modal fade "  id="exampleModaledit"role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modification d'un salarié</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="save" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row py-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="N° matricule" id="matricule" 
                            name="matricule" onkeyup="this.value = this.value.toUpperCase();" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nom & prénoms"
                             id="name" name="name" onkeyup="this.value = this.value.toUpperCase();" required>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col">
                            <select name="country_id"  class="form-control" id="country" required>
                                <option value="">Sélèctionner pays</option>
                                @foreach ($countries as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select name="sex"  class="form-control" id="sex" required>
                                <option value="">Sélèctionner sexe</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Féminin">Féminin</option>
                            </select>
                           
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col">
                            <input type="number" class="form-control" placeholder="N° compte" id="account" name="account" 
                            onkeyup="this.value = this.value.toUpperCase();" required>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Salaire" id="salary" name="salary"
                             onkeyup="this.value = this.value.toUpperCase();" required> 
                        </div>
                    </div>
                
                </div>
           </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" form="save" class="btn btn-primary">Enregistrer</button>
            </div>
        
        </div>
    </div>
</div>
@endsection






@section('javascripts')

@endsection
