@extends('layouts.app')

@section('title')
    <title>LaraPAY | Dashboard</title>
@endsection

@section('breadcrumb1')
    <h1 class="m-0 text-dark"> Dashboard</h1>
@endsection

@section('breadcrumb2')
    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
    <li class="breadcrumb-item">Summary</li>
@endsection

@section('content')
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-header">
              <h4 class="card-title"><b>Balance Summary</b></h4>
            </div>
            <div class="card-body">
              <h2>{{number_format($account->account_balance,2)}} <span>LKR</span></h2> 
              <span>{{$account->updated_at->format("Y-m-d h:i:s A ")}}</span>
            </div>
          </div>

        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title m-0">Transfer Money</h5>
            </div>
            <div class="card-body">
              <form action="{{route('payment-transfer')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Receiver Name <span class="text-danger">*</span></label>
                      <input type="text" name="receiver_name" class="form-control{{$errors->has('receiver_name') ? ' is-invalid' : ''}}" placeholder="Receiver Name">
                      @if ($errors->has('receiver_name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('receiver_name')}}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Receiver E-mail <span class="text-danger">*</span></label>
                      <input type="text" name="receiver_email" class="form-control{{$errors->has('receiver_email') ? ' is-invalid' : ''}}" placeholder="Receiver E-mail">
                      @if ($errors->has('receiver_email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('receiver_email')}}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Amount <span class="text-danger">*</span></label>
                      <input type="text" name="amount" class="form-control{{$errors->has('amount') ? ' is-invalid' : ''}}" placeholder="Amount">
                      @if ($errors->has('amount'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('amount')}}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Pay</button>
                  </div>
                </div>
              </form>
              
            </div>
          </div>

        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection