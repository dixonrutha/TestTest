# Ecowater ecoPlus – Student Registration API

Integration guide for ChuoCredit.

**Base URL:** `https://ecowatercloud.com`

## Authentication

Send these headers with every request:

| Header         | Value                               |
|----------------|-------------------------------------|
| `Content-Type` | `application/json`                  |
| `auth-token`   | Your token (shared separately)      |
| `sender`       | Your sender name (shared separately)|

Wrong or missing headers return `401 Authorization Failed`.

---

## 1. Get campuses

Use this to fill the campus dropdown. Show `campus_name` to the student and send `campus_code` when registering.

**GET** `/campus_list`

```bash
curl -X GET "https://ecowatercloud.com/campus_list" \
  -H "auth-token: YOUR_TOKEN" \
  -H "sender: YOUR_SENDER"
```

**Response**
```json
{
  "status": "success",
  "data": [
    { "campus_name": "St. John University Of Tanzania", "campus_code": "CA-000057" }
  ]
}
```

---

## 2. Register a student

Call this after the student has paid the registration fee. The student receives an SMS with a registration code and collects their card at any Ecowater store with their ID.

**POST** `/student_register`

| Field       | Required | Example                | Notes                          |
|-------------|----------|------------------------|--------------------------------|
| `full_name` | Yes      | `Asha Juma`            |                                |
| `gender`    | Yes      | `F`                    | `M` or `F`                     |
| `mobile`    | Yes      | `0712345678`           | `07XXXXXXXX` or `255XXXXXXXXX` |
| `campus`    | Yes      | `CA-000057`            | `campus_code` from campus list |
| `amount`    | Yes      | `5000`                 | Registration fee (TZS 5,000)   |
| `email`     | No       | `asha@example.com`     |                                |

```bash
curl -X POST "https://ecowatercloud.com/student_register" \
  -H "Content-Type: application/json" \
  -H "auth-token: YOUR_TOKEN" \
  -H "sender: YOUR_SENDER" \
  -d '{
    "full_name": "Asha Juma",
    "gender": "F",
    "mobile": "0712345678",
    "email": "asha@example.com",
    "campus": "CA-000057",
    "amount": 5000
  }'
```

**Success – 201**
```json
{
  "status": "success",
  "message": "Registration completed successfully",
  "data": {
    "registration_code": "5410000127",
    "mobile": "255712345678",
    "campus_code": "CA-000057"
  }
}
```

**Errors**

| Code  | Meaning                                         |
|-------|-------------------------------------------------|
| `401` | Wrong or missing `auth-token` / `sender`        |
| `409` | Mobile number is already registered             |
| `422` | Invalid data – `errors` shows which field       |
| `500` | Server error – try again                        |

```json
{
  "status": "error",
  "message": "Validation failed",
  "errors": { "mobile": "Use 07XXXXXXXX or 255XXXXXXXXX" }
}
```

---

## 3. Check registration status

**GET** `/student_status?mobile=0712345678`

```bash
curl -X GET "https://ecowatercloud.com/student_status?mobile=0712345678" \
  -H "auth-token: YOUR_TOKEN" \
  -H "sender: YOUR_SENDER"
```

**Response – 200**
```json
{
  "status": "success",
  "data": {
    "registration_code": "5410000127",
    "mobile": "255712345678",
    "campus_code": "CA-000057",
    "record_stat": "OPEN",
    "registered_at": "2026-10-12 10:15:00"
  }
}
```

Returns `404 Registration not found` if the mobile number was not registered through ChuoCredit.
