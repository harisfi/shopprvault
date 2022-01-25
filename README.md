# Project Website ShopprVault

## Usage
### Prerequisites
- Code Editor / IDE
- PHP [Composer](https://getcomposer.org/download/)
- Terminal
    
### Database Design
![img](/public/images/erd.png)

## Installation

1. Clone the repository
    ```bash
    git clone https://github.com/harisfi/shopprvault.git
    ```

2. Use the package manager [composer](https://getcomposer.org/download/) to install vendor.
    ```bash
    composer install
    ```

3. Configure .env files, => copy .env.example and rename it to .env
    ```bash
    cp .env.example .env
    ```

4. Set your database configuration in .env files

5. Generate APP_KEY
    ```bash
    php artisan key:generate
    ```

6. Run Migration
    ```bash
    php artisan migrate
    ```

7. Run Seeder
    ```bash
    php artisan db:seed
    ```

8. Run Laravel server
    ```bash
    php artisan serve
    ```

9. Basic Role Credentials
    - Admin
        ```
        username: admin@shopprvault.com
        password: password
        ```
    - Customer
        ```
        username: customer@gmail.com
        password: password
        ```

### Configuring for production deployment

1. Change .env debug mode
    ```bash
    APP_DEBUG=false
    ```

2. Run artisan command for optimizing app
    ```bash
    php artisan optimize
    ```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
