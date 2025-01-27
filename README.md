# Dokumentasi API Laravel 8 dengan Sanctum

## Pendahuluan
API ini menggunakan Laravel Sanctum untuk autentikasi. Sanctum menyediakan mekanisme autentikasi berbasis token untuk aplikasi SPA (Single Page Application), mobile, atau aplikasi pihak ketiga.

### Basis URL
Semua endpoint di bawah ini mengasumsikan basis URL:
```
http://yourdomain.com/api
```

---

## Endpoint

### 1. Registrasi Pengguna
**Endpoint:** `/register`  
**Metode:** `POST`

#### Request
**Header:**
- `Content-Type: application/json`

**Body:**
```json
{
  "name": "string",
  "email": "string",
  "password": "string",
  "password_confirmation": "string"
}
```

#### Response
**Sukses (201):**
```json
{
  "user": {
    "id": 1,
    "name": "string",
    "email": "string",
    "created_at": "datetime",
    "updated_at": "datetime"
  },
  "token": "string"
}
```

**Kesalahan (422):**
```json
{
  "message": "Validation errors",
  "errors": {
    "field": ["error message"]
  }
}
```

---

### 2. Login Pengguna
**Endpoint:** `/login`  
**Metode:** `POST`

#### Request
**Header:**
- `Content-Type: application/json`

**Body:**
```json
{
  "email": "string",
  "password": "string"
}
```

#### Response
**Sukses (200):**
```json
{
  "user": {
    "id": 1,
    "name": "string",
    "email": "string",
    "created_at": "datetime",
    "updated_at": "datetime"
  },
  "token": "string"
}
```

**Kesalahan (401):**
```json
{
  "message": "Invalid credentials"
}
```

---

### 3. Logout Pengguna
**Endpoint:** `/logout`  
**Metode:** `POST`

#### Request
**Header:**
- `Authorization: Bearer {token}`
- `Content-Type: application/json`

#### Response
**Sukses (200):**
```json
{
  "message": "Logged out successfully"
}
```

---

### 4. Data Pengguna Saat Ini
**Endpoint:** `/user`  
**Metode:** `GET`

#### Request
**Header:**
- `Authorization: Bearer {token}`

#### Response
**Sukses (200):**
```json
{
  "id": 1,
  "name": "string",
  "email": "string",
  "created_at": "datetime",
  "updated_at": "datetime"
}
```

**Kesalahan (401):**
```json
{
  "message": "Unauthenticated."
}
```

---

## Catatan
1. Semua endpoint yang membutuhkan autentikasi harus menggunakan header `Authorization` dengan format:
   ```
   Authorization: Bearer {token}
   ```
2. Token dapat diperoleh dari respon login atau registrasi.
3. Pastikan aplikasi Anda menggunakan HTTPS untuk keamanan.

---

**Referensi:**
- [Laravel Sanctum Documentation](https://laravel.com/docs/8.x/sanctum)
- [Laravel Sanctum Tutorial](https://codelapan.com/post/laravel-8-rest-api-authentication-dengan-sanctum)

