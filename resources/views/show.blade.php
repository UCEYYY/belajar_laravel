<h1>{{ $post->title }}</h1>

@if ($post->gambar)
    <p>
        <img src="{{ asset('images/' . $post->gambar) }}" alt="{{ $post->title }}" width="300">
    </p>
@endif

<p>{{ $post->content }}</p>

<a href="{{ route('index') }}">← Kembali ke daftar</a>
