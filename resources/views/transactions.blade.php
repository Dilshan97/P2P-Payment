@extends('layouts.app')

@section('title')
    <title>LaraPAY | Accounts</title>
@endsection

@section('breadcrumb1')
    <h1 class="m-0 text-dark"> Accounts</h1>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item">Transactions</li>
@endsection

@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="example1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
            
                            <tbody>
                                @foreach ($transactions as $key => $transaction)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$transaction->updated_at->format('Y-m-d')}} </td>
                                        <td>Transaction</td>
                                        <td>{{number_format($transaction->amount,2)}} LKR</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   

@endsection