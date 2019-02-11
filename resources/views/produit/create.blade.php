@extends('layouts.master')

@section('content')
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
    <form class="form-horizontal" role="form" action="/produit" method="POST">
    {{csrf_field()}}
    
    
        <div class="form-group">
            <label class="control-label col-sm-2" for="produitName">Designation:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="produitName" id="produitName" placeholder="Enter Designation">
            </div>
        </div> 

        
        <div class="form-group">
            <label class="control-label col-sm-2" for="formuleChimique">Formule Chimique:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="formuleChimique" id="formuleChimique" placeholder="Enter formuleChimique">
            </div>
        </div> 
        <div class="form-group">
            <label class="control-label col-sm-2" for="unite">Unite:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="unite" id="unite" placeholder="Enter unite">
            </div>
        </div> 
        <div class="form-group">
            <label class="control-label col-sm-2" for="quantite">Quantite:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="quantite" id="quantite" placeholder="Enter Quantite">
            </div>
        </div>

        

        
         
        <div class="form-group">
            <label class="control-label col-sm-2" for="dateExp">DateExp:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="dateExp" id="dateExp" placeholder="Enter DateExp">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="category_id">Category:</label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                @endforeach
                </select>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" value="{{Auth::user()->id}}"  name="user_id" class="form-control" >
            </div>
        </div>
        
        
   
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" value="{{$produitID->id+1}}"class="form-control" name="produitID" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" value="{{$magasinID->id}}" class="form-control" name="magasinID" >
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