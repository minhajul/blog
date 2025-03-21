## Minimal Blog

Minimal Blog is a lightweight blogging platform designed for personal use.

### Technologies Used
- **Backend:** Laravel
- **Frontend:** Livewire, Alpine.js, Tailwind CSS
- **Database:** MySQL

### Installation Guide

### Prerequisites
Ensure you have the following installed on your system:
- PHP (latest stable version recommended)
- Composer
- Node.js & npm (or Yarn)
- MySQL (or a compatible database system)

### Installation Steps

1. **Clone the Repository**
   ```sh
   git clone https://github.com/minhajul/blog.git
   cd blog
   ```

2. **Install Dependencies**
   ```sh
   composer install
   npm install  # or yarn install
   ```

3. **Configure Environment**
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

4. **Set Up the Database**
    - Create a new database for the project.
    - Update the `.env` file with your database credentials:
      ```env
      DB_DATABASE=your_database_name
      DB_USERNAME=your_database_user
      DB_PASSWORD=your_database_password
      ```

5. **Run Migrations**
   ```sh
   php artisan migrate
   ```

6. **Serve the Application**
   ```sh
   php artisan serve
   ```
   or 
    
    ```sh
   composer run dev
   ```

   The application will be accessible at `http://127.0.0.1:8000`.

## License
This project is licensed under the MIT License. See the `LICENSE` file for details.
```
