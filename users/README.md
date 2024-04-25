# Laravel Microservices Application

This repository contains a Laravel application with two microservices: "users" and "notifications". These microservices communicate via a message bus.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- Docker
- Docker Compose

## Setup

1. **Clone the repository:**

    ```bash
    git clone https://github.com/your-username/laravel-microservices.git
    cd laravel-microservices
    ```

2. **Build the Docker containers:**

    ```bash
    docker-compose build
    ```

3. **Start the Docker containers:**

    ```bash
    docker-compose up -d
    ```

4. **Install dependencies and generate application keys:**

    ```bash
    docker-compose exec users-service composer install
    docker-compose exec notifications-service composer install
    docker-compose exec users-service php artisan key:generate
    docker-compose exec notifications-service php artisan key:generate
    ```

5. **Run database migrations:**

    ```bash
    docker-compose exec users-service php artisan migrate
    docker-compose exec notifications-service php artisan migrate
    ```

## Running the Application

The application should now be running. You can access the microservices using the following endpoints:

- Users Microservice: [http://localhost:8000](http://localhost:8000)
- Notifications Microservice: [http://localhost:8001](http://localhost:8001)

## Testing

To run tests for both microservices, use the following command:

```bash
docker-compose exec users-service php artisan test
docker-compose exec notifications-service php artisan test


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
