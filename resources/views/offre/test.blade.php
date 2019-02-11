{{hello}}


<form action="/offre/{{$offre->id}}" method="POST">
                    {{csrf_field()}}
                    
                    {{method_field('DELETE')}}
                    <button type="submit">Delete</button>
                    </form>