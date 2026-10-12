# ecoPlus Student Registration API – ChuoCredit

Base URL: `https://ecowatercloud.com/chuocredit_api`

All requests and responses are JSON. Every request must send these headers:

| Header         | Value                                   |
|----------------|-----------------------------------------|
| `Content-Type` | `application/json`                      |
| `auth-token`   | Token issued to ChuoCredit by Ecowater  |
| `sender`       | `chuocredit`                            |

A missing or wrong header returns `401`.

---

## 1. Register a student

`POST /register`

Send this once ChuoCredit has collected the registration fee. The student gets
an SMS with a registration code and collects their card at any Ecowater store with their ID.

### Request body

| Field               | Required | Description |
|---------------------|----------|-------------|
| `partner_reference` | yes      | ChuoCredit's own unique ID for this registration. Retrying with the same value never creates a duplicate. |
| `full_name`         | yes      | Student's full name |
| `gender`            | yes      | `M`, `F`, `Male` or `Female` |
| `mobile`            | yes      | `07XXXXXXXX`, `7XXXXXXXX` or `255XXXXXXXXX` |
| `campus`            | yes      | `campus_code` from `GET /campuses` (recommended), or the campus name |
| `amount`            | yes      | Fee paid, at least `5000` (TZS) |
| `email`             | no       | Student's email |
| `referral_code`     | no       | Card number of the referring student (they receive a 2L bonus) |
| `payment_reference` | no       | ChuoCredit payment/transaction reference |

```json
{
  "partner_reference": "CC-2026-000123",
  "full_name": "Asha Juma",
  "gender": "F",
  "mobile": "0712345678",
  "email": "asha@example.com",
  "campus": "CA-000059",
  "referral_code": "",
  "amount": 5000,
  "payment_reference": "CCPAY-889911"
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
    "partner_reference": "CC-2026-000123",
    "mobile": "255712345678",
    "campus_code": "CA-000059"
  }
}
```

| Code  | Meaning |
|-------|---------|
| `200` | `partner_reference` was already registered; the original `data` is returned (safe retry) |
| `401` | Authorization failed |
| `409` | Mobile number already has an Ecowater account or registration |
| `422` | Validation failed; `errors` lists each bad field |
| `500` | Server error; retry with the same `partner_reference` |

```json
{
  "status": "error",
  "message": "Validation failed",
  "errors": { "mobile": "Use 07XXXXXXXX or 255XXXXXXXXX" }
}
```

---

## 2. Check a registration

`GET /status?partner_reference=CC-2026-000123`

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
curl -X POST https://ecowatercloud.com/chuocredit_api/register \
  -H "Content-Type: application/json" \
  -H "auth-token: <TOKEN>" \
  -H "sender: chuocredit" \
  -d '{"partner_reference":"CC-2026-000123","full_name":"Asha Juma","gender":"F","mobile":"0712345678","campus":"CA-000059","amount":5000}'
```
