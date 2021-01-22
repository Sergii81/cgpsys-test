@extends('adminlte::page')

@section('title', 'Clients')

@section('content_header')
    <h1>{{__('Clients')}}</h1>
    <a class="btn btn-info" href="{{route('admin.client.add.form')}}">{{__('Add new client')}}</a>
@stop

@section('content')

    <div class="card-body">
        <div id="companies_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="clients_table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="companies_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" >#</th>
                            <th class="sorting" >Client Name</th>
                            <th class="sorting" >Company Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)

                            <tr role="row" class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$client->id}}</td>
                                <td>{{$client->client_name}}</td>
                                <td>{{$client->companies->company_name ?? ''}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('admin.client.edit.form', $client->id)}}">{{__('Edit')}}</a>
                                    <a class="btn btn-danger" href="{{route('admin.client.delete', $client->id)}}">{{__('Delete')}}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr role="row">
                            <th>#</th>
                            <th>Client Name</th>
                            <th>Company Name</th>
                            <th>Actions</th>
                        </tr></tfoot>
                    </table>

                </div>
            </div>
            {{ $clients->links() }}
        </div>
    </div>

@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#clients_table').DataTable();
        } );
    </script>
@stop

