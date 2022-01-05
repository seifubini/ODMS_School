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

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Donation Posts</h3>
              <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i> Create New Post
                    </a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Detail</th>
                  <th>Location</th>
                  <th>Date Created</th>
                  <th>Created By</th>
                  <th width="280px"> Action</th>
                </tr>
                </thead>
                
                <tbody>
                    @foreach ($posts as $post)
                <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->detail }}</td>
                <td>{{ $post->location }}</td>
                <td>{{ date_format($post->created_at, 'jS M Y') }}</td>
                <td>{{ $post->created_by }} </td>
                <td> 
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">

                        <a href="{{ route('posts.show', $post->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>Show
                        </a>

                        <a href="{{ route('posts.edit', $post->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>Edit

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>Delete

                        </button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    {!! $posts->links() !!}

@endsection