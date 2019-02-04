@foreach ($produits as $produit) 
    {{$produit->produitName}}
    {{$produit->pivot->quantite}} 
@endforeach