@extends('layouts.app')

@section('content')
<div class="container">

        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tr>  
                        
                        <td>Utilisateurs</td>
                        <td>Email</td>
                                               
                        <td>Action</td>
                  </tr>
                  @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                                                     
                            <td>
                                @if($user->aproved)
                                    Aproved
                                @else
                                <a href="{{route('users.edit',$user->id)}}">Aprove</a>
                                @endif
                                
                                
                               
                                <form action="{{route('users.destroy',$user->id)}}" method="post">
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