@extends('layouts.app')

@section('content')
<div class="container">

<form class="form-horizontal" role="form" action="/offres/echangestore" method="POST">
    {{csrf_field()}}
    
    <div class="form-group">
    
            <label class="control-label col-sm-2" for="produitEchangeID">Echanger par:</label>
            <div class="col-sm-10">
                <select class="form-control" name="produitEchangeID" id="produitEchangeID">
                    
                    <option>1</option>
                    <option>2</option>
                    
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="quantite">Quantite:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="quantite" id="quantite" placeholder="Enter quantite">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for=""description>Description:</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" name="description" id="description"></textarea>
            </div>
        </div>
        
        
        
        
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id" class="form-control" id="user_id" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" value="{{$offre->id}}" name="offre_id" class="form-control" id="offre_id" >
            </div>
        </div>
        
        

        

        <div class="form-group">
        <div class="col-sm-offset-10 col-sm-2 ">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        </div>
    </form

 </div>
@endsection