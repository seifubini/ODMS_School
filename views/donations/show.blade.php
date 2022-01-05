@extends('layouts.header')


@section('content')
    <div class="row">
        <div class="col-lg-8 margin-tb">
            <br>
            <div class="pull-left">
                <h2> Donation Page for {{ $donation->donation_name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('donations.index') }}" title="Go back"> <i class="fas fa-backward "></i> Index</a>
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

    <div class="content">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Donee Name:</strong>
                {{ $donation->donation_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Case Description:</strong>
                {{ $donation->donation_description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                {{ $donation->donation_location }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created:</strong>
                {{ date_format($donation->created_at, 'jS M Y') }}
            </div>
        </div>
    </div>
    <div class="row content">
        <form action="{{ route('leave_feedback.store') }}" method="POST" >
        @csrf
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Leave Feedback:</strong>
                 <input type="text" name="feedback_detail" class="form-control" placeholder="Your Feedback here ...">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="feedback_by" class="form-control" value="{{ Auth::user()->id }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="feedback_to" class="form-control" value="{{ $donation->donation_created_by }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="donation_id" class="form-control" value="{{ $donation->id }}">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 ">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <br>
        @foreach ($feedbacks as $feedback)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Feedbacks:</strong>
                {{ $feedback->feedback_detail }}
                <p>by {{ $feedback->name }} </p>
            </div>
        </div>
        @endforeach
    </div>
@endsection