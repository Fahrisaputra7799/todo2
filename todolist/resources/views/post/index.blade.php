<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist Crypto</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightblue">



    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Todo List</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{route('posts.create') }}" class="btn btn-md btn-success mb-3">Add</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                     <td>{{ $post->title }}</td> 
                                     <td>{!! $post->content !!}</td> 
                                    <td class="text-center">
                                        <form onsubmit="return confirm ('Mau Menyala...?');" action="{{route('posts.destroy', $post->id)}}" method="POST">
                                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-dark">Show</a>
                                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-dark">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-small btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Tidak Ada Data Yang Valid Brooo...
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center my-5">
        <h2 class="text-3xl">⚡️⚡️Menyala⚡️⚡️</h2>
    </div>
                               

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session()->has('succes'))
        toastr.success('{{session('success') }}', 'success !');
        @elseif (session()->has('error'))
        toastr.error('{{session('error')}}', 'failed !');
        @endif
    </script>

</body>

</html>