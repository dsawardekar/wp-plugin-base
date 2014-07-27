## WP Plugin Base [![Build Status](https://travis-ci.org/dsawardekar/wp-plugin-base.svg?branch=develop)](https://travis-ci.org/dsawardekar/wp-plugin-base)  [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dsawardekar/wp-plugin-base/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/dsawardekar/wp-plugin-base/?branch=develop)

Base for WordPress Plugins.

Deprecated. This repo has been merged into
[Arrow](https://github.com/dsawardekar/arrow).

# Features

* PluginMeta which automatically figures out defaults for typical
  WordPress things like Plugin Dir, Slug, Menu Slug, Option Key, etc.

# Usage

```php
$container->object('pluginMeta', new PluginMeta($file));
```
