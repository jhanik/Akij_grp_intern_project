@extends('layouts.app')
@section('title', 'Products')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="inner-div">
    <div class="panel panel-default">
      <div class="panel-heading text-success">
        <h1>Products</h1>
      </div>
      <div class="col-sm-12">
            
            @if ($errors->any())
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  
      @if(Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Success!</strong> {{ Session::get('message', '') }}
    </div>
    
@endif
</div>
      <div>
           <form id='filter_form' class="float-left" method="POST" action="{{route('products.page')}}" enctype="multipart/form-data">
                @csrf
                
                <label for="price">Filter By Price</label>
                                    <input type="number" name="price" class="form-control" id="price" placeholder="Price" onchange='this.form.submit()'>

                                     
                                      </form>       
        <a href="/add-product" target="_blank"><button class="float-right btn btn-success">Add Product</button><br><br></a>
        <table class="table table-responsive-xs table-responsive-sm table-responsive-md table-responsive-lg">
            <thead class="thead-light">
              <tr>
              <th scope="col" id="id-col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Expire Date</th>
                <th scope="col" id="action-col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
              <tr>
              <th scope="row">{{$product->id}}</th>
                 <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->expiredate}}</td>
                <td>
                    <a href="/view-product/{{$product->id}}"><i class="fas fa-search-plus fa-2x text-success" title="View Product Details"></i></a>
                    <a href="/edit-product/{{$product->id}}"><i class="far fa-edit fa-2x text-info" title="Edit Product"></i></a>
                    <a href="/products/{{$product->id}}" onclick="return confirm('Are you sure to delete this product?')" title="Delete Product"><i class="far fa-trash-alt fa-2x text-danger"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
    {!! $products->links() !!}
      </div>
    </div>
  </div>
</div>

@endsection