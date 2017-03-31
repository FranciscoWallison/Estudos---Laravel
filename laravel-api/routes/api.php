<?php

$this->resource('products','API\ProductController', ['except' => [
    'create', 'edit'
]]);