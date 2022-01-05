@extends('header')

@section('content')
<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Hello Add Your Hospital here </h3>
          </div>
          <div class="box-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('hospitals.store') }}" enctype="multipart/form-data" method="POST" >
        @csrf

        <div class="row" >

            <div>
            <div for="dependent-dropdown" class="col-xs-8 col-sm-8 col-md-8">
                <div id="dependent-dropdown" class="form-group">
                    <strong>Hospital Name:</strong>
                    <input type="text" id="dependent-dropdown" name="name" class="form-control" placeholder="Hospital Name" required>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div id="otherField" class="form-group">
                    <strong>Hospital Email:</strong>
                    <input type="Email" name="email" class="form-control" placeholder="Hospital Email" >
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Hospital Address:</strong>
                    <input type="text" name="address" class="form-control" placeholder="Hospital Address" >
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" required>
                </div>
            </div>
        </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    
                    <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id}}" required>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection