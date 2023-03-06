<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

 
</head>
<body>
    <table border="1px">
    <tr>
        <th>ID</th>
        <th>COR</th>
        <th>Grades</th>
    </tr>
     @foreach ($data as $datas )    
     <tr>

        <td>{{ $datas->docs_id}}</td>
        {{-- <td>{{ $datas->cor_file}}</td> --}}
        <td><a href="{{ url('/viewcor', $datas->docs_id) }}">{{ $datas->cor_file}}</a></td>
        <td><a href="{{ url('/viewgrades', $datas->docs_id) }}">{{ $datas->grades}}</a></td>
     </tr>



    @endforeach

</table>
</body>
</html>