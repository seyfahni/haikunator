# Haikunator

This project was inspired by [HaikunatorPHP](https://github.com/Atrox/haikunatorphp) and [Jitsi](https://jitsi.org/).

It allows generation of human-friendly IDs.

## Installation
```bash
composer require seyfahni/haikunator
```

## Usage

As a consumer you can expect an `Haikunator` instance to be injected into your class.

To generate an id just call the `haikunate()` method:
```php
use seyfahni\Haikunator\Haikunator;

/** @var Haikunator $haikunator */
$haikunator->haikunate();
```

### Creating an instance via `Haikunators`

The `Haikunators` helper class contains methods for easy creation of common `Haikunator`s:

```php
use seyfahni\Haikunator\Haikunators;

$atroxHaikunator = Haikunators::atroxHaikunator();
$jitsiHaikunator = Haikunators::jitsiHaikunator();
```

### Creating a `Haikunator` by hand

There are multiple implementation of the `Haikunator` interface provided.
Usually you want to put a combination of `WordListHaikunator`s and `CharactersHaikunator` into one `AppendingHaikunator`.

The `IntegerGenerator` interface is used by some `Haikunator` implementations so that
any kind of number generation can be used via adapter implementation. 

### Extension

Use your own generation logic by implementing the `Haikunator` interface and using an instance of it via "creation by hand".
