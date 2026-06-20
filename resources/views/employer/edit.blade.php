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
<form action="{{route('employer.update', $employer->id)}}" method="post">
    @csrf
    @method('PATCH')
<input type="text"
       name="company_name"
       value="{{ $employer->company_name }}">

<input type="text"
       value="{{ $employer->city }}"
       name="city">

<input type="text"
       value="{{ $employer->description }}"
       name="description">

<button type="submit" >Update</button>
</form>
</body>
</html>
