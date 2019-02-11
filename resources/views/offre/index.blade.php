@extends('layouts.master')

@section('content')
<div class="container">

        
    
        <div class="row">
        
        
            <div class="col-sm-6">
                <input type="text" class="form-control" id="quantite" placeholder="ref ,Nom...">
            </div>
       
        
            <div class="col-sm-2">
                <select class="form-control" >
                    <option>1</option>
                    <option>2</option>
                    
                </select>
            </div>
       

            <div class="col-sm-2">
                
                <select class="form-control" id="refProduit">
                    <option>Type Enoncer</option>
                    <option>2</option>
                    
                </select>
            </div>
        
        
            <div class="col-sm-2">
               <button class="btn btn-default">Chercher</button>
            </div>
        

        </div>
        <hr>
        <br>
    
        <div class="row">
            @foreach($offres  as $offre)
                
            
            <div class="col-sm-3">
             <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                    <img src="{{asset($offre->image)}}" width="150px" heigth="150px"/>
                    </div>
                    <b>Id :</b>{{$offre->id}}<br>
                    <b>Quanrite :</b>{{$offre->quantite}}<br>
                    <b>TypeOffre :</b>{{$offre->typeOffre}}<br>
                    <b>TypeEnonce :</b>{{$offre->typeEnonce}}<br>
                    <b>Description :</b>{{$offre->description}}
                        <hr>
                    <a href="{{route('offre.reponse',$offre->id)}}" class="btn btn-info"> Reponse</a>
                    
                </div>
             </div>
            </div>
            @endforeach
            
            
            
        </div>
        {{ $offres->links() }}
    
    


</div>
@endsection