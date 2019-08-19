@extends('admin.dashboard')
@section('title', 'Categoris List')

@section('content')

    <h2 class="text-center"><a href="{{ route('admin.import.emails') }}">Generate Subscribers(100) </a> </h2>


    @php
        $per_page = app('request')->input('per_page') ?? 10;
        $page = app('request')->input('page') ?? 1;
        $order = app('request')->input('order') ?? 'DESC';
        $sortby = app('request')->input('sortby') ?? 'id';
        $email_search = app('request')->input('email_search') ?? '';

        if ($order == 'DESC') {
            $order = 'ASC';
        }else{
            $order = 'DESC';
        }

        $page_start = $page * $per_page - $per_page;
        $page_end = $page * $per_page;

        if ($page_start == 0) {
            $page_start = 1;
            $page_end = $per_page;
        }
        
    @endphp

    <div class="container">
        <p>Showing {{ $page_start }} to {{ $page_end }} of <strong>{{ $total_items }}</strong> entries</p>

        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Items Per Page</button>
            
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.subscribes') }}?per_page=5">5</a>
                <a class="dropdown-item" href="{{ route('admin.subscribes') }}?per_page=10">10</a>
                <a class="dropdown-item" href="{{ route('admin.subscribes') }}?per_page=25">25</a>
                <a class="dropdown-item" href="{{ route('admin.subscribes') }}?per_page=50">50</a>
                <a class="dropdown-item" href="{{ route('admin.subscribes') }}?per_page=100">100</a>
                <a class="dropdown-item" href="{{ route('admin.subscribes') }}?per_page=1000">1000</a>

                <div class="dropdown-divider"></div>
            </div>
        </div>
    </div>



    <table class="ui celled table" style="width:100%">
        <thead>
            <tr>                
                <th><a class="dropdown-item" href="{{ route('admin.subscribes') }}?per_page={{ $per_page }}&sortby=id&order={{ $order }}">id <i class="fas fa-arrows-alt-v"></i></a></th>
                <th><a class="dropdown-item" href="{{ route('admin.subscribes') }}?per_page={{ $per_page }}&sortby=email&order={{ $order }}">email <i class="fas fa-arrows-alt-v"></i></a>
                <form>
                    <input type="text" name="email_search">
                </form>
                </th>
                <th><a class="dropdown-item" href="{{ route('admin.subscribes') }}?per_page={{ $per_page }}&sortby=created_at&order={{ $order }}">created_at <i class="fas fa-arrows-alt-v"></i></a></th>
                <th></th>
                <th></th>                 
            </tr>
        </thead>
        
        <tbody>            
            @foreach ($emails as $detail)                
                <tr> 
                    <td>{{ $detail->id }} </td>
                    <td>{{ $detail->email }} </td>
                    <td>{{ $detail->created_at }} </td>

                    <td><a href="edit/{{ $detail['id'] }}">EDIT</a></td>
                    <td><a href="delete/{{ $detail['id'] }}">DELETE</a></td>
                </tr>                                  
            @endforeach         
        
        </tbody>

    </table>
    <hr>

    <div class="d-flex justify-content-center">
        {{ $emails->appends(
            [
                'per_page' => $items_per_page,
                'order' => $order,
                'email_search' => $email_search,
                'sortby' => $sortby,
            ]
        )->links() }}
    </div>


@endsection