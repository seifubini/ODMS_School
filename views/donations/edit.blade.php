@extends('layouts.header')

@section('content')
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <div class="pull-left">
                <h2>Edit Donation Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('donations.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
    <form action="{{ route('donations.update', $donation->id) }}" enctype="multipart/form-data" method="POST" >
        @csrf
        @method('PUT')

        <div class="row col-md-12">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="donation_name" value="{{ $donation->donation_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="donation_description"
                        placeholder="Description">{{ $donation->donation_description }}</textarea>
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Location:</strong>
                    <input type="text" name="donation_location" value="{{ $donation->donation_location }}" class="form-control" placeholder="Location">
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
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