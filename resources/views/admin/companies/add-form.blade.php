@extends('adminlte::page')

@section('title', 'Add new company')

@section('content_header')
    <h1>{{__('Add new company')}}</h1>
@stop

@section('content')

    <form action="{{route('admin.company.add')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="company_name">{{__('Company name')}}</label>
                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="{{__('Company name')}}" required>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@stop
