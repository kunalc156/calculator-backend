# calculator-backend

The project uses symphony framework as a backend to evaluate the expression for the calculator.

### Installation steps

1. Clone the repository from the git.

2. Check if composer is installed. Run the command `composer -V`.
   If the composer is not installed run the below commands.
   Open a terminal and run the commands below

```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer

composer require symfony/debug-bundle --dev

```

3. Run the command `composer install` to install the dependencies
4. Run the command `symfony serve`.

By default the application will run at `http://127.0.0.1:8000`
