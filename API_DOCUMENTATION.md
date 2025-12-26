# MODIS API Documentation

## Overview

MODIS API is a RESTful API for managing company information, employees, departments, positions, and related data. This API follows RESTful conventions and uses versioning for backward compatibility.

**Base URL:** `http://localhost:8000/api/v1`

## Authentication

This API uses Laravel Sanctum for authentication. Include your Bearer token in the Authorization header:

```
Authorization: Bearer {your_token}
```

## API Versioning

All endpoints are versioned under `/api/v1/` prefix to ensure backward compatibility when making changes in the future.

## Response Format

All API responses follow this structure:

### Success Response
```json
{
  "data": { ... },
  "message": "Success message (optional)"
}
```

### Error Response
```json
{
  "message": "Error message",
  "errors": { ... }
}
```

---

## Endpoints

### Authentication

#### Get Authenticated User
```
GET /user
```

**Headers:**
- `Authorization: Bearer {token}` (Required)

**Response:**
```json
{
  "id": "uuid",
  "name": "User Name",
  "email": "user@example.com",
  "role_id": "uuid",
  "created_at": "2025-01-01T00:00:00.000000Z",
  "updated_at": "2025-01-01T00:00:00.000000Z"
}
```

---

### Companies

#### Get All Companies
```
GET /companies
```

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "name": "PT Example",
      "tax_id": "1234567890",
      "registration_number": "REG123",
      "phone": "+62 21 1234 5678",
      "email": "info@example.com",
      "website": "https://example.com",
      "address": "Jl. Example No. 1",
      "logo_url": "https://example.com/logo.png",
      "status": "active",
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

#### Get Single Company
```
GET /companies/{company}
```

**Parameters:**
- `company` (UUID, Required): Company ID

**Response:**
```json
{
  "data": {
    "id": "uuid",
    "name": "PT Example",
    "tax_id": "1234567890",
    ...
  }
}
```

#### Create Company
```
POST /companies
```

**Request Body:**
```json
{
  "name": "PT New Company",
  "tax_id": "1234567890",
  "registration_number": "REG123",
  "phone": "+62 21 1234 5678",
  "email": "info@example.com",
  "website": "https://example.com",
  "address": "Jl. Example No. 1",
  "logo_url": "https://example.com/logo.png",
  "status": "active"
}
```

**Response:** Returns the created company object

#### Update Company
```
PUT /companies/{company}
```

**Parameters:**
- `company` (UUID, Required): Company ID

**Request Body:** Same as create company (all fields optional)

**Response:** Returns the updated company object

#### Delete Company
```
DELETE /companies/{company}
```

**Parameters:**
- `company` (UUID, Required): Company ID

**Response:** 204 No Content

---

### Company Locations

#### Get All Company Locations
```
GET /company_locations
```

#### Get Single Company Location
```
GET /company_locations/{company_location}
```

#### Create Company Location
```
POST /company_locations
```

**Request Body:**
```json
{
  "company_id": "uuid",
  "name": "Jakarta Head Office",
  "address": "Jl. Sudirman No. 1",
  "city": "Jakarta",
  "province": "DKI Jakarta",
  "postal_code": "12190",
  "country": "Indonesia",
  "phone": "+62 21 1234 5678",
  "is_headquarters": true
}
```

#### Update Company Location
```
PUT /company_locations/{company_location}
```

#### Delete Company Location
```
DELETE /company_locations/{company_location}
```

---

### Departments

#### Get All Departments
```
GET /departments
```

**Query Parameters:**
- `company_id` (UUID, Optional): Filter by company
- `page` (Integer, Optional): Page number for pagination
- `per_page` (Integer, Optional): Items per page (default: 15)

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "company_id": "uuid",
      "name": "IT Department",
      "code": "IT",
      "description": "Information Technology Department",
      "head_of_department": "uuid",
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ],
  "links": { ... },
  "meta": { ... }
}
```

#### Get Single Department
```
GET /departments/{department}
```

#### Create Department
```
POST /departments
```

**Request Body:**
```json
{
  "company_id": "uuid",
  "name": "IT Department",
  "code": "IT",
  "description": "Information Technology Department",
  "head_of_department": "uuid"
}
```

#### Update Department
```
PUT /departments/{department}
```

#### Delete Department
```
DELETE /departments/{department}
```

---

### Positions

#### Get All Positions
```
GET /positions
```

**Query Parameters:**
- `department_id` (UUID, Optional): Filter by department
- `page` (Integer, Optional): Page number
- `per_page` (Integer, Optional): Items per page

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "department_id": "uuid",
      "title": "Senior Software Engineer",
      "code": "SSE-001",
      "description": "Senior level software engineering position",
      "base_salary": 15000000,
      "level": "senior",
      "is_managerial": false,
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

#### Get Single Position
```
GET /positions/{position}
```

#### Create Position
```
POST /positions
```

**Request Body:**
```json
{
  "department_id": "uuid",
  "title": "Senior Software Engineer",
  "code": "SSE-001",
  "description": "Senior level software engineering position",
  "base_salary": 15000000,
  "level": "senior",
  "is_managerial": false
}
```

#### Update Position
```
PUT /positions/{position}
```

#### Delete Position
```
DELETE /positions/{position}
```

---

### Roles

#### Get All Roles
```
GET /roles
```

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "name": "admin",
      "display_name": "Administrator",
      "description": "Full system access",
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

#### Get Single Role
```
GET /roles/{role}
```

#### Create Role
```
POST /roles
```

**Request Body:**
```json
{
  "name": "manager",
  "display_name": "Manager",
  "description": "Managerial role with department access"
}
```

#### Update Role
```
PUT /roles/{role}
```

#### Delete Role
```
DELETE /roles/{role}
```

---

### Employees

#### Get All Employees
```
GET /employees
```

**Query Parameters:**
- `department_id` (UUID, Optional): Filter by department
- `position_id` (UUID, Optional): Filter by position
- `company_id` (UUID, Optional): Filter by company
- `status` (String, Optional): Filter by status (active, inactive, on_leave)
- `page` (Integer, Optional): Page number
- `per_page` (Integer, Optional): Items per page

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "user_id": "uuid",
      "company_id": "uuid",
      "department_id": "uuid",
      "position_id": "uuid",
      "employee_number": "EMP001",
      "first_name": "Achmad",
      "last_name": "Pratama",
      "email": "achmad@example.com",
      "phone": "+62 811 1234 5678",
      "hire_date": "2020-01-01",
      "status": "active",
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

#### Get Single Employee
```
GET /employees/{employee}
```

**Response:**
```json
{
  "data": {
    "id": "uuid",
    "user_id": "uuid",
    "company_id": "uuid",
    "department_id": "uuid",
    "position_id": "uuid",
    "employee_number": "EMP001",
    "first_name": "Achmad",
    "last_name": "Pratama",
    "email": "achmad@example.com",
    "phone": "+62 811 1234 5678",
    "birth_date": "1990-01-01",
    "gender": "male",
    "hire_date": "2020-01-01",
    "status": "active",
    "created_at": "2025-01-01T00:00:00.000000Z",
    "updated_at": "2025-01-01T00:00:00.000000Z"
  }
}
```

#### Create Employee
```
POST /employees
```

**Request Body:**
```json
{
  "user_id": "uuid",
  "company_id": "uuid",
  "department_id": "uuid",
  "position_id": "uuid",
  "employee_number": "EMP001",
  "first_name": "Achmad",
  "last_name": "Pratama",
  "email": "achmad@example.com",
  "phone": "+62 811 1234 5678",
  "birth_date": "1990-01-01",
  "gender": "male",
  "hire_date": "2020-01-01",
  "status": "active"
}
```

#### Update Employee
```
PUT /employees/{employee}
```

#### Delete Employee
```
DELETE /employees/{employee}
```

---

### Employee Financial Info

#### Get Employee Financial Info
```
GET /employees/{employee}/financial_info
```

**Response:**
```json
{
  "data": {
    "id": "uuid",
    "employee_id": "uuid",
    "bank_name": "BCA",
    "bank_account_number": "1234567890",
    "bank_account_holder": "Achmad Pratama",
    "npwp_number": "123456789012345",
    "bpjs_kesehatan_number": "1234567890",
    "bpjs_ketenagakerjaan_number": "1234567890",
    "created_at": "2025-01-01T00:00:00.000000Z",
    "updated_at": "2025-01-01T00:00:00.000000Z"
  }
}
```

#### Create/Update Employee Financial Info
```
POST /employees/{employee}/financial_info
```

**Request Body:**
```json
{
  "employee_id": "uuid",
  "bank_name": "BCA",
  "bank_account_number": "1234567890",
  "bank_account_holder": "Achmad Pratama",
  "npwp_number": "123456789012345",
  "bpjs_kesehatan_number": "1234567890",
  "bpjs_ketenagakerjaan_number": "1234567890"
}
```

#### Update Employee Financial Info
```
PUT /employees/{employee}/financial_info/{financial_info}
```

---

### Employee Family Members

#### Get All Employee Family Members
```
GET /employees/{employee}/family_members
```

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "employee_id": "uuid",
      "name": "Nur Aini",
      "relationship": "spouse",
      "birth_date": "1992-05-15",
      "phone": "+62 812 3456 7890",
      "occupation": "Teacher",
      "is_dependent": true,
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

#### Create Family Member
```
POST /employees/{employee}/family_members
```

**Request Body:**
```json
{
  "employee_id": "uuid",
  "name": "Nur Aini",
  "relationship": "spouse",
  "birth_date": "1992-05-15",
  "phone": "+62 812 3456 7890",
  "occupation": "Teacher",
  "is_dependent": true
}
```

#### Get Single Family Member
```
GET /employees/{employee}/family_members/{family_member}
```

#### Update Family Member
```
PUT /employees/{employee}/family_members/{family_member}
```

#### Delete Family Member
```
DELETE /employees/{employee}/family_members/{family_member}
```

---

### Employee Addresses

#### Get All Employee Addresses
```
GET /employees/{employee}/addresses
```

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "employee_id": "uuid",
      "address_type": "residential",
      "address_line_1": "Jl. Sudirman No. 123",
      "address_line_2": "Apt 5B",
      "city": "Jakarta",
      "province": "DKI Jakarta",
      "postal_code": "12190",
      "country": "Indonesia",
      "is_primary": true,
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

#### Create Address
```
POST /employees/{employee}/addresses
```

**Request Body:**
```json
{
  "employee_id": "uuid",
  "address_type": "residential",
  "address_line_1": "Jl. Sudirman No. 123",
  "address_line_2": "Apt 5B",
  "city": "Jakarta",
  "province": "DKI Jakarta",
  "postal_code": "12190",
  "country": "Indonesia",
  "is_primary": true
}
```

#### Get Single Address
```
GET /employees/{employee}/addresses/{address}
```

#### Update Address
```
PUT /employees/{employee}/addresses/{address}
```

#### Delete Address
```
DELETE /employees/{employee}/addresses/{address}
```

---

### Employee Education History

#### Get All Education History
```
GET /employees/{employee}/education_history
```

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "employee_id": "uuid",
      "education_level": "S1",
      "institution_name": "Institut Teknologi Bandung",
      "major": "Teknik Informatika",
      "start_year": 2008,
      "end_year": 2012,
      "gpa": 3.75,
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

#### Create Education History
```
POST /employees/{employee}/education_history
```

**Request Body:**
```json
{
  "employee_id": "uuid",
  "education_level": "S1",
  "institution_name": "Institut Teknologi Bandung",
  "major": "Teknik Informatika",
  "start_year": 2008,
  "end_year": 2012,
  "gpa": 3.75
}
```

#### Get Single Education History
```
GET /employees/{employee}/education_history/{education_history}
```

#### Update Education History
```
PUT /employees/{employee}/education_history/{education_history}
```

#### Delete Education History
```
DELETE /employees/{employee}/education_history/{education_history}
```

---

### Employee Work Experiences

#### Get All Work Experiences
```
GET /employees/{employee}/work_experiences
```

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "employee_id": "uuid",
      "company_name": "PT Digital Vision",
      "position": "Software Engineer",
      "start_date": "2012-09-01",
      "end_date": "2015-08-31",
      "job_description": "Developed web applications",
      "reason_for_leaving": "Career advancement",
      "reference_name": "John Doe",
      "reference_contact": "+62 811 0000 0000",
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

#### Create Work Experience
```
POST /employees/{employee}/work_experiences
```

**Request Body:**
```json
{
  "employee_id": "uuid",
  "company_name": "PT Digital Vision",
  "position": "Software Engineer",
  "start_date": "2012-09-01",
  "end_date": "2015-08-31",
  "job_description": "Developed web applications",
  "reason_for_leaving": "Career advancement",
  "reference_name": "John Doe",
  "reference_contact": "+62 811 0000 0000"
}
```

#### Get Single Work Experience
```
GET /employees/{employee}/work_experiences/{work_experience}
```

#### Update Work Experience
```
PUT /employees/{employee}/work_experiences/{work_experience}
```

#### Delete Work Experience
```
DELETE /employees/{employee}/work_experiences/{work_experience}
```

---

### Employee Emergency Contacts

#### Get All Emergency Contacts
```
GET /employees/{employee}/emergency_contacts
```

**Response:**
```json
{
  "data": [
    {
      "id": "uuid",
      "employee_id": "uuid",
      "name": "M. Fauzi Pratama",
      "relationship": "brother",
      "phone_number": "+62 811 2345 6789",
      "address": "Jl. Melati No. 45 RT 05 RW 12, Jakarta Selatan",
      "is_primary": true,
      "created_at": "2025-01-01T00:00:00.000000Z",
      "updated_at": "2025-01-01T00:00:00.000000Z"
    }
  ]
}
```

#### Create Emergency Contact
```
POST /employees/{employee}/emergency_contacts
```

**Request Body:**
```json
{
  "employee_id": "uuid",
  "name": "M. Fauzi Pratama",
  "relationship": "brother",
  "phone_number": "+62 811 2345 6789",
  "address": "Jl. Melati No. 45 RT 05 RW 12, Jakarta Selatan",
  "is_primary": true
}
```

#### Get Single Emergency Contact
```
GET /employees/{employee}/emergency_contacts/{emergency_contact}
```

#### Update Emergency Contact
```
PUT /employees/{employee}/emergency_contacts/{emergency_contact}
```

#### Delete Emergency Contact
```
DELETE /employees/{employee}/emergency_contacts/{emergency_contact}
```

---

## Error Codes

| Status Code | Description |
|-------------|-------------|
| 200 | Success |
| 201 | Created |
| 204 | No Content |
| 400 | Bad Request |
| 401 | Unauthorized |
| 403 | Forbidden |
| 404 | Not Found |
| 422 | Validation Error |
| 500 | Internal Server Error |

## Pagination

List endpoints support pagination. Use the following query parameters:

- `page`: Page number (default: 1)
- `per_page`: Items per page (default: 15, max: 100)

**Paginated Response Structure:**
```json
{
  "data": [...],
  "links": {
    "first": "http://api/v1/employees?page=1",
    "last": "http://api/v1/employees?page=5",
    "prev": "http://api/v1/employees?page=1",
    "next": "http://api/v1/employees?page=3"
  },
  "meta": {
    "current_page": 2,
    "from": 16,
    "last_page": 5,
    "per_page": 15,
    "to": 30,
    "total": 75
  }
}
```

## Filtering & Sorting

Many endpoints support filtering and sorting via query parameters:

**Filtering Example:**
```
GET /employees?department_id={uuid}&status=active
```

**Sorting Example:**
```
GET /employees?sort=hire_date&order=desc
```

## Rate Limiting

API requests are rate-limited to 60 requests per minute per IP address.

## Testing

You can test the API using tools like:
- Postman
- cURL
- Insomnia
- HTTPie

**Example cURL Request:**
```bash
curl -X GET http://localhost:8000/api/v1/employees \
  -H "Authorization: Bearer {token}" \
  -H "Accept: application/json"
```

## Versioning

The API uses URL versioning. The current version is **v1**. Future versions will be available under `/api/v2/`, `/api/v3/`, etc.

---

## Support

For issues or questions, please contact the development team.
