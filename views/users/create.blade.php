@extends('header')

@section('content')
<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Hello {{ Auth::user()->name}}, Please Finish Setting up Your Account Here </h3>
          </div>
          <div class="box-body">
            
            
    <!--<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
          
        </div>
    </div> -->

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
    <form action="{{ route('account.store') }}" enctype="multipart/form-data" method="POST" >
        @csrf

        <div class="row" >
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>User Name:</strong>
                    <input type="text" placeholder="{{ Auth::user()->name}}" class="form-control" disabled>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>User Email:</strong>
                    <input type="Email" placeholder="{{ Auth::user()->email}}" class="form-control" disabled>
                </div>
            </div>

            <div for="master-dropdown" class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                <label>Account Type:</label>
                <select id="master-dropdown" name="user_type" class="form-control select2" required style="width: 100%;">
                  <option value="company">Company</option>
                  <option value="donor">Donor</option>
                  <option value="donee">Donee</option>
                </select>
                </div>
            </div>

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

            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    
                    <input type="hidden" name="created_by" class="form-control" value="{{ Auth::user()->id}}" required>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection

          </div>
          <!-- /.box-body -->
        </div>

    