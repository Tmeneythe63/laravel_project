@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Anonces 
        
      </h1>
      
</section>
<br>

<div class="container">

        
<div class="panel panel-default">
          <div class="panel-body">
        <div class="row">
        
          <form class="form-horizontal" role="form" action="/offre" method="GET">
            
            
                <div class="col-sm-3">
                <select class="form-control" name="searchProduit" >
                <option></option>
                @foreach($all_produits as $all_produit)
                <option value="{{$all_produit->id}}">{{$all_produit->produitName}}</option>
                @endforeach
                </select>
            </div>
        
            <div class="col-sm-3">
                <select class="form-control" name="searchTypeOffre" >
                <option></option>
                    <option>Offre</option>
                    <option>Demande</option>
                    
                </select>
            </div>
       

            <div class="col-sm-3">
                
                <select class="form-control" name="searchTypeEnonce" >
                        <option></option>
                        <option>Changement</option>
                        <option>Don</option>
                    
                </select>
            </div>
        
        
            <div class="col-sm-3">
               <button type="submit" class="btn btn-default">Chercher</button>
            </div>
        
            </form>
        </div>
        <hr>
        <br>
    
        <div class="row">
            @foreach($offres  as $offre)
                
            
            <div class="col-sm-3">
             <div class="panel panel-default">
                <div class="panel-body">
                  <div class="block-single-offre" >
                    
                    <div class="">
                    <img src="{{asset($offre->image)}}" width="150px" heigth="150px"/>
                    </div>
                    
                    <b>Quanrite :</b>{{$offre->quantite}}<br>
                    <b>TypeOffre :</b>{{$offre->typeOffre}}<br>
                    <b>TypeEnonce :</b>{{$offre->typeEnonce}}<br>
                    <b>Description :</b>{{$offre->description}}
                        <hr>
                    <a href="{{route('offre.reponse',$offre->id)}}" class="btn btn-info"> Reponse</a>
                   </div> 
                </div>
             </div>
            </div>
            @endforeach
            
            
            
        </div>
      
        {{ $offres->appends(request()->query())->links()  }}
    
    </div>
    </div>


</div>
@endsection