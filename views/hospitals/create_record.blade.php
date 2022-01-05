@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Hospital Record</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('records.index') }}" title="Go back"> <i class="fas fa-backward "></i> Back</a>
            </div>
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
    <form action="{{ route('records.store') }}" enctype="multipart/form-data" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <label>Donee Name:</label>
                <select name="donee_id" class="form-control select2" required style="width: 100%;">
                    @foreach($donees as $donee)
                  <option value="{{$donee->id}}">{{$donee->name}}</option>
                  @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <label>Hospital Name:</label>
                <select name="hospital_id" class="form-control select2" required style="width: 100%;">
                    @foreach($hospitals as $hospital)
                  <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                  @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <label>Doctor Name:</label>
                <select name="doctor_id" class="form-control select2" required style="width: 100%;">
                    @foreach($doctors as $doctor)
                  <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                  @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="description"
                        placeholder="Description"></textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="donation_created_by" class="form-control" value="{{ Auth::user()->id }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection