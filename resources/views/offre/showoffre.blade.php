@extends('layouts.app')

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
                    
                    <a href="{{route('offre.showoffredetails',$off->id)}}">Consulter</a>
                   </div>
                  
                    
               </div>
            </div>

        @endforeach
        </div>




 </div>
@endsection