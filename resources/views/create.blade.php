<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Judul" value="{{ old('title') }}">
    @error('title')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <textarea name="content" placeholder="Konten">{{ old('content') }}</textarea>
    @error('content')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <input type="file" name="gambar">
    @error('gambar')
        <div style="color:red;">{{ $message }}</div>
    @enderror

    <button type="submit">Simpan</button>
</form>
