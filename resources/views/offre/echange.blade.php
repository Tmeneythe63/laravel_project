@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Annonces / Echange / Reponse
        
      </h1>
      
</section>

<br>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<div class="row">
    <form class="form-horizontal" role="form" action="/offres/echangestore" method="POST">
        {{csrf_field()}}
        
        <div class="form-group">
        
                <label class="control-label col-sm-2" >Echanger par:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="produitEchangeID" >
                            
                        @foreach($produits as $produit)
                        <option value="{{$produit->id}}">{{$produit->produitName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" >Quantite:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="quantite"  placeholder="Enter quantite">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="description"description>Description:</label>
                <div class="col-sm-10">
                <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                </div>
            </div>
            
            
            
            
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id" class="form-control" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="hidden" value="{{$offre->id}}" name="offre_id" class="form-control" >
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
 </div>
@endsection