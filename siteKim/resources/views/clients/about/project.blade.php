@extends('client-layouts.client')
@section('title')
Les projets de CDS
@endsection
@section('content')
    @include('includes.client-header')

    @include('includes.banners.banner-project')

    @include('includes.project')

    @include('includes.single-project')

    @include('includes.client-footer')
@endsection
