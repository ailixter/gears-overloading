# gears-overloading

## install
composer require ailixter/gears-overloading

## howtos

### How to provide getter/setter overriding for properties

```php
use Ailixter\Gears\Props;

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
$test->myPri = 'new'; // PropertyException
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

### How to support explicitely defined properties only

```php
use Ailixter\Gears\StrictProps;

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

### How to create getters and fluent setters for all defined props

```php
use Ailixter\Gears\AutoGetSetProps;

class TestAutoGetSetProps
{
    use AutoGetSetProps;

    private $myPri;
}

$test = TestAutoGetSetProps;
echo $test->setMyPri('new')->getMyPri();
```

it's also possible to specify defaults in getters:

```php
class TestAutoGetPropsWithDefaults
{
    use Props, AutoGetSetProps;

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

### How to implement property binding

This enables you to _delegate_ procedural property getting/setting.

```php
use Ailixter\Gears\BoundProps;

class TestBoundProps
{
    use BoundProps;

    /** @var BoundPropsInterface */
    private $myBoundPri;
}

$test = new TestBoundProps;
$test->myBoundPri = new TestPropsBinding;
$test->myBoundPri = 'new';
echo $test->myBoundPri;
```

### How to proxy your objects

```php
use Ailixter\Gears\AbstractProxy;

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
class LazyProxy
{
    use Proxy;

    private $obj;

    protected function getProxiedObject()
    {
        if (!$this->obj instanceof ProxiedObject) {
            $this->obj = new ProxiedObject;
        }
        return $this->obj;
    }
}
```

