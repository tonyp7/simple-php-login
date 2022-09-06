# simple-php-login
A simple, database-free login system that can integrate with fail2ban and third-party (github / google) logins to protect your private pages.

## How it works?

simple-php-login displays a login screen that can use different logins:
* Native (with a username/password)
* Google Account
* Github Account

A logged-in user can access a protected resource.

## How to use it?

simple-php-login is configured through the file config.inc.php.


## Why simple-php-login

simple-php-login is born out of a personal need: I wanted to expose my home CCTVs to the internet. These CCTVs are primarily being controlled by a software called Shinobi. It would be possible to expose Shinobi directly to the Internet but I would be at the mercy of security issues of a big system I do not control and this is too unconfortable for my liking.
In addition, I wanted a system that could integrate with fail2ban so that bruteforce attacks could be almost entirely negated.
As a result, I decided to implement a simple login system that would protect my CCTV from external eyes that would be strong enough to trust exposed to the internet.


