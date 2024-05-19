<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Platinum Registrations</title>
</head>
<body>
    <h1>Platinum Registrations</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{ route('platinum.create') }}">Create a Platinum Registration</a>
        </div>
        <table border="1">
            <tr>
                <th>Type Of Registration</th>
                <th>Title</th>
                <th>Full Name</th>
                <th>gender</th>
                <th>Education Level</th>
                <th>Phone number</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            @foreach($platinums as $platinum )
                <tr>
                    <td>{{ $platinum->registration_type }}</td>
                    <td>{{ $platinum->title }}</td>
                    <td>{{ $platinum->full_name }}</td>
                    <td>{{ $platinum->gender}}</td>
                    <td>{{ $platinum->edu_level }}</td>
                    <td>{{ $platinum->phone }}</td>
                    <td>
                        <a href="{{route('platinum.edit', ['platinum' => $platinum]) }}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('platinum.destroy', ['platinum' => $platinum])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
