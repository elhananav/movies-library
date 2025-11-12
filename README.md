# 🎬 Movie Library

A simple Laravel application for managing and browsing movies, integrated with the OMDb API.

---

## 🚀 Quick Start (no Composer or PHP required)

### Prerequisites
- Docker Desktop installed and running
- Composer (used to install project dependencies)

---

### Setup

1. Clone this repository:
   ```bash
   git clone https://github.com/elhananav/movies-library.git
   cd movies-library
   ```

2. Copy environment file:
   ```bash
   copy .env.example .env
   ```
   
3. Insert your OMDb API key in the `.env` file:
   ```
   OMDB_API_KEY=your_key_here
   ```
4. Run Composer install:
    ```bash
    composer install
    ```

4. Run Docker:
   ```bash
   docker compose up -d
   ```

5. Generate app key and run migrations:
   ```bash
   php -r "echo 'base64:'.base64_encode(random_bytes(32));"
   ```
    Copy the generated key and set it in the .env file as APP_KEY


6. Run migrations:
   ```bash
    docker exec -it movie_library_app php artisan migrate
    ```

---

### Access the app

- Web: [http://localhost](http://localhost)

---

## 🧪 Notes
- The OMDb API key must be added to your `.env` file as `OMDB_API_KEY=your_key_here`.
  
