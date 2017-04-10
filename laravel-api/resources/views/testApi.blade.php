@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <button class="btn_request">Enviar</button>
            </div>
        </div>
    </div>
</div>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(function () {
            var token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xhcmF2ZWwtYXBpLmRldlwvYXBpXC92MVwvYXV0aF9yZWZyZXNoIiwiaWF0IjoxNDkxODI0ODkyLCJleHAiOjE0OTE4MzM3MzgsIm5iZiI6MTQ5MTgzMDEzOCwianRpIjoiY0d6RUxNYkZXOHpvdjJleSJ9.EYgbT9XRTg3qjLgRbrUSBtLfLXNXWQa-Ui12k-WM4uI';

            $('.btn_request').click(function () {
                $.ajax({
                    url: 'http://laravel-api.dev/api/v1/products',
                    method: 'GET',
                    data: {'token':token}
                }).done(function (data) {
                    alert("Sucesso!");

                    console.log(data);
                }).fail(function () {
                    alert('Fail...');
                })
            })
        })
    </script>
@endsection
