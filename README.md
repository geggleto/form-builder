# Simple Html Form Builder

This object oriented form builder will allow you to share form objects between different pages in your project.
Ideally via some form of dependency injection.

## Usage

For instance in Slim you can do the following.

```php
$container = $app->getContainer();
$container['loginForm'] = function ($c) {
   return new (HtmlForm())
    ->setId("loginForm")
    ->method("post")
    ->addChildren(
        (new HtmlInput())->setAttributes(
        array(
            "name" => "username",
            "type" => "text",
            "password" => "password"
        ))
    )->addChildren(
        (new HtmlInput())->setAttributes(
        array(
         "name" => "password",
         "type" => "password",
         "password" => "password"
        ))
    );
};

```