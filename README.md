# simple-php-login
A simple, database-free login system that can integrate with fail2ban and third-party (github / google) logins to protect your private pages.

## How it works?

simple-php-login displays a login screen that can use different logins:
* Native (with a username/password)
* Google Account
* Github Account

A logged-in user can access a protected resource.

## How to use it?

simple-php-login is configured through the file config.inc.php. **You must edit sample.config.inc.php and rename it as config.inc.php**

### Using usernmae & password logins

This is the simplest way to get simple-php-login up and running quickly. The 'native' entry in the config variable holds an wway of user/passwords combinations.

```php
$config['native'] = array( array( 'user'=>'user1', 'password'=>'password1'), array( 'user'=>'user2', 'password'=>'password2') );
```

#### Hardening security

By default these passwords are not hashed and you'd be vulnerable to leak passwords should the php interpreter fail. While it is fine to get simple-php-login quickly, you you should harden security by storing hashed passwords instead of plain passwords.

To do so, apply these following settings:

```php
$config['native']['hash_password'] = true;
$config['native']['algorithm'] = PASSWORD_BCRYPT;
```

simple-php-login then rely in the passwod_hash function from PHP. https://www.php.net/manual/en/function.password-hash.php

The passwords should now store the hashed passwords instead of the plain password. simple-php-login provides a utility to generate the hashed paswords according to the configuration.

You can use from the command line:

```console
$php generate_hash.php password
```

Or simple browse generate_hash.php to your php-simple-login browser:



### Configuring Github signin


### Configuring Google signin


## Why simple-php-login

simple-php-login is born out of a personal need: I wanted to expose my home CCTVs to the internet. These CCTVs are primarily being controlled by a software called Shinobi. It would be possible to expose Shinobi directly to the Internet but I would be at the mercy of security issues of a big system I do not control and this is too unconfortable for my liking.
In addition, I wanted a system that could integrate with fail2ban so that bruteforce attacks could be almost entirely negated.
As a result, I decided to implement a simple login system that would protect my CCTV from external eyes that would be strong enough to trust exposed to the internet.


