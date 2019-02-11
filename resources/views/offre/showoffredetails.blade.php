@extends('layouts.master')

@section('content')
<div class="container">

    
    
        <div class="row">
        
        
            <div class="col-sm-6">
                <input type="text" class="form-control" id="quantite" placeholder="ref ,Nom...">
            </div>
       
        
            <div class="col-sm-2">
                <select class="form-control" >
                    <option>Category</option>
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
         
             <div class="panel panel-default">                  
               <div class="panel-body">
                    <img src="{{asset($offre->image)}}" width="100px" heigth="100px"/>
                   <div>
                   {{$offre->id}} 
                    {{$offre->quantite}}
                    {{$offre->description}}
                    {{$offre->typeOffre}}
                    {{$offre->typeEnonce}}
                    
                    
                   </div>
                   <div class="reponse">
                       @if($offre->typeEnonce = "Don")
                       <hr>
                            @foreach($offre->response_dons as $don )
                                {{$don->description}}                                
                                {{$don->user_id}}            
                                {{$don->offre_id}}
                                
                                <a href="{{route('offre.confirmresponsedon',$don->id)}}">Confirm</a>
                                <hr>
                            @endforeach

                       @endif
                       @if($offre->typeEnonce = "Echangement")
                       <hr>
                       @foreach($offre->response_echanges as $ech )
                               
                                {{$ech->produitEchangeID}}            
                                {{$ech->description}}
                                {{$ech->user_id}}            
                                {{$ech->offre_id}}
                                
                                <a href="{{route('offre.confirmresponseechange',$ech->id)}}">Confirm</a>
                                <hr>
                            @endforeach
                       

                       @endif
                   </div>
                    
               </div>
               
            </div>
            
       
        </div>




 </div>
@endsection