@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Categories 
        
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
                        
                        <td>Nom du Category</td>
                                               
                        <td >Action</td>
                  </tr>
                  @foreach($categories as $category)
                        <tr>
                            <td>{{$category->categoryName}}</td>
                                                     
                            <td>
                                <a href="{{route('categories.edit',$category->id)}}">Modiffier</a>
                            </td>
                            <td>
                                <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                  @endforeach
                </table>
            </div> 
            {{ $categories->links() }}
                
            
            
                    
                   
            
          </div>
          </div>  
            

        </div>
    
    


</div>
@endsection