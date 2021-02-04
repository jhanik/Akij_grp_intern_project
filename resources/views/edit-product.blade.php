@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')

<div class="container">
    <div class="inner-div">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2>Edit Product</h2>

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
</div>
            <div class="panel-body">
                <form id='editproduct_form' method="POST" action="{{route('updateproduct.page', $editproducts->id)}}" enctype="multipart/form-data">
                @method('PATCH') 
                   @csrf
                   

                   <div class="col-md-12 col-xs-12">
                        <div class="row">
                       
                            <div class="col-md-6 col-xs-12">
                                <div class=" card card-body card-header">
                                    <label for="id">Product ID</label>
                                    <input type="number"  class="form-control" id="id" value = "{{$editproducts->id}}">
                                </div>
                                <br>
                                <div class=" card card-body card-header">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" class="form-control" id="name"  value = "{{$editproducts->name}}" >
                                </div>
                                <br>
                                <div class="card card-body card-header">
                                    <label for="price">Price</label>
                                    <input type="number" name="price"  class="form-control" id="price" placeholder="Price"    value = "{{$editproducts->price}}">
                                </div>
                                <br>
                                
                                <div class="card card-body card-header">
                                    <label for="expire-date">Expire Date</label>
                                    <input type="date" name="expiredate" class="form-control" id="expire-date" value = "{{$editproducts->expiredate}}" >
                                </div>
                                <br>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 text-center">
                        <input type="submit" value="Submit" class="btn btn-success btn-lg">
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection