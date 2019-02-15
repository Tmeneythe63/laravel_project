@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Mes Annonces / Annonce / List des reponse
        
      </h1>
      
</section>

<br>
<div class="container">

    
    
        
        
        <div class="row">
         
             <div class="panel panel-default">                  
               <div class="panel-body">
                    <div class="col-sm-2">
                        <img src="{{asset($offre->image)}}" width="100px" heigth="100px"/>
                    </div>
                    <div class="col-sm-10">
                        <h3>Offre {{$offre->id}}</h3>
                        {{$offre->description}}
                        {{$offre->quantite}}                        
                        {{$offre->typeOffre}}
                        {{$offre->typeEnonce}}
                    
                    
                   </div>
                </div>
                </div>
         </div>
          
          
        <div class="row">
   
            <div class="col-sm-10">
                <input type="text" class="form-control"  placeholder="esearch">
            </div>
       
            <div class="col-sm-2">
               <button class="btn btn-default">Chercher</button>
            </div>
 
        </div>
<br>
        <div class="row">
         
            <div class="panel panel-default">                  
             <div class="panel-body">
                   <div class="reponse">
                       @if($offre->typeEnonce = "Don")
                       <hr>
                            @foreach($offre->response_dons as $don )
                                <h3>Reponse {{$don->id}}</h3>
                                {{$don->description}}                                
                                
                                <br>
                                <div class="pull-right">
                                    <a href="{{route('offre.confirmresponsedon',$don->id)}}" class="btn btn-info">Confirm</a>
                                    <a href="#" class="btn btn-danger">Anuller</a>
                                </div>
                                <hr>
                            @endforeach

                       @endif
                       @if($offre->typeEnonce = "Echangement")
                       <hr>
                       @foreach($offre->response_echanges as $ech )
                                           
                                <h3>Reponse {{$ech->id}}</h3>
                                {{$ech->description}}  
                                <br>
                                <div class="pull-right">
                                    <a href="{{route('offre.confirmresponseechange',$ech->id)}}" class="btn btn-info">Confirm</a>
                                    <a href="#" class="btn btn-danger">Annuler</a>
                                </div>
                                
                                <hr>
                            @endforeach
                       

                       @endif
                   </div>
                    
               </div>
               
            </div>
            
       
        </div>




 </div>
@endsection