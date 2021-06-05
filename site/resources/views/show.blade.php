<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-center text-success bg-dark">BALANCE</div>
        <div class="col-auto">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <td>VALUE</td>
                    <td>BALANCE</td>
                    <td>USER</td>
                </tr>
                </thead>
                <tbody>
                @forelse($balance['result'] as $record)
                    <tr>
                        <td>{{ $record['value'] }}</td>
                        <td>{{ $record['balance'] }}</td>
                        <td>{{ $record['user']['name'] }} ({{ $record['user']['email'] }})</td>
                    </tr>
                @empty
                    <p>No replies</p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="d-flex justify-content-center text-info bg-dark">HISTORY</div>
        <div class="col-auto">
            <table class="table table-responsive table-striped">
                <thead>
                <tr>
                    <td>VALUE</td>
                    <td>BALANCE</td>
                    <td>DATE</td>
                </tr>
                </thead>
                <tbody>
                @forelse($history['result'] as $record)
                    <tr>
                        <td>{{ $record['value'] }}</td>
                        <td>{{ $record['balance'] }}</td>
                        <td>{{ $record['created_at'] }}</td>
                    </tr>
                @empty
                    <p>No replies</p>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
