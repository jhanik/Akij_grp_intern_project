@extends('layouts.app')
@section('title', 'View Product')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading text-success">
        <h2>Product Details</h2>
    </div>
    <div>
        <table class="view-page table table-striped table-responsive-xs table-responsive-sm table-responsive-md table-responsive-lg">
            @foreach($singleproducts as $singleproduct)

            <tr>
                <th>Product ID</th>
                <td>{{$singleproduct->id}}</td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td>{{$singleproduct->name}}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{$singleproduct->price}}</td>
            </tr>
            <tr>
                <th>Expire Date</th>
                <td>{{$singleproduct->expiredate}}</td>
            </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection