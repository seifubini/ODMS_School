@extends('layouts.header')

@section('content')

<div class="row">
        <div class="col-lg-8 margin-tb">
            
            
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="box col-xs-8 col-sm-8 col-md-8">
            <div class="box-header">
              <h3 class="box-title">Banks and Accounts</h3>
              <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('banks.index') }}" title="Go back"> <i class="fas fa-backward "></i> Add Bank</a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  
                  <th>Phone Number</th>
                  <th>Action</th>
                </tr>
                </thead>
                
                <tbody>
                    @foreach ($banks as $bank)
                <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $bank->name }}</td>
                
                <td>{{ $bank->phone_number }}</td>
                <td>
                  <a href="{{ route('banks.show', $bank->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg">Show</i>
                        </a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection