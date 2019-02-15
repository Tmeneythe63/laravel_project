@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
          Annonces / Don / Reponse
        
      </h1>
      
</section>


<br>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal" role="form" action="/offres/donstore" method="POST">
    {{csrf_field()}}
    
    
        
        

        <div class="form-group">
            <label class="control-label col-sm-2" for=""description>Commantaire:</label>
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
    </form>
    </div>
    </div>
 </div>
@endsection