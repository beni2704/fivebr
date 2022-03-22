@extends('layout')

@section('title', 'Transactions')

@section('content')
    <div style="padding:2% 10%">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Seller name</th>
                    <th scope="col">Gig Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Transaction Date</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td scope="row">{{$transaction->gig->user->name}}</td>
                    <td scope="row">{{$transaction->gig->name}}</td>
                    <td>{{$transaction->type}}</td>
                    <td>${{$transaction->price}}</td>
                    <td scope="row">{{$transaction->transaction_date}}</td>
                    <td><a style="color:green" href="/gig/{{$transaction->gig->id}}">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
