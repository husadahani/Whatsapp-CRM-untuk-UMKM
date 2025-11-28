# IndoWhatCRM

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Tailwind_CSS-4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Vite-7.x-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
</p>

**IndoWhatCRM** adalah platform WhatsApp CRM berbasis web yang dirancang khusus untuk UMKM Indonesia. Kelola komunikasi pelanggan, broadcast pesan, dan otomatisasi chat WhatsApp dalam satu platform yang mudah digunakan.

## Fitur Utama

### Untuk Pengguna (User Panel)
- **Multi-Device Support** - Hubungkan beberapa nomor WhatsApp tanpa scan QR berulang
- **Broadcast Massal** - Kirim pesan ke ribuan kontak sekaligus dengan personalisasi
- **Auto-Reply & Chatbot** - Balas pesan pelanggan secara otomatis
- **Manajemen Kontak** - Kelola kontak dengan label dan segmentasi
- **Kirim Media** - Kirim gambar, video, dokumen, dan audio
- **Integrasi API** - REST API untuk integrasi dengan sistem lain

### Untuk Admin (Admin Panel)
- **Dashboard Analytics** - Monitor revenue, users, dan aktivitas platform
- **User Management** - Kelola semua pengguna dan subscription
- **Subscription & Billing** - Manage plans, pricing, dan transaksi
- **Device Monitoring** - Monitor semua device WhatsApp yang terhubung
- **Server Management** - Monitor kesehatan server dan infrastruktur
- **API Logs** - Tracking semua API requests
- **Reports** - Export laporan revenue, users, dan analytics

## Tech Stack

- **Backend**: Laravel 12.x
- **Frontend**: Blade Templates + Tailwind CSS 4.0
- **Build Tool**: Vite 7.x
- **Font**: DM Sans (Google Fonts)
- **Icons**: Font Awesome 6.x
- **Database**: MySQL / PostgreSQL / SQLite

## Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- NPM atau Yarn

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/husadahani/Whatsapp-CRM-untuk-UMKM.git
cd indowhatcrm
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

```bash
# Jalankan migrasi database
php artisan migrate

# Seed data awal (termasuk user demo)
php artisan db:seed
```

### 5. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 6. Jalankan Server

```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## Demo Account

Setelah menjalankan seeder, gunakan akun berikut untuk login:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@indowhatcrm.com | password |
| Demo User | demo@indowhatcrm.com | password |
| UMKM | toko@berkah.com | password |

## Struktur URL

### Public
- `/` - Landing Page

### User Panel
- `/panel` - Dashboard
- `/panel/devices` - Manage Devices
- `/panel/contacts` - Manage Contacts
- `/panel/chats` - Chat Interface
- `/panel/broadcast` - Broadcast Messages
- `/panel/autoreply` - Auto Reply Rules
- `/panel/settings` - User Settings
- `/panel/api` - API Keys

### Admin Panel
- `/admin` - Admin Dashboard
- `/admin/users` - User Management
- `/admin/subscriptions` - Subscriptions
- `/admin/plans` - Plans & Pricing
- `/admin/transactions` - Transactions
- `/admin/devices` - All Devices
- `/admin/messages` - Messages Log
- `/admin/broadcasts` - Broadcasts
- `/admin/servers` - Server Management
- `/admin/api-logs` - API Logs
- `/admin/reports` - Reports
- `/admin/settings` - System Settings

## Color Palette

Aplikasi menggunakan warna khas WhatsApp:

| Color | Hex | Usage |
|-------|-----|-------|
| Primary Green | `#25D366` | Primary buttons, accents |
| Secondary Teal | `#075E54` | Headers, sidebar |
| Teal | `#128C7E` | Secondary elements |
| Light BG | `#ECE5DD` | Chat background |
| Chat BG | `#E4DDD6` | Message area |

## Scripts

```bash
# Development server
npm run dev

# Build for production
npm run build

# Run Laravel server
php artisan serve

# Run migrations
php artisan migrate

# Run seeders
php artisan db:seed

# Fresh migration with seed
php artisan migrate:fresh --seed
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">
  Made with ❤️ for UMKM Indonesia
</p>
