<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student Registration</title>
    <style>
        body {
            background-color: '#ddd';
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="/" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input name="mycsv" type="file" class="form-control" id="" aria-label="Upload">
                <input class="btn btn-outline-secondary" type="submit" value="UPLOAD" />
            </div>
        </form>
    </div>
</body>
</html>
