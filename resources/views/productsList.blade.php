@extends('layout.main')

@section('title', 'product list Page')
@section('main-section')
<div class="container mt-5">
<a href="#"><button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
    data-bs-target="#exampleModal">
    Add Product
</button></a>
<table class="text-center table table-bordered table-striped">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Drescription</th>
        <th>Price</th>
        <th>Quentity</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    @php $count = 1 @endphp
  @foreach ($data as $values)
  
    <tr>
     
        <td>{{$count}}</td>
        <td>{{$values->name}}</td>
        <td>{{$values->description}}</td>
        <td>{{$values->price}}</td>
        <td>{{$values->quantity}}</td>
        <td>
            <a href="#">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                 data-bs-target="#exampleModal2{{$values->id}}">Update</button>
            </a> 
        </td>
        <td>

            <a href="{{route('productsDelete',$values->id)}}" >
                <button type="button" class="btn btn-danger "
                    onclick="return confirm('Are you sure you want to delete your account?')">Delete</button>
            </a>
            
        </td>
    </tr> 

    
{{-- update product --}}

<div class="modal fade" id="exampleModal2{{$values->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('productsUpdate') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$values->id}}">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name"
                                value="{{$values->name}}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="product_description" class="form-label">Description</label>
                            <input type="text" name="product_description" class="form-control" id="product_description"
                                value="{{$values->description}}">
                        </div>

                        <div class="mb-3">
                            <label for="product_quantity" class="form-label">Quantity</label>
                            <input type="text" name="product_quantity" class="form-control" id="product_quantity"
                                value="{{$values->quantity}}">
                        </div>

                        <div class="mb-3">
                            <label for="product_price" class="form-label">Price</label>
                            <input type="text" name="product_price" class="form-control" id="product_price"
                                value="{{$values->price}}">
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

    @php $count++ @endphp
    @endforeach 
</table>


{{-- add product --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('productsAdd')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name"
                                value="{{old('product_name')}}">
                                <span class="text-danger">
                                    @error('product_name')
                                    {{$message}}
                                    @enderror
                                </span>
                        </div>
                        
                        <div class="mb-3">
                            <label for="product_description" class="form-label">Description</label>
                            <input type="text" name="product_description" class="form-control" id="product_description"
                                value="{{old('product_description')}}">
                                <span class="text-danger">
                                    @error('product_description')
                                    {{$message}}
                                    @enderror
                                </span>
                        </div>

                        <div class="mb-3">
                            <label for="product_quantity" class="form-label">Quantity</label>
                            <input type="text" name="product_quantity" class="form-control" id="product_quantity"
                                value="{{old('product_quantity')}}">
                                <span class="text-danger">
                                    @error('product_quantity')
                                    {{$message}}
                                    @enderror
                                </span>
                        </div>

                        <div class="mb-3">
                            <label for="product_price" class="form-label">Price</label>
                            <input type="text" name="product_price" class="form-control" id="product_price"
                                value="{{old('product_price')}}">
                                <span class="text-danger">
                                    @error('product_price')
                                    {{$message}}
                                    @enderror
                                </span>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection