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
              <th>Filename</th>
              <th>created_at</th>
            </tr>
            </thead>
            <tbody>
                @forelse($imports as $import)
                <tr>
                <td>{{$import->id}}</td>
                <td>{{$import->filename}}</td>
                <td>{{$import->created_at}}</td>
                </tr>
                @empty
                <p>No se encontraron resultados
                </p>
                @endforelse
            </tbody>
          </table>
    </body>
</html>
