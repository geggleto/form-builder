# Html Form Builder

Make HTML Forms, Easy.

## Factories

 - Bootstrap 3
 
But if you want to use something else feel free to build and PR it.


## Why?

Decouple your UI from flavour of the month CSS frameworks.

## How?

Have a new favourite CSS framework?  Write your own Factory!

## Usage via File


#### form.csv
"Email","email","inputEmail3","Email"
"Password","password","inputPassword3","Password"

### CSV Parser
```php
$builder = new Builder(new Factory()); //default is Bootstrap 3
$root = $builder->build((new CsvParser())->parseSchemaCsvToArray("form.csv"), "Login");
$builder->write($rootElement, './userLoginForm.php');
```


## Usage Procedural

```php
$builder = new Builder(new Factory()); //default is Bootstrap 3

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