@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        List des Utilisateurs
        
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
                                <a href="{{route('users.aprove',$user->id)}}">Aprove</a>
                                @endif
                            </td>
                            <td>
                               
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
            {{ $users->links() }}
                
            
            
                    
                   
            
           </div>
           </div> 
            

        </div>
    
    


</div>
@endsection