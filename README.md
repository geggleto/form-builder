# Simple Html Form Builder

This object oriented form builder will allow you to share form objects between different pages in your project.
Ideally via some form of dependency injection.

## Usage

For instance in Slim you can do the following.

```php
$container = $app->getContainer();
$container['loginForm'] = function ($c) {
   return (new Form())
           ->setId("loginForm")
           ->setMethod("post")
           ->addChild(
               (new Input())
                   ->setName("username")
                   ->setAttributes(
                   array(
                       "name" => "username",
                       "type" => "text"
                   ))
           )->addChild(
               (new Input())->setAttributes(
                   array(
                       "name" => "password",
                       "type" => "password"
                   ))
           );
};

```