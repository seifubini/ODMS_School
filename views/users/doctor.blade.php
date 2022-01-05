@extends('layouts.header')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="box col-xs-8 col-sm-8 col-md-8">
            <div class="box-header">
              <h3 class="box-title">Doctors</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Specialization</th>
                  <th>Phone Number</th>
                  <th>Hospital</th>
                </tr>
                </thead>
                
                <tbody>
                    @foreach ($doctors as $doctor)
                <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->specialization }}</td>
                <td>{{ $doctor->phone_number}}</td>
                <td>{{ $doctor->hospital_name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection