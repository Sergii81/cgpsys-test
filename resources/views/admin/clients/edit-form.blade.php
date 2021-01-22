@extends('adminlte::page')

@section('title', 'Edit client')

@section('content_header')
    <h1>{{__('Edit client')}}</h1>
@stop

@section('content')

    <form action="{{route('admin.client.edit')}}" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="{{$client->id}}">
        <div class="card-body">
            <div class="form-group">
                <label for="company_name">{{__('Company name')}}</label>
                <input type="text" class="form-control" id="client_name" name="client_name" value="{{$client->client_name}}" required>
            </div>
            <div class="form-group">
                <label>{{__('Company name')}}</label>
                <select class="form-control" name="company_id" id="company_select">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}" @if($company->id == $client->company_id) selected="selected" @endif>{{$company->company_name}}</option>
                    @endforeach
                </select>
            </div>
{{--            {{ $companies->links() }}--}}
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#company_select').select2();
        });
    </script>
@stop
