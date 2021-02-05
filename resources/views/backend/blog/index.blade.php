@extends('backend.layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <a href="{{url('/blog/create')}}">
                    <button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
                </a>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table">
                <tr>
                    <th>
                        Judul
                    </th>
                    <th>
                        Thumbnail
                    </th>
                    <th>
                        Tanggal Publish
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
                @foreach ($data as $dt)
                    <tr>
                        <td>{{ $dt->judul }}</td>
                        <td>{{ $dt->thumbnail }}</td>
                        <td>{{ $dt->created_at }}</td>
                        <td class="">
                            <a href="{{ url('/blog/'.$dt->id.'/edit')}}"><button class="btn btn-sm btn-success d-inline">Edit</button></a>
                            <form class="d-inline" action="{{ url('/blog/'.$dt->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" value="{{$dt->id}}" readonly>
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button></td>
                            </form>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
