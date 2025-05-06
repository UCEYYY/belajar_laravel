<h1>Daftar Post</h1>

<a href="{{ route('posts.create') }}">Tambah Post</a>

@if (session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

@if ($posts->count())
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}">Show</a>
                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>Tidak ada post.</p>
@endif
