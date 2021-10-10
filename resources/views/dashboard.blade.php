<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>IP</title>
    </head>
    <body>
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">Time Visited</th>
                <th scope="col">I.P. Address</th>
                <th scope="col">Device</th>
                <th scope="col">Operating System</th>
                <th scope="col">Browser</th>
                <th scope="col">Estimated Location</th>
                <th scope="col">Dump</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($visits as $visit)
                    <tr>
                    <td>{{ $visit->created_at }}</td>
                    <td>{{ $visit->ip }}</td>
                    <td>{{ $visit->device }}</td>
                    <td>{{ $visit->os }}</td>
                    <td>{{ $visit->browser }}</td>
                    <td>{{ $visit->location }}</td>
                    <td>{{ $visit->request_dump }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
