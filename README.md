# Whoops Configurator

[Whoops](https://github.com/filp/whoops/) is pretty damn awesome.
[Laravel](http://www.laravel.com) is pretty damn awesome and includes Whoops.
Changing the configuration for Whoops is not.

## Installing

Add the following to your composer.json

```json
"require-dev": {
    ...,
    "patrickrose/whoops-configurator": "0.0.*"
}
```

Then run `composer update` and watch as pretty much nothing happens

Then load the service provider in your app.php file
(I'd recommend against loading it in the local environment)

```php
    "PatrickRose\WhoopsConfigurator\WhoopsConfiguratorServiceProvider"
```

Then you're all done!