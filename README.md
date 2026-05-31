# Testify

[![Automation](https://github.com/ghostwriter/testify/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/testify/actions/workflows/automation.yml)
[![PHP Version](https://badgen.net/packagist/php/ghostwriter/testify?color=777BB4)](https://www.php.net/supported-versions)
[![Packagist Downloads](https://badgen.net/packagist/dt/ghostwriter/testify?color=F28D1A)](https://packagist.org/packages/ghostwriter/testify)
[![PayPal](https://img.shields.io/badge/paypal-@codepoet-0079C1?logo=data%3Aimage%2Fsvg%2Bxml%3Bbase64%2CPHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI%2BPHBhdGggZD0iTTE5LjcxNSA2LjEzM2MuMjQ5LTEuODY2IDAtMy4xMS0uOTk5LTQuMjY2QzE3LjYzNC42MjIgMTUuNzIxIDAgMTMuMzA3IDBINi4yMzVjLS40MTggMC0uOTE2LjQ0NC0xIC44ODlMMi4zMjMgMjAuNjIyYzAgLjM1Ni4yNS44LjY2NS44aDQuMzI4bC0uMjUgMS45NTZjLS4wODQuMzU1LjE2Ni42MjIuNDk4LjYyMmgzLjY2M2MuNDE3IDAgLjgzMi0uMjY3LjkxNS0uNzExdi0uMjY3bC43NDktNC42MjJ2LS4xNzhjLjA4My0uNDQ0LjUtLjguOTE1LS44aC41YzMuNTc4IDAgNi4zMjUtMS41MSA3LjE1Ni01Ljk1NS40MTgtMS44NjcuMjUyLTMuMzc4LS43NDctNC40NDUtLjI1LS4zNTUtLjY2Ni0uNjIyLTEtLjg4OSIgZmlsbD0iIzAwOWNkZSIvPjxwYXRoIGQ9Ik0xOS43MTUgNi4xMzNjLjI0OS0xLjg2NiAwLTMuMTEtLjk5OS00LjI2NkMxNy42MzQuNjIyIDE1LjcyMSAwIDEzLjMwNyAwSDYuMjM1Yy0uNDE4IDAtLjkxNi40NDQtMSAuODg5TDIuMzIzIDIwLjYyMmMwIC4zNTYuMjUuOC42NjUuOGg0LjMyOGwxLjE2NC03LjM3OC0uMDgzLjI2N2MuMDg0LS41MzMuNS0uODg5Ljk5OC0uODg5aDIuMDhjNC4wNzkgMCA3LjI0MS0xLjc3OCA4LjI0LTYuNzU1LS4wODMtLjI2NyAwLS4zNTYgMC0uNTM0IiBmaWxsPSIjMDEyMTY5Ii8%2BPHBhdGggZD0iTTkuNTYzIDYuMTMzYy4wODItLjI2Ni4yNS0uNTMzLjQ5OC0uNzEuMTY2IDAgLjI1LS4wOS40MTYtLjA5aDUuNDk0Yy42NjYgMCAxLjMzLjA5IDEuODMuMTc4LjE2NiAwIC4zMzMgMCAuNDk4LjA4OS4xNjguMDg5LjMzNC4wODkuNDE4LjE3OGguMjVjLjI0OC4wODkuNDk3LjI2Ni43NDguMzU1LjI0OC0xLjg2NiAwLTMuMTEtLjk5OS00LjM1NUMxNy43MTcuNTMzIDE1LjgwNCAwIDEzLjM5IDBINi4yMzVjLS40MTggMC0uOTE2LjM1Ni0xIC44ODlMMi4zMjMgMjAuNjIyYzAgLjM1Ni4yNS44LjY2NS44aDQuMzI4bDEuMTY0LTcuMzc4IDEuMDg0LTcuOTF6IiBmaWxsPSIjMDAzMDg3Ii8%2BPC9zdmc%2B)](https://paypal.me/codepoet)
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
