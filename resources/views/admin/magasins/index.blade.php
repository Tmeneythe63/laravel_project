@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Magasins
        
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
                        
                        <td>Nom du Magasin</td>
                                               
                        <td>Action</td>
                  </tr>
                  @foreach($magasins as $magasin)
                        <tr>
                            <td>{{$magasin->magasinName}}</td>
                                                     
                            <td>
                                <a href="{{route('magasins.edit',$magasin->id)}}">Modiffier</a>
                               </td>
                               <td>
                                <form action="{{route('magasins.destroy',$magasin->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                  @endforeach
                </table>
            </div> 
            {{ $magasins->links() }}
                          
        </div>
        </div>
        </div>
    
    


</div>
@endsection