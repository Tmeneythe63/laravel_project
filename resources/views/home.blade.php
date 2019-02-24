@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Tableau de bord
        
      </h1>
      
</section>
<div class="container">

    <div class="row">
        
            <div class="panel panel-default">
                

                <div class="panel-body">
                @guest
                           <!--  <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                       -->
                       
                @else
    
                    @if(Auth::user()->admin)
                        <!--  Tableau de bore pour l'admin -->

                        <h1>Bienvenu l'admin  <b>{{Auth::user()->name}}</b></h1>

                        <!-- Fin Tableau de bore pour l'admin -->
                    @else
                   

                        <!--  Tableau de bore pour l'utilisateur non admin -->
                        
                            <h1>Bienvenu l'utilisateur  <b>{{Auth::user()->name}}</b></h1>

                        <!-- Fin Tableau de bore pour l'utilisateur non admin -->
                    
                    @endif
         
                 @endguest
                        
                    
                </div>
            
        </div>
    </div>
</div>
@endsection
