@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card">
        <div class="card-header">
            Products trong Cart
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getName() }}</td>
                            <td>${{ $product->getPrice() }}</td>
                            <td>{{ session('products')[$product->getId()] }}</td>
                            <td>
                                <a href="{{ route('cart.delete-single', ['id' => $product->getId()]) }}" class="btn btn-danger">
                                    <i class="bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="text-end">
                    <a class="btn btn-outline-secondary mb-2"><b>Total of price:</b> ${{ $viewData['total'] }}</a>
                    <a class="btn bg-primary text-white mb-2">Checkout</a>
                    <a class="btn btn-danger mb-2" href="{{ route('cart.delete') }}" onclick="return confirm('Please confirm before deleting')">
                        Delete my cart
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
