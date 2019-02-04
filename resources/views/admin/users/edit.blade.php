@extends('layouts.app')

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
    <form class="form-horizontal" role="form" action="{{route('users.update',$user->id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('PATCH')}}

    
    
    

        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 ">
            <button type="submit" class="btn btn-default">Valide</button>
        </div>
        </div>
    </form>
    </div>
    </div>

</div>
</div>
@endsection