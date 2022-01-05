@extends('layouts.header')

@section('content')
   <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> -->

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="box col-xs-8 col-sm-8 col-md-8">
            <div class="box-header">
              <h3 class="box-title">Donees</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>Email</th>
                </tr>
                </thead>
                
                <tbody>
                    @foreach ($users as $user)
                <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name}}</td>
                <td>{{ $user->gender}}</td>
                <td>{{ $user->phone_no }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection