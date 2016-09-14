# Html Form Builder

Make HTML Forms, Easy.

## Factories

 - Bootstrap 3
 
But if you want to use something else feel free to build and PR it.


## Why?

Lazy. That's why.
This package hopefully will bring us one step closer to fully interoperable systems.


## Usage

```php
$builder = new Builder(new Factory());

$schema = []; 

$schema[] = $builder->getSchemaForColumn('username')
    ->setPlaceholder('Username');
    ->setType('text');

$schema[] = $builder->getSchemaForColumn('password')
    ->setPlaceholder('Password');
    ->setType('password');

$schema[] = $builder->getSchemaForColumn('domain')
    ->setPlaceholder('Password');
    ->setType('select')
    ->setOptions([
        "example.com" => 1,
        "beta.example.com" => 2,
        "theta.example.com" => 3,
    ]);

$rootElement = $builder->build($schema, 'Login');

$builder->write($rootElement, './userLoginForm.php');
```