<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Platinum Registration</title>
</head>
<body>
    <h1>Edit Platinum Registration</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('platinum.update', ['platinum' => $platinum])}}">
        @csrf 
        @method('put')
        <div>
            <label>Registration Type</label>
            <input type="text" name="registration_type" placeholder="Registration Type" value="{{$platinum->registration_type}}" />
        </div>
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" value="{{$platinum->title}}" />
        </div>
        <div>
            <label>Full Name</label>
            <input type="text" name="full_name" placeholder="Title" value="{{$platinum->full_name}}" />
        </div>
        <div>
            <label>Gender</label>
            <input type="text" name="gender" placeholder="Title" value="{{$platinum->gender}}" />
        </div>

        <div>
            <label>Education Level</label>
            <input type="text" name="edu_level" placeholder="Title" value="{{$platinum->edu_level}}" />
        </div>

        <div>
            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="Title" value="{{$platinum->phone}}" />
        </div>
        <!-- Add other input fields for editing platinum registration -->

        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>
