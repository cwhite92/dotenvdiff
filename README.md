![dotenvdiff](https://user-images.githubusercontent.com/2497626/97647699-50696d80-1a29-11eb-978b-a02c17365a0e.jpg)

dotenvdiff (`ded`) allows you to quickly compare the environment variable differences between two `.env` (or `.env.example`) files.

# Installation

Requirements:

- PHP 7.3 or greater

Require the tool globally via Composer:

```
composer global require cwhite92/dotenvdiff
```

If you don't have Composer's bin directory in your `$PATH`, now is the time to add it to `~/.bash_profile` or `~/.bashrc`:

```
export PATH=~/.composer/vendor/bin:$PATH
```

# Usage

Simply run the `ded` command and give it the locations of the two `.env` files that you wish to compare:

```
ded /path/to/first/.env /path/to/second/.env
```

If you're running this in a Laravel project, you probably want to run it like this in your project's root directory:

```
ded .env.example .env
```

It will give an output similar to the below:

```
╔═════════════════════╤══════╗
║ .env.example        │ .env ║
╟─────────────────────┼──────╢
║ GITHUB_API_ENDPOINT │      ║
╚═════════════════════╧══════╝
```

In this instance, there is a new `GITHUB_API_ENDPOINT` environment variable that exists in `.env.example` but not in `.env`. Somebody on our team added it and forgot to tell us 🙂

# License

`cwhite92/dotenvdiff` is licensed under the MIT License (MIT). Please see the [license file](https://github.com/cwhite92/dotenvdiff/blob/main/LICENSE.md) for more information.
