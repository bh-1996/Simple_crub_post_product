@extends('layouts.main')
@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6"><h2>Manage <b>Post</b></h2></div>
                    <div class="col-sm-6">
                        <div class="btn-group" data-toggle="buttons">
                            <a href="{{ route('post.add') }}" class="btn btn-warning">Create Post</a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Post ID</th>
                        <th>Image</th>
                        <th>Post Name</th>
                        <th>Created&nbsp;On</th>
                        <th>Post Content</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($post as $s_no => $row )
                    <tr>
                        <td>{{ $s_no+1  ?? '' }}</td>
                        <td>{{ '#'.$row->id ?? '' }}</td>
                        <td style="text-align: center;">
                                        @if ($row->post_image)
                                        <img src="{{ asset('addimage/'.$row->post_image) }}" style="width: 50px; height:50px; border-radius:90px;">
                                        @else
                                        <img src="{{ asset('images/default-image-file.png') }}" style="width: 50px; height:50px; border-radius:90px;">
                                        @endif
                                    </td>
                        <td>{{ $row->post_name ?? '' }}</td>
                        <td>{{ $row->created_at ?? '' }}</td>
                        <td>{{ $row->post_content ?? '' }}</td>
                        <td> <td><a href="{{route('post.edit',$row->id)}}" class="btn btn-dark">Edit</a></td>
                        <td onclick="return confirm('Are you sure.? Do you want to Delete.!');"><a href="{{route('post.delete',$row->id)}}"
                            class="btn btn-danger">Delete</a></td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginator">
                            {!! $post->links() !!}
                        </div>
        </div> 
       
    </div>   
</div> 
@endsection
  