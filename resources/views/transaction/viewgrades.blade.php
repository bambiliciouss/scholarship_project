<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style type="text/css">
        html {
            overflow: auto;
        }
          
        html,
        body,
        div,
        iframe {
            margin: 0px;
            padding: 0px;
            height: 100%;
            border: none;
        }
          
        iframe {
            display: block;
            width: 100%;
            border: none;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    {{-- <iframe src="{{ asset('documents/'.$dataview->grades) }}" frameborder="0" height="100%" width="100%"></iframe> --}}

    <iframe src="{{ asset('GradesCopies/'.$dataview->grades_copy) }}"
            frameborder="0" 
            marginheight="0" 
            marginwidth="0" 
            width="100%" 
            height="100%" 
            scrolling="auto">
  </iframe>
</body>
</html>