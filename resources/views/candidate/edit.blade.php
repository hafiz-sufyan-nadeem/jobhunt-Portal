<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
</head>
<body>
<form enctype="multipart/form-data" action="{{route('candidate.update', $candidate->id)}}" method="post">
    @csrf
    @method('PATCH')
    <input type="text"
           name="headline"
           value="{{ $candidate->headline }}">

    <input type="text"
           value="{{ $candidate->phone }}"
           name="phone">

    <input type="text"
           value="{{ $candidate->city }}"
           name="city">

    <input type="text"
           value="{{ $candidate->skills }}"
           name="skills">

    <input type="file"
           value="{{ $candidate->resume }}"
           name="resume">

    <button type="submit" >Update</button>
</form>
</body>
</html>
