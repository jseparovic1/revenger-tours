@extends('admin.layouts.app')

@section('content')
    @include('resource._resource_list', ['resources' => $resources])
@endsection
