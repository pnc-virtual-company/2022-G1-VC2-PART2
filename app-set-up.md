# I. Front End
### Step 1: Install Dependency Packages
- [x] cd /front
> <code> npm install or npm i </code>

- [x] Install tailwindcss
> <code> vue add tailwind </code>

### Step 2: Update Environment Variables
- [x] Update <code>env.production</code> and <code>env.development</code> with IP Address of your Backend server

#### Example for <code>production </code> file:
VUE_APP_MODE=production
VUE_APP_API_URL=http://localhost:8000/api

#### Example for <code>developement</code> file:
VUE_APP_MODE=development
VUE_APP_API_URL=http://localhost:8000/api
### Step 3: Running Application
- [x] If you are in the development environment (Compiles and hot-reloads for development)

> <code>npm run dev </code>

# II. Backend
### Step 1: Install the Packages
- [x] cd /back
> <code> composer install or composer i </code>

### Step 2: Update the Environment Variables
- [x] copy <code>.env.example </code> file to the <code>.env </code> file
  
DB_DATABASE= alumni_db

### Step 3: Migrate migrateion table to database
> <code> php artisan migrate </code>

### Step 4: Migrate default admin user to database with seeder
> <code> php artisan db:seed </code>

### Step 5: Running Application
- [x] If you are in local development environments
> <code> php artisan serve </code> --port=YOUR_PORT (port is optional) 

- [x] If you are in production environments

> <code> http:://YOUR_IP_ADDRESS/PROJECT/back/public </code>
#### Example for <code>your port</code> :
http://localhost:8000