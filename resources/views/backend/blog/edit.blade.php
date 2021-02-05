@extends('backend.layout.master')

@section('content')
<div class="container mt-5">
    <form action="{{url('/blog/'.$blog->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" value="{{ $blog->judul}}" name="judul" id="exampleFormControlInput1" placeholder="Judul">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Thumbnail</label>
            <textarea class="form-control @error('thumbnail')  is-invalid @enderror" id="exampleFormControlTextarea1" rows="2" name="thumbnail">{{ $blog->thumbnail}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Konten</label>
            <textarea class="form-control @error('konten')  is-invalid @enderror" id="exampleFormControlTextarea1" name="konten" rows="3">{{ $blog->konten}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control @error('status')  is-invalid @enderror"  name="status" id="exampleFormControlSelect1">
              <option value="">Pilih Status</option>
              <option value="Show" {{ $blog->status == 'Show' ? 'selected' : ''}}>Show</option>
              <option value="Hide" {{ $blog->status == 'Hide' ? 'selected' : ''}}>Hide</option>
            </select>
          </div>
          <button type="submit" class="btn btn-info">Simpan</button>
    </form>
</div>
@endsection
