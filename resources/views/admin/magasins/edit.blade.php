@extends('layouts.master')

@section('content')
<div class="container">
<div class="row">
    <div class="panel panel-default">
    <div class="panel-heading">Creation  de Magasin</div>
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
    <form class="form-horizontal" role="form" action="{{route('magasins.update',$magasin->id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('PATCH')}}

        <div class="form-group">
            <label class="control-label col-sm-2" for="magasinName">Magasin Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="magasinName" id="magasinName" value="{{$magasin->magasinName}}">
            </div>
        </div> 
        <div class="form-group">
            <label class="control-label col-sm-2" for="labo_id">Labos:</label>
            <div class="col-sm-10">
                <select class="form-control" name="labo_id" id="labo_id">
                @foreach($labos as $labo)
                <option value="{{$labo->id}}">{{$labo->laboName}}</option>
               @endforeach
                </select>
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