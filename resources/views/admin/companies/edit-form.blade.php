@extends('adminlte::page')

@section('title', 'Edit company')

@section('content_header')
    <h1>{{__('Edit company')}}</h1>
@stop

@section('content')

    <form action="{{route('admin.company.edit')}}" method="POST">
        @csrf
        <input type="hidden" name="company_id" value="{{$company->id}}">
        <div class="card-body">
            <div class="form-group">
                <label for="company_name">{{__('Company name')}}</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="{{$company->company_name}}" required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@stop
