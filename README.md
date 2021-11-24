<!-- ABOUT THE PROJECT -->
## About The Project

This project consists of two APIs, one Laravel API and one Lumen Microservice for Users.
<br>



<!-- GETTING STARTED -->
## Getting Started

Follow these steps in order to start the server without any issue.

### Prerequisites

This API depends on the [Lumen User Microservice](https://github.com/otherperspectives/accutics-users-microservice) in order to fully work. 
<br><br>
After you have started the Users microservice, update the .env variable of this project, USERS_SERVICE_BASE_URL 
with the IP of the container for Users. 


### Installation


1. Clone the repo
   ```sh
   git clone https://github.com/otherperspectives/accutics-api.git
   ```
2. Execute the necessary commands to start the server for the first time.
   ```sh
    composer install
    cp .env.example .env
    php artisan key:generate
    vendor/bin/sail up -d
    vendor/bin/sail php artisan migrate:refresh --seed
   ```
3. Update in `.env` the variable `USERS_SERVICE_BASE_URL` with the IP of the container for users. The port must be :8001
   ```js
   USERS_SERVICE_BASE_URL=http://172.22.0.1:8001
   ```

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

Please refer to the [Documentation](https://documenter.getpostman.com/view/4285739/UVJYLfDS#0a298a60-a885-4920-9eff-98f6ee08cb45)

<p align="right">(<a href="#top">back to top</a>)</p>
