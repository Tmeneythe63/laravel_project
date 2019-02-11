@extends('layouts.master')

@section('content')
<div class="container">

        <div class="row">
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
@endsection