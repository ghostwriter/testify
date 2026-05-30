# Testify

[![Automation](https://github.com/ghostwriter/testify/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/testify/actions/workflows/automation.yml)
[![PHP Version](https://badgen.net/packagist/php/ghostwriter/testify?color=777BB4)](https://www.php.net/supported-versions)
[![Packagist Downloads](https://badgen.net/packagist/dt/ghostwriter/testify?color=F28D1A)](https://packagist.org/packages/ghostwriter/testify)
[![PayPal](https://img.shields.io/badge/paypal-@codepoet-0079C1?logo=paypal&logoColor=002991)](https://paypal.me/codepoet)
[![Sponsors via GitHub](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/testify&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)

Automated test Generation for PHP code.

> [!WARNING]
>
> This project is not finished yet, work in progress.

## Installation

You can install the package via composer:

``` bash
composer require ghostwriter/testify --dev
```

### Star ⭐️ this repo if you find it useful

You can also star (🌟) this repo to find it easier later.

## Usage

Call the `testify` command with the path to the directory you want to generate tests for.

```sh
vendor/bin/testify --verbose --dry-run
```

### Commands

```sh
Description:
  Generate missing Tests.

Usage:
  bin/testify [options] [--] [<source> [<tests>]]

Arguments:
  source                The path to search for missing tests. [default: "src"]
  tests                 The path used to create tests. [default: "tests"]

Options:
  -d, --dry-run         Do not write any files.
  -f, --force           Overwrite existing files.
  -h, --help            Display help for the given command. When no command is given display help for the bin/testify command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

#### Example
```sh
vendor/bin/testify app tests --dry-run

vendor/bin/testify app/Middleware --dry-run --verbose

vendor/bin/testify # default path is `src`
```

### Credits

- [Nathanael Esayeas](https://github.com/ghostwriter)
- [All Contributors](https://github.com/ghostwriter/testify/contributors)

### Changelog

Please see [CHANGELOG.md](./CHANGELOG.md) for more information on what has changed recently.

### License

Please see [LICENSE](./LICENSE) for more information on the license that applies to this project.

### Security

Please see [SECURITY.md](./SECURITY.md) for more information on security disclosure process.
