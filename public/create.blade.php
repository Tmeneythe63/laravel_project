@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="panel panel-default">
    <div class="panel-heading">Creation  de Offre</div>
    <div class="panel-body">
    
    <form class="form-horizontal" role="form">
        
    <div class="form-group">
            <label class="control-label col-sm-2" for="sel1">Type Offre:</label>
            <div class="col-sm-10">
                <select class="form-control" id="sel1">
                    
                    <option>Offre</option>
                    <option>Demande</option>
                    
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="sel1">Type Enonce:</label>
            <div class="col-sm-10">
                <select class="form-control" id="sel1">
                    <option>Changement</option>
                    <option>Don</option>
                    
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for=""description>Description:</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" id="description"></textarea>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="refProduit">Ref Produit:</label>
            <div class="col-sm-10">
                <select class="form-control" id="refProduit">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="quantite">Quantite:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="quantite" placeholder="Enter quantite">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="dateExp">DateExp:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="dateExp" placeholder="Enter DateExp">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="img">Selectioner Image:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="img" >
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