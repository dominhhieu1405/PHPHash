# PHPHash
Trình mã hóa mật khẩu bằng PHP đơn giản

## Cài đặt 

```php
require_once 'PATH_TO_YOUR_FILE/class.config.php';
require_once 'PATH_TO_YOUR_FILE/class.phphash.php';
```

## Sử dụng
### Mã hóa mật khẩu
```php
$hash = new \K6VN\PHPHash\PasswordHash('mypassword');
```

### Kiểm tra mật khẩu

```php
// Mật khẩu đã mã hóa
$hash = new \K6VN\PHPHash\PasswordHash('$2y$10$F4L/hmnkYOSvGqU0tI4DuuszxFarOedNQA1Ws.ZHwKcRLmUlWaDTW');
$hash->verify('mypassword'); // true | false
```

#### Lấy kết quả dạng chuỗi

```php
$hash = new \K6VN\PHPHash\PasswordHash('mypassword');
// Cách 1
$string = $hash->__toString();
// Cách 2
$string = (string) $passwordHash;
```

#### Cấu hình

```php
$config = new \K6VN\PHPHash\Config(PASSWORD_BCRYPT, ['cost' => 12]);
$hash = new \K6VN\PHPHash\PasswordHash('mypassword', $config);
```

#### Available methods

```php
$hash->verify('mypassword'); // Kiểm tra mật khẩu
$hash->needsRehash(); // Kiểm tra hash bị lỗi không
$hash->getInfo(); // Trả về mảng cấu hình
$hash->__toString(); // Trả về chuỗi hash
```
