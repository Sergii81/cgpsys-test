@extends('adminlte::page')

@section('title', 'Add new client')

@section('content_header')
    <h1>{{__('Add new client')}}</h1>
@stop

@section('content')

    <form action="{{route('admin.client.add')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="company_name">{{__('Client name')}}</label>
                <input type="text" class="form-control" id="client_name" name="client_name" placeholder="{{__('Client name')}}" required>
            </div>
            <div class="form-group">
                <label>{{__('Company name')}}</label>
                <select class="form-control" name="company_id">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->company_name}}</option>
                    @endforeach
                </select>
            </div>
            {{ $companies->links() }}
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@stop
