<?php

$this->group(['prefix' => 'v1'], function () {

    $this->post('auth', 'Auth\AuthApiController@authenticate');
    $this->post('auth_refresh', 'Auth\AuthApiController@refreshToken');

    $this->group(['middleware'=>'jwt.auth'], function (){

        $this->get('products/search', 'API\V1\ProductController@search');
        $this->resource('products', 'API\V1\ProductController', ['except' => [
            'create', 'edit'
        ]]);

    });


});

/*
 * Exemplo de versionamento
$this->group(['prefix' => 'v2'], function () {

    $this->resource('products', 'API\V2\ProductController', ['except' => [
        'create', 'edit'
    ]]);

});
*/