# 🎬 Movie Library

A simple **Laravel + Sail** application for managing and browsing movies via the [OMDb API](https://www.omdbapi.com/).  
Includes an **admin panel** with import and CRUD operations, automatic **genre parsing**, and a **public catalog** with filtering.

---

## ⚙️ Requirements

- 🐳 [Docker Desktop](https://www.docker.com/products/docker-desktop)  
  That’s all you need!  
  *(No PHP, Composer, or MySQL required — Sail provides everything inside containers.)*

---

## 🚀 Setup Instructions

### 1️⃣ Clone the repository
```bash
git clone https://github.com/elhananav/movies-library.git
cd movie-library
```

### 2️⃣ Copy the environment file
```bash
cp .env.example .env
```

Then edit `.env` and set the following values:

```env
APP_NAME="Movie Library"
APP_URL=http://localhost

OMDB_API_KEY=your_api_key_here

ADMIN_USER=admin
ADMIN_PASS=password
```

You can get a free OMDb API key here:  
🔗 https://www.omdbapi.com/apikey.aspx

---

### 3️⃣ Build the environment
```bash
./vendor/bin/sail build
```

### 4️⃣ Start the containers
```bash
./vendor/bin/sail up -d
```

### 5️⃣ Install dependencies
```bash
./vendor/bin/sail composer install
```

### 6️⃣ Run migrations
```bash
./vendor/bin/sail artisan migrate
```

---

## 🖥️ Access the app

- Public catalog → [http://localhost](http://localhost)  
  Displays a paginated 4×3 movie grid, filterable by genre.

- Admin panel → [http://localhost/admin/movies](http://localhost/admin/movies)  
  Protected by **Basic Auth** (use credentials from `.env`).

---

## 🧩 Features

✅ Import movies from the OMDb API  
✅ Automatic parsing and linking of genres (many-to-many)  
✅ Basic Authentication for admin routes  
✅ Public movie catalog with pagination and genre filtering  
✅ Fully Dockerized using Laravel Sail

---

## 🧰 Useful Commands

| Action | Command |
|--------|----------|
| Start containers | `./vendor/bin/sail up -d` |
| Stop containers | `./vendor/bin/sail down` |
| Run migrations | `./vendor/bin/sail artisan migrate` |
| Access Artisan CLI | `./vendor/bin/sail artisan <command>` |
| Access Composer | `./vendor/bin/sail composer <command>` |
| Access Tinker | `./vendor/bin/sail artisan tinker` |

---

## 🧠 Notes

- Use the **Import** form in the admin panel to add movies by title or IMDb ID.  
- Genres are created automatically and linked to the movie.  
- Pagination: 12 movies per page (4×3 grid layout).
