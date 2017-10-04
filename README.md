# Estudos---Laravel
Para por em pratica colocarei aqui tudo que vou aprendendo do mundo laravel.

# ver erros
php artisan [comando] --verbose

## [Melhoria na consulta](https://laravel.com/docs/4.2/eloquent#eager-loading)
```
foreach (Book::with('author')->get() as $book)
{
    echo $book->author->name;
}

```
