<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>ToDo App</title>
</head>

<body>

    <!-- component -->
    <section class="bg-white container mt-6 ">
        <ul>
            <li>
                Id : {{$import->id}}
            </li>
            <li>
                File : {{$import->filename}}
            </li>
            <li>
                quantity : {{$import->row_quantity}}
            </li>
            <li>
                Imported at : {{$import->created_at}}
            </li>

        </ul>
    </section>
    <!-- ====== Table Section Start -->
    <section class="bg-white py-20 lg:py-[120px]">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="max-w-full overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-primary text-center">
                                    <th
                                        class="
                                        w-1/6
                                        min-w-[160px]
                                        text-lg
                                        font-semibold
                                        text-white
                                        py-4
                                        lg:py-7
                                        px-3
                                        lg:px-4
                                        border-l border-transparent
                                        ">
                                        ID
                                    </th>
                                    <th
                                        class="
                                        w-1/6
                                        min-w-[160px]
                                        text-lg
                                        font-semibold
                                        text-white
                                        py-4
                                        lg:py-7
                                        px-3
                                        lg:px-4
                                        ">
                                        Title
                                    </th>
                                    <th
                                        class="
                                        w-1/6
                                        min-w-[160px]
                                        text-lg
                                        font-semibold
                                        text-white
                                        py-4
                                        lg:py-7
                                        px-3
                                        lg:px-4
                                        ">
                                        Description
                                    </th>
                                    <th
                                        class="
                                        w-1/6
                                        min-w-[160px]
                                        text-lg
                                        font-semibold
                                        text-white
                                        py-4
                                        lg:py-7
                                        px-3
                                        lg:px-4
                                        ">
                                        Creation date
                                    </th>


                                </tr>
                            </thead>
                            <tbody>
                                @forelse($todos as $todo)

                                    <tr>
                                        <td
                                            class="
                                            text-center text-dark
                                            font-medium
                                            text-base
                                            py-5
                                            px-2
                                            bg-[#F3F6FF]
                                            border-b border-l border-[#E8E8E8]
                                            ">
                                            {{ $todo->id }}
                                        </td>
                                        <td
                                            class="
                                            text-center text-dark
                                            font-medium
                                            text-base
                                            py-5
                                            px-2
                                            bg-white
                                            border-b border-[#E8E8E8]
                                            ">
                                            {{ $todo->title }}
                                        </td>
                                        <td
                                            class="
                                            text-center text-dark
                                            font-medium
                                            text-base
                                            py-5
                                            px-2
                                            bg-[#F3F6FF]
                                            border-b border-[#E8E8E8]
                                            ">
                                            {{ $todo->status }}
                                        </td>
                                        <td
                                            class="
                                            text-center text-dark
                                            font-medium
                                            text-base
                                            py-5
                                            px-2
                                            bg-white
                                            border-b border-[#E8E8E8]
                                            ">
                                        {{ $todo->created_at}}
                                        </td>
                                        <td
                                            class="
                                            text-center text-dark
                                            font-medium
                                            text-base
                                            py-5
                                            px-2
                                            bg-white
                                            border-b border-[#E8E8E8]
                                            ">
                                        <a href=""></a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No se encontraron resultados
                                    </p>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Table Section End -->

</body>

</html>
