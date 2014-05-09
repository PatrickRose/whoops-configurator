# Whoops Configurator

[Whoops](https://github.com/filp/whoops/) is pretty damn awesome.
[Laravel](http://www.laravel.com) is pretty damn awesome and includes Whoops.
Changing the configuration for Whoops is not.

## Installing

Add the following to your composer.json[^1]:

```json
"require-dev": {
    ...,
    "patrickrose/whoops-configurator": "1.*"
}
```

Then run `composer update` and watch as pretty much nothing happens

Then load the service provider in your app.php file
(I'd recommend against loading it in production)[^2]

```php
    "PatrickRose\WhoopsConfigurator\WhoopsConfiguratorServiceProvider"
```

Finally, publish the config file:

```bash
php artisan config:publish patrickrose/whoops-configurator
```

Then you're all done!

## Config Options

Currently, there are two options: `editor` and `title`. They're mostly self explanatory.

### Editors

Whoops comes with support for four editors[^3]. To use one, just set the `editor` value to one of the following:

* **sublime** - Sublime Text 2
* **emacs** - Emacs
* **textmate** - Textmate
* **macvim** - MacVim

If you wish to provide your own support, you may instead pass a closure. See [Whoops' Docs](https://github.com/filp/whoops/blob/master/docs/Open%20Files%20In%20An%20Editor.md) for more info on that.

### Title

Self explanatory. If you want to insult yourself, make a geeky joke or whatever then change the `title` value to whatever you like.

[^1]: Put it in the require-dev block since you aren't showing debug messages in production...right?
[^2]: You can cascade so everything doesn't break by using the `append_config()` function.
[^3]: I may add support for other editors later
