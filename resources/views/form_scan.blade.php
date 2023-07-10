<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Scan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        .container {
            max-width: 500px;
        }
        
        .response {
            padding: 25px;
            max-width: 500px;
            position: relative;
            font-size: 13px;
        }

        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <form action="{{route('scan', ['is_view' => 1])}}" method="post" enctype="multipart/form-data">
            <h3 class="text-center mb-5">Upload File in Laravel</h3>
            @csrf
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
    </div>
    
    @isset($response)
        <pre>
            <div class="response">
                {{ json_encode(json_decode($response), JSON_PRETTY_PRINT) }}
            </div>
        </pre>
    @endisset
</body>

</html>