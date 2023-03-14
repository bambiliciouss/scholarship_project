<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Scholarship Mail</h3>
    {{-- <p>{{ $data['body'] }}</p> --}}
    @foreach ($data as $row)
    <p>{{ $row->fname }} {{ $row->lname }}</p>
    <p>Type of Scholarship: {{ $row->scho_name }} </p>
    <p> {{ $row->syear_semester }} </p>
        
    @endforeach
    
  
    <p>{{ $employee->fname }} {{ $employee->lname }}</p>




</body>
</html>