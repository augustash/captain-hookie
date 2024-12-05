# Captain Hookie - A CaptainHook Plugin

<!-- markdownlint-disable MD033 -->
<div align="center">
    <a href="https://augustash.com" target="_blank">
        <picture>
            <source media="(prefers-color-scheme: dark)" srcset="https://augustash.s3.amazonaws.com/logos/ash-inline-invert-500.png">
            <source media="(prefers-color-scheme: light)" srcset="https://augustash.s3.amazonaws.com/logos/ash-inline-color-500.png">
            <img alt="Shows a theme-dependent version of the AAI company logo." src="https://augustash.s3.amazonaws.com/logos/ash-inline-color-500.png">
        </picture>
    </a>
</div>

<div align="center">
    <a href="https://github.com/augustash/captain-hookie/graphs/commit-activity" target="_blank"><img src="https://img.shields.io/badge/maintained%3F-yes-brightgreen.svg?style=flat-square" alt="Maintained - Yes" /></a>
    <a href="https://opensource.org/licenses/MIT" target="_blank"><img alt="MIT" src="https://img.shields.io/badge/license-MIT-blue.svg" /></a>
</div>

## Overview

**This is a private module and is not currently aimed at public usage.**

<img src="https://captainhookphp.github.io/captainhook/gfx/ch.png" alt="CaptainHook logo" align="right" width="200"/>

*CaptainHook* is an easy to use and very flexible git hook library for php developers.
It enables you to configure your git hook actions in a simple json file.

You can use *CaptainHook* to validate or prepare your commit messages, ensure code quality
or run unit tests before you commit or push changes to git. You can automatically clear
local caches or install the latest composer dependencies after pulling the latest changes.

*CaptainHook* makes it easy to share hooks within your team and even can make sure that
everybody in your team activates the hooks locally.

You can run cli commands, use some built in validators, or write your own PHP classes that get
executed by *CaptainHook*.
For more information have a look at the [documentation](https://captainhookphp.github.io/captainhook/ "CaptainHook Documentation").

## Installation

### Fancy One Liner

```bash
composer config repositories.augustash composer "https://repo.packagist.com/augustash/drupal/" && composer config --no-interaction allow-plugins.captainhook/hook-installer true && composer config --json --merge extra.drupal-scaffold.allowed-packages '["augustash/captain-hookie"]' --merge extra.drupal-scaffold.allowed-packages '["augustash/captain-hookie"]' && composer require --dev augustash/captain-hookie
```

### Manual Setup

1. Add our Composer repository to your `composer.json` file:

    ```bash
    composer config repositories.augustash composer "https://repo.packagist.com/augustash/drupal/"
    ```

    or:

    ```json
    {
        "repositories": [
            {
                "type": "composer",
                "url": "https://repo.packagist.com/augustash/drupal/"
            }
        ]
    }
    ```

2. Allow the `captainhook/hook-installer` plugin to run:

    ```bash
    composer config --no-interaction allow-plugins.captainhook/hook-installer true
    ```

    or:

    ```json
    {
        "config": {
            "allow-plugins": {
                "captainhook/hook-installer": true
            }
        }
    }
    ```

3. Allow the `augustash/captain-hookie` plugin to run Drupal Scaffold commands:

    ```bash
    composer config --json --merge extra.drupal-scaffold.allowed-packages '["augustash/captain-hookie"]'
    ```

    or:

    ```json
    {
        "extra": {
            "drupal-scaffold": {
                "allowed-packages": [
                    "augustash/captain-hookie"
                ]
            }
        }
    }
    ```

4. Install as a development dependency using composer:

    ```bash
    composer require --dev augustash/captain-hookie
    ```

## License

[MIT](https://opensource.org/licenses/MIT)
