@extends('layout.main')

@section('title', 'product list Page')
@section('main-section')
<div class="container mt-5">
  <h1 class="text-center mb-3 text-decoration-underline" >
   All Products
  </h1>
    <table class="text-center table table-bordered table-striped">
       
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Drescription</th>
            <th>Price</th>
            <th>Quentity</th>
           
        </tr>
      
        
        @php $count = 1; @endphp
      @foreach ($data as $values) 
          <tr>
            <td>{{$count}}</td>
          <td>{{$values->name}}</td> 
            <td>{{$values->description}}</td>
            <td>{{$values->price}}</td>
            <td>{{$values->quantity}}</td>
        </tr>   
       @php $count++; @endphp 
        @endforeach  
    </table>
</div>


@endsection