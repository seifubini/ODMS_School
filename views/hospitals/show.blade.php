@extends('header')

@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif 

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $hospital->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hospitals.index') }}" title="Go back"> <i class="fas fa-backward "></i> Index</a>
            </div>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hospital Name:</strong>
                {{ $hospital->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hospital Address:</strong>
                {{ $hospital->address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hospital Email:</strong>
                {{ $hospital->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hospital Phone:</strong>
                {{ $hospital->phone_number }}
            </div>
        </div>
        
    </div>

    <div class="row">
    	<div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Add a Doctor to Your Hospital </h2>
            </div>
            
        </div>
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
    <form action="{{ route('doctor.store') }}" method="POST" >
        @csrf

        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <label>Select Usaer:</label>
                <select name="user_id" class="form-control select2" required style="width: 100%;">
                @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
                </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Specialization:</strong>
                    <input type="text" name="specialization" class="form-control" placeholder="Specialization">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="created_by" class="form-control" value="{{ Auth::user()->id }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="hospital_name" class="form-control" value="{{ $hospital->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
    </div>
@endsection