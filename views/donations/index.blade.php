@extends('header')

@section('content')
   <!-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('donations.create') }}" title="Create a Donation"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div> -->

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="box col-xs-12 col-sm-12 col-md-12">
            <div class="box-header">
              <h3 class="box-title">Donation Advertisements</h3>
              @if( Auth::user()->is_admin || Auth::user()->user_type == 'donee')
              <div class="pull-right">
                <a class="btn btn-success" href="{{ route('donations.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i> Create New Avertisement
                    </a>
            </div>
            @endif
            </div>
    <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Location</th>
            <th>Created By</th>
            
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($donations as $donation)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $donation->donation_name }}</td>
                <td>{{ $donation->donation_description }}</td>
                <td>{{ $donation->donation_location }}</td>
                <td>{{ $donation->name }}</td>
                
                <td>
                    <form action="{{ route('donations.destroy', $donation->id) }}" method="POST">

                        <a href="{{ route('donations.show', $donation->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg">Show</i>
                        </a>
                        @if(Auth::user()->name == $donation->name)
                        <a href="{{ route('donations.edit', $donation->id) }}">
                            <i class="fas fa-edit  fa-lg">Edit</i>

                        </a>
                        @endif

                        @csrf
                        @method('DELETE')

                        <!--<button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button> -->
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
</div>


    

@endsection