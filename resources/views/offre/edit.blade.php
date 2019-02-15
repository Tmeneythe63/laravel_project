@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Anonces / Modiffier un Anocer
        
      </h1>
      
</section>
<br>
<div class="container">
<div class="row">
    <div class="panel panel-default">
    <div class="panel-heading">Creation  de Offre</div>
    <div class="panel-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form class="form-horizontal" role="form" action="{{route('offre.update',$offre->id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div class="form-group">
            <label class="control-label col-sm-2" for="typeOffre">Type Offre:</label>
            <div class="col-sm-10">
                <select  class="form-control"  id="typeOffre" name="typeOffre">
                    
                    <option>Offre</option>
                    <option>Demande</option>
                    
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="typeEnonce" >Type Enonce:</label>
            <div class="col-sm-10">
                <select class="form-control" id="typeEnonce" name="typeEnonce">
                    <option>Changement</option>
                    <option>Don</option>
                    
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for=""description>Description:</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" id="description" name="description">{{$offre->description}} </textarea>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="produit_id">Ref Produit:</label>
            <div class="col-sm-10">
                <select class="form-control" id="produit_id" name="produit_id">
                    @foreach($produits as $produit)
                    <option value="{{$produit->id}}">{{$produit->produitName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="quantite">Quantite:</label>
            <div class="col-sm-10">
                <input type="text" value="{{$offre->quantite}}"  name="quantite" class="form-control" id="quantite" placeholder="Enter quantite">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id" class="form-control" id="user_id" >
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="img">Selectioner Image:</label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control-file" id="img" >
            </div>
        </div>


        <div class="form-group">
        <div class="col-sm-offset-10 col-sm-2 ">
            <button type="submit" class="btn btn-default">Ajouter</button>
        </div>
        </div>
    </form>
    </div>
    </div>

</div>
</div>
@endsection