@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>{{__('Companies')}}</h1>
    <a class="btn btn-info" href="{{route('admin.company.add.form')}}">{{__('Add new company')}}</a>
@stop

@section('content')

    <div class="card-body">
        <div id="companies_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="companies_table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="companies_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" >#</th>
                                <th class="sorting" >Company Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)

                                <tr role="row" class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$company->id}}</td>
                                    <td>{{$company->company_name}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('admin.company.edit.form', $company->id)}}">{{__('Edit')}}</a>
                                        <a class="btn btn-danger" href="{{route('admin.company.delete', $company->id)}}">{{__('Delete')}}</a>
                                    </td>
                                </tr>

                        @endforeach
                        </tbody>
                            <tfoot>
                            <tr role="row">
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Actions</th>
                            </tr></tfoot>
                    </table>

                </div>
            </div>
            {{ $companies->links() }}
        </div>
    </div>

@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#companies_table').DataTable();
        } );
    </script>
@stop
