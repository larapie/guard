# Guard

[![Build Status](https://travis-ci.org/larapie/guard.svg?branch=master)](https://travis-ci.org/larapie/guard)
[![StyleCI](https://github.styleci.io/repos/178550231/shield?branch=master)](https://github.styleci.io/repos/178550231)

## Installation

You can install the package via composer:

```bash
composer require larapie/guard
```

## Have you ever…

… encountered situations where you had countless if statements that needed to throw specific errors when the condtion was met?

Here's an example:

```php
public function foo()
{
    if($user==null)
        throw new UserNotFoundException();
        
    if($user->age < 18)
        throw new NotOldEnoughException(18);
        
    ...
}
```

The goal of this package is to decouple these conditions and their exceptions in a guard object. This guard object can then be handled by the dispatcher.
By structuring this into an object, we gain several advantages:

- We're able to reuse the same conditions in the code elsewhere.
- The code becomes a lot easier to read.
- More fine grained control of what exceptions will be thrown.

Let's rewrite the example from above with guards:

```php
public function foo()
{
    guard(new UserDoesNotExistsGuard($user), new UserInsufficientAgeGuard($user, 18));
}
```

Note that the order of the guards will determine what exception will be thrown first.

```php
class UserDoesNotExistsGuard extends Guard
{

    /**
     * The exception that will be thrown when the condition is met
     *
     * @var string
     */
    protected $exception = UserNotFoundException::class;


    /**
     * @var User
     */
    protected $user;

    /**
     * UserDoesNotExistsGuard constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * The condition that needs to be satisfied in order to throw the exception.
     *
     * @return bool
     */
    public function condition(): bool
    {
        return $this->user===null;
    }
}
```

```php
class UserInsufficientAgeGuard extends Guard
{
    /**
     * @var User
     */
    protected $user;
    
    /**
     * @var int
     */
    protected $age;    

    /**
     * UserDoesNotExistsGuard constructor.
     * @param $user
     */
    public function __construct(User $user, int $age)
    {
        $this->user = $user;
        $this->age = $age;
    }

    /**
     * The condition that needs to be satisfied in order to throw the exception.
     *
     * @return bool
     */
    public function condition(): bool
    {
        return $this->user->age < this->age;
    }
    
    /**
     * The exception that gets thrown when the condition is satisfied.
     *
     * @return \Throwable
     */
    public function exception(): \Throwable
    {
        return new NotOldEnoughException(18);
    }    
}
```

## Future

- Allow the guard dispatcher to make it process OR statements.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email anthony@officeline.be instead of using the issue tracker.

## Credits

- [Anthony Vancauwenberghe](https://github.com/larapie)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
