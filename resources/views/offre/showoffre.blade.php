@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Mes Annonces 
        
      </h1>
      
</section>
<br>

<div class="container">

    
    
        <div class="row">
        
        
        <form class="form-horizontal" role="form" action="{{route('offre.showoffre',Auth::user()->id)}}" method="GET">
            
            
        <div class="col-sm-3">
        <select class="form-control" name="searchProduit" >
        <option></option>
        @foreach($produits as $produit)
        <option value="{{$produit->id}}">{{$produit->produitName}}</option>
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
          @foreach($offrespulisher  as $off)
           
             <div class="panel panel-default">                  
               <div class="panel-body">
                    <img src="{{asset($off->image)}}" width="100px" heigth="100px"/>
                   <div>
                           {{$off->id}} 
                            {{$off->quantite}}
                            {{$off->description}}
                            {{$off->typeOffre}}
                            {{$off->typeEnonce}}
                            <div class="pull-right ">
                                <a href="{{route('offre.showoffredetails',$off->id)}}" class="btn btn-info">Consulter</a>
                                
                                <form action="/offre/{{$off->id}}" method="POST">
                                {{csrf_field()}}
                                
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i> Delete</button>
                                </form>
                            </div>
                   </div>
                  
                    
               </div>
            </div>

        @endforeach
        </div>

    {{$offrespulisher->appends(request()->query())->links()}}


 </div>
@endsection