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
    <div class="row">
        <div class="container py-7">
            <h2 class="text-center"><a href="{{ route('scores.index') }}">CRUD Laravel 7</a></h2>
            <div class="card col-12">
                <div class="card-body">
                    <h2>Add a score</h2>
                    <div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="post" action="{{ route('scores.store') }}">
                            <!-- @csrf -->
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="student_id">Student ID:</label>
                                <select type="text" class="form-control" name="student_id">
                                    <option value="">Select Name</option>
                                    @foreach ($student as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label for="subject_id">Subject ID:</label>
                                <select name="subject_id" id="" class="form-control">
                                    <option value="">Select Subject</option>
                                    @foreach ($subject as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="score">Score:</label>
                                <input type="number" class="form-control" name="score" placeholder="Enter Score"/>
                            </div>

                            <button type="submit" class="btn btn-primary">Add score</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
