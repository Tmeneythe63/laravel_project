@extends('layouts.app')

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
                    {{$offre->id}}
                    {{$offre->quantite}}
                    {{$offre->typeOffre}}
                    {{$offre->typeEnonce}}

                    <a href="{{route('offre.reponse',$offre->id)}}"> Reponse</a>
                    <form action="/offre/{{$offre->id}}" method="POST">
                    {{csrf_field()}}
                    
                    {{method_field('DELETE')}}
                    <button type="submit">Delete</button>
                    </form>
                </div>
             </div>
            </div>
            @endforeach
            
            

        </div>
    
    


</div>
@endsection