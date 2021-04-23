@extends('adminlte::auth.login')

@section('css')
    <style>
       #remember, .card-footer{
            display: none;
        }

        label[for="remember"]
        {
            display: none;
        }
    </style>
@stop

@section('js')
    <script>
        $('#remember').remove();
        $('.card-footer').remove();
        //$('input[name$="email"]').attr("autocomplete", "off");
    </script>
@stop