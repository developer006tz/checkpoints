<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
          integrity="sha512-7d75Rsp9DbvAt8ItBRWx74re+kwJohFUEpURPVnKh5w5G5HtL5im9g5YJyQfM1AxGmJN/iN+vjgUTzZD98Bc0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <title>Error Logs</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4">Error Logs</h1>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Time</th>
                    <th scope="col">Level</th>
                    <th scope="col">Message</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log['time'] }}</td>
                        <td>{{ $log['level'] }}</td>
                        <td>{{ $log['message'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
        integrity="sha512-hfhYJ0twFzxNJriXg2C0vEaJLHhGCKl8gOJ18zvDk/1bHemjLXinxtTWIICypZG87NbxPyC+lHd8/FNp/1yjLg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
