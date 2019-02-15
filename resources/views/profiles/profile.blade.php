@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Utilisateurs / Modiffier un Profile
        
      </h1>
      
</section>
<br>
<div class="container">
<div class="row">
    <div class="panel panel-default">
    
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
    
      
    
    
        @if($user->profile)

        <form class="form-horizontal" role="form" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    
    <div class="form-group">
            
       
        <div class="form-group">
            <label class="control-label col-sm-2" for="about">About:</label>
            <div class="col-sm-10">
                <input type="text" value="{{$user->profile->about}}"  name="about" class="form-control" id="about">
            </div>
        </div>
    
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="avatar">Selectioner Image:</label>
            <div class="col-sm-10">
                <input type="file" name="avatar" class="form-control-file" id="avatar" >
            </div>
        </div>


        <div class="form-group">
        <div class="col-sm-offset-10 col-sm-2 ">
            <button type="submit" class="btn btn-default">Ajouter</button>
        </div>
        </div>
    </form>

        @else

        @endif

    </div>
    </div>

</div>
</div>
@endsection