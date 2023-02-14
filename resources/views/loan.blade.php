@extends('layouts.app')


@section('content')

    <div class="breadcrumb-area">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">

            <li class="item">Gestion de prêts</li>

        </ol>

    </div>

    <div class="card mt-5 mx-auto text-center col-md-6 ">
        <form action="{{ route('loan.index')}}" method="get">
            <label>Filtrer par nom</label>
                <div class="row py-4">
                    <div class="col">
                        <input name="name" type="text"  class="form-control"  autocomplete="off" required>
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
                </div>
        </form>
              
        </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary my-3" data-toggle="modal" data-target=".basicModalLG">
        <i class="fa fa-plus"></i>
        Nouveau prêt
    </button>

    <!-- Modal -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible float-right col-md-6 fade show" role="alert">
            <strong>{{ $errors->first() }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="modal fade basicModalLG" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enregistrement d'un prêt</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('loan.store') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="row py-4">
                            <div class="col">
                               
                                <input list="brow" name="employe" class="form-control"  placeholder="Employé" autocomplete="off" required>
                                <datalist id="brow">
                                    @foreach ($employes as $item)
                                    <option value="{{ $item->name }}">
                                @endforeach
                                  
                                </datalist>
                            </div>

                        </div>
                        <div class="row py-4">

                            <div class="col">
                                <input type="number" class="form-control" placeholder="Montant du prêt" name="montant"
                                    onkeyup="this.value = this.value.toUpperCase();" required>

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
        <table class="table table-hover" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">Date du prêt</th>
                    <th scope="col" class="text-center">Nom & prénoms </th>
                    <th scope="col" class="text-center">Montant du prêt</th>
                    <th scope="col" class="text-center">Montant payé</th>
                    <th scope="col" class="text-center">Reste</th>

                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center"> {{ $item['date'] }} </td>
                            <td class="text-center"> {{ $item['name'] }} </td>
                            <td class="text-center"> {{ $item['montantPret'] }} </td>
                            <td class="text-center">
                                @if ($item['paye'] == 0)
                                    {{ $item['paye'] }}
                                @else
                                    <a href="{{ route('detailPayement', ['id' => $item['id']]) }}">
                                        {{ $item['paye'] }}
                                    </a>
                                @endif

                            </td>
                            <td class="text-center"> {{ $item['montantPret'] - $item['paye'] }} </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center"> Aucun enregistrement</td>
                    </tr>
                @endif



            </tbody>
        </table>
    </div>








@endsection
