<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ToDo App</title>
    </head>
    <body>
        <table>
            <thead>
            <tr>
              <th>id</th>
              <th>title</th>
              <th>description</th>
              <th>status</th>
              <th>created_at</th>
              <th>updated_at</th>
            </tr>
            </thead>
            <tbody>
                @forelse($data as $todo)
                <tr>
                <td>{{$todo->id}}</td>
                <td>{{$todo->title}}</td>
                <td>{{$todo->description}}</td>
                <td>{{$todo->status}}</td>
                <td>{{$todo->created_at}}</td>
                <td>{{$todo->updated_at}}</td>
                </tr>
                @empty
                <p>No se encontraron resultados
                </p>
                @endforelse
            </tbody>
          </table>
    </body>
</html>
