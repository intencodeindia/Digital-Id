

# User Profile & Authentication System

A robust Laravel-based user management system that provides secure authentication, profile management, and role-based access control.

## Development Setup

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js >= 16.x & NPM
- MySQL >= 8.0
- Redis Server
- Git

### Local Development Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/Naman-mahi/Digital-Id.git
   cd Digital-Id
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Configure environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Setup database:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. Start development server:
   ```bash
   php artisan serve
   npm run dev
   ```

### Development

1. Create a new branch for your feature:
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. Make your changes and commit them:
   ```bash
   git add .
   git commit -m "Description of your changes"
   ```

3. Push to your branch:
   ```bash
   git push origin feature/your-feature-name
   ```

4. Create a Pull Request on GitHub for review

Continue to develop your feature, commit your changes, and push to your branch.

### Contributing

We welcome contributions to enhance the functionality and security of this system. Please follow the development setup and guidelines above to ensure consistency and quality.

### License

This project is proprietary software. All rights reserved.
this repo developed by Naman Mahi with ❤️
