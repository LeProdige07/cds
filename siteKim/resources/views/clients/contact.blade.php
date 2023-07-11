@extends('client-layouts.client')
@section('title')
Contactez-nous
@endsection
@section('content')
    @include('includes.client-header')

    @include('includes.banners.banner-contact')

    @include('includes.contacter')


    @include('includes.client-footer')
@endsection
