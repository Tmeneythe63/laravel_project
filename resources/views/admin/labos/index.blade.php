@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Labos
        
      </h1>
      
</section>
<br>
<div class="container">

        <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tr>  
                        
                        <td>Nom du Labo</td>
                                               
                        <td>Action</td>
                  </tr>
                  @foreach($labos as $labo)
                        <tr>
                            <td>{{$labo->laboName}}</td>
                                                     
                            <td>
                                <a href="{{route('labos.edit',$labo->id)}}">Modiffier</a>
                            </td>
                            <td>
                                <form action="{{route('labos.destroy',$labo->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                  @endforeach
                </table>
            </div> 
            {{ $labos->links() }}
                
            
            
                    
                   
          </div>  
          </div>
            
            

        </div>
    
    


</div>
@endsection