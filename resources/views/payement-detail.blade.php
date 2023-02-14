@extends('layouts.app')


@section('content')

<div class="breadcrumb-area">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
      
        <li class="item">Détail payement</li>
      
    </ol>

</div>





<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">Date du payement</th>
                <th scope="col" class="text-center">Montant payé</th>
               
               
            </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
              
            <tr>
                <td class="text-center"> {{ $item->created_at->format('d-m-Y') }}</td> </td>
                <td class="text-center"> {{ $item->montant_rembourser}} </td>
            </tr>
          @endforeach

           
        </tbody>
    </table>
</div>








@endsection







