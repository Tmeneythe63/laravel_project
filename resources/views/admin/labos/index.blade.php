@extends('layouts.app')

@section('content')
<div class="container">

        <div class="row">
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
            
                
            
            
                    
                   
            
            
            

        </div>
    
    


</div>
@endsection