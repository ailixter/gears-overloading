# gears-overloading

## install
composer require ailixter/gears-overloading

## howtos

### Ailixter\Gears\Props

How to provide getter/setter overriding for properties.

```php
class TestProps
{
    use Props;
    
    private $myPri = 'my private';
    
    public function getMyPri() {
        return '*' . $this->myPri;
    }
}

$test = new TestProps;
echo $test->myPri;
$test->myPri = 'new';
```
or, for real (defined) props:

```php
class TestRealProps
{
    use Props;
    
    private $myPri = 'my private';

    protected function propertyGet($prop)
    {
        return $this->{$prop};
    }

    protected function propertySet($prop, $value)
    {
        $this->{$prop} = $value;
    }
}

$test = new TestRealProps;
echo $test->myPri;
$test->myPri = 'new';
echo $test->undefined;     // Notice
$test->undefined = 'some'; // perfectly ok
```

### Ailixter\Gears\StrictProps

How to support explicitely defined properties only.

```php
class TestStrictProps
{
    use StrictProps;

    private $myPri = 'my private';
}

$test = new TestStrictProps;
echo $test->myPri;
$test->myPri = 'new';
echo $test->undefined;     // PropertyException
$test->undefined = 'some'; // PropertyException
```

### Ailixter\Gears\AutoGetSetProps;

How to create getters and fluent setters for all defined props.

```php
class TestAutoGetSetProps
{
    use AutoGetSetProps;

    private $myPri = 'my private';
}

$test = TestAutoGetSetProps;
echo $test->getMyPri();
echo $test->setMyPri('new')->myPri;
```

it's also possible to specify defaults in getters:

```php
class TestAutoGetPropsWithDefaults
{
    use AutoGetSetProps;

    private   $myPri;
    protected $myPro;

    public function getMyPro($default = 'static default')
    {
        return $this->existingProperty('myPro', $default);
    }
}

$test = TestAutoGetSetProps;
echo $test->myPro;                       // static default
echo $test->getMyPri('dynamic default'); // dynamic default
```

### Ailixter\Gears\BoundProps

How to bind properties using BoundPropsInterface.

This enables you to _delegate_ procedural property getting/setting.

```php
class TestBoundProps
{
    use BoundProps;

    /** @var TestPropsBinding */
    private $myBoundPri;
}

$test = new TestBoundProps;
$test->myBoundPri = new TestPropsBinding;
$test->myBoundPri = 'new';
echo $test->myBoundPri;
```

### Ailixter\Gears\AbstractProxy

Proxy your objects.

```php
class TestProxy extends AbstractProxy {}
class TestObject {
    public $myPub = 'my public';
    public function myFn () {
        return __function__;
    }
}

$test = new TestProxy(new TestObject);
echo $test->myPub;
$test->myPub = 'new';
echo $this->myFn();
```

or

```php
class CustomProxy
{
    use Proxy;

    private $proxiedObject;

    public function __construct($proxiedObject)
    {
        $this->proxiedObject = $proxiedObject;
    }
}
```
or

```php
class CustomProxy2
{
    use Proxy;

    private $obj;

    public function __construct($proxiedObject)
    {
        $this->obj = $proxiedObject;
    }

    protected function getProxiedObject()
    {
        return $this->obj;
    }
}
```

