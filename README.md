# 🎬 Movie Library

A simple Laravel application for managing and browsing movies, integrated with the OMDb API.

---

## 🚀 Quick Start (no Composer or PHP required)

### Prerequisites
- Docker Desktop installed and running

---

### Setup

1. Clone this repository:
   ```bash
   git clone https://github.com/elhananav/movies-library.git
   cd movies-library
   ```

2. Copy environment file:
   ```bash
   cp .env.example .env
   ```

3. Run Docker:
   ```bash
   docker compose up -d
   ```

4. Generate app key and run migrations:
   ```bash
   docker exec -it movie_library_app php artisan key:generate
   docker exec -it movie_library_app php artisan migrate
   ```

---

### Access the app

- Web: [http://localhost](http://localhost)
- Database: MySQL at `localhost:3306`, user `sail`, password `password`

---

## 🧪 Notes
- The OMDb API key must be added to your `.env` file as `OMDB_API_KEY=your_key_here`.
- You can stop everything anytime with:
  ```bash
  docker compose down
  
