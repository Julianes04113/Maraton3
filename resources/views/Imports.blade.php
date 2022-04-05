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
                                        Origin file name
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
                                        Quantity
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
                                        Import Date
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
                                        View Details
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($imports as $import)

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
                                            {{ $import->id }}
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
                                            {{ $import->filename }}
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
                                            {{ $import->row_quantity }}
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
                                        {{ $import->created_at}}
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

                                            <a href="{{route('import.show',$import->id)}}" class="
                                            border-2
                                             border-blue-500
                                             rounded-lg
                                             font-bold
                                             text-blue-500
                                             px-4
                                             py-3
                                             transition
                                             duration-300
                                             ease-in-out
                                             hover:bg-blue-500
                                             hover:text-white
                                             mr-6">
                                                Details
                                            </a>
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
