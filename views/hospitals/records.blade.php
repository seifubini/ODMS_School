@extends('layouts.header')

@section('content')

@if( Auth::user()->is_admin )
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('records.create') }}" title="Go back"> <i class="fas fa-backward "></i> Add Record </a>
            </div>
        </div>
    </div>
@endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Hospital Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Doctor</th>
                  <th>Donee</th>
                  <th>Hospital</th>
                  <th>Description</th>
                </tr>
                </thead>
                
                <tbody>
                    @foreach ($records as $record)
                <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $record->first_name }}</td>
                <td>{{ $record->first_name }}</td>
                <td>{{ $record->name }}</td>
                <td>{{ $record->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection