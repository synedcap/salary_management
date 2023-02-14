@extends('layouts.app')


@section('content')

<div class="breadcrumb-area">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
      
        <li class="item">Statistiques</li>
      
    </ol>

</div>

<div class="card mt-5 mx-auto  text-center col-md-6 ">
  
    <div class="col">
        <select name="country_id"  class="form-control" id="agent">
            <option value=""></option>
            <option value=""></option>
           
        </select>
    </div>
</div>

<div class="table-responsive mt-5">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">Date du payement</th>
                <th scope="col" class="text-center">Montant payé</th>
               
               
            </tr>
        </thead>
        <tbody>
    
              
            <tr>
                <td class="text-center"> </td> </td>
                <td class="text-center">  </td>
            </tr>
           
        </tbody>
    </table>
</div>



@endsection