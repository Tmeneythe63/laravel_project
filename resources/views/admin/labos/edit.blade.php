@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Labos / Modiffication 
        
      </h1>
      
</section>
<br>
<div class="container">
<div class="row">
    <div class="panel panel-default">
    <div class="panel-heading">Creation  de Labo</div>
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
    <form class="form-horizontal" role="form" action="{{route('labos.update',$labo->id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('PATCH')}}

        <div class="form-group">
            <label class="control-label col-sm-2" for="laboName">Labo Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="laboName" id="laboName" value="{{$labo->laboName}}">
            </div>
        </div> 
        <div class="form-group">
            <label class="control-label col-sm-2" for="user_id">User Responsable:</label>
            <div class="col-sm-10">
                <select class="form-control" name="user_id" id="user_id">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
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