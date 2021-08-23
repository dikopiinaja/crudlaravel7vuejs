<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Score</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="container py-7">
    <h2 class="text-center p-8">CRUD Laravel 7</h2>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary float-right" href="{{ route('scores.create') }}">Tambah Data</a>
                <h2>Data Scores</h2>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                &nbsp;
                <div class="row">
                    <table class="table table-hover">
                        <tr>
                            <td>No.</td>
                            <td>Student</td>
                            <td>Subject</td>
                            <td>Score</td>
                            <td>Action</td>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($scores as $score)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $score->name }}</td>
                            <td>{{ $score->name_subject }}</td>
                            <td>{{ $score->score }}</td>
                            <td>
                                <form action="{{ route('scores.destroy',$score->id) }}" method="POST">
                
                                    <a class="btn btn-info" href="{{ route('scores.show',$score->id) }}">Tampil</a>
                    
                                    <a class="btn btn-primary" href="{{ route('scores.edit',$score->id) }}">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <!-- { $scores->links() } -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
