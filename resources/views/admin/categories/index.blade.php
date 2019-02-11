@extends('layouts.master')

@section('content')
<div class="container">

        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tr>  
                        
                        <td>Nom du Category</td>
                                               
                        <td>Action</td>
                  </tr>
                  @foreach($categories as $category)
                        <tr>
                            <td>{{$category->categoryName}}</td>
                                                     
                            <td>
                                <a href="{{route('categories.edit',$category->id)}}">Modiffier</a>
                               
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
@endsection