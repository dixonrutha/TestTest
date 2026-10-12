# ecoPlus Student Registration API – ChuoCredit

Base URL: `https://ecowatercloud.com/api/v1`

All requests and responses are JSON. Every request must send these headers:

| Header         | Value                                   |
|----------------|-----------------------------------------|
| `Content-Type` | `application/json`                      |
| `auth-token`   | Token issued to ChuoCredit by Ecowater  |
| `sender`       | `chuocredit`                            |

A missing or wrong header returns `401`.

---

## 1. Register a student

`POST /students/register`

Send this once ChuoCredit has collected the registration fee. The student gets
an SMS with a registration code and collects their card at any Ecowater store with their ID.

### Request body

| Field               | Required | Description |
|---------------------|----------|-------------|
| `full_name`         | yes      | Student's full name |
| `gender`            | yes      | `M`, `F`, `Male` or `Female` |
| `mobile`            | yes      | `07XXXXXXXX`, `7XXXXXXXX` or `255XXXXXXXXX` |
| `campus`            | yes      | `campus_code` from `GET /campuses` (recommended), or the campus name |
| `amount`            | yes      | Fee paid, at least `5000` (TZS) |
| `email`             | no       | Student's email |

```json
{
  "full_name": "Asha Juma",
  "gender": "F",
  "mobile": "0712345678",
  "email": "asha@example.com",
  "campus": "CA-000059",
  "amount": 5000
}
```

### Responses

`201 Created`: student registered

```json
{
  "status": "success",
  "message": "Registration completed successfully",
  "data": {
    "registration_code": "5410000127",
    "mobile": "255712345678",
    "campus_code": "CA-000059"
  }
}
```

| Code  | Meaning |
|-------|---------|
| `401` | Authorization failed |
| `409` | Mobile number already has an Ecowater account or registration |
| `422` | Validation failed; `errors` lists each bad field |
| `500` | Server error; safe to retry (a successful earlier attempt returns `409`) |

```json
{
  "status": "error",
  "message": "Validation failed",
  "errors": { "mobile": "Use 07XXXXXXXX or 255XXXXXXXXX" }
}
```

---

## 2. Check a registration

`GET /students/5410000127`

Returns the registration `data` plus `record_stat` and `registered_at`, or `404`.

---

## 3. List campuses

`GET /campuses`

```json
{
  "status": "success",
  "data": [
    { "campus_code": "CA-000060", "campus_name": "Sokoine University Of Agriculture" },
    { "campus_code": "CA-000059", "campus_name": "University Of Dodoma" }
  ]
}
```

---

## Example

```bash
curl -X POST https://ecowatercloud.com/api/v1/students/register \
  -H "Content-Type: application/json" \
  -H "auth-token: <TOKEN>" \
  -H "sender: chuocredit" \
  -d '{"full_name":"Asha Juma","gender":"F","mobile":"0712345678","campus":"CA-000059","amount":5000}'
```
