# MCQ Exam & Seating Arrangement

An integrated web application to create and administer MCQ exams and automatically generate seating arrangements for exam halls. This repository combines exam management (question banks, scheduling, scoring) with robust seating assignment features to help organizers run orderly, cheat-resistant exams.

This project is maintained under the Ambitious-CODERS organization on GitHub: [Ambitious-CODERS](https://github.com/Ambitious-CODERS)

Primary languages: HTML (UI), PHP (server-side), SCSS / Less / CSS (styles), small JS for interactivity.

---

## Table of Contents

- [Key features](#key-features)
- [Tech stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Quick installation](#quick-installation)
- [Configuration](#configuration)
- [Usage / Typical workflow](#usage--typical-workflow)
- [Seating algorithm & customization](#seating-algorithm--customization)
- [Database / sample schema](#database--sample-schema)
- [Folder structure (typical)](#folder-structure-typical)
- [Troubleshooting](#troubleshooting)
- [Organization & contributors](#organization--contributors)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## Key features

- Exam management
  - Create MCQ exams with configurable time, duration, and pass criteria
  - Question bank: import, add, edit MCQs (options, correct answer, marks)
  - Scheduling: set exam date/time and the halls/rooms they run in
  - Online test interface (front-end) for students (if included in repo)
  - Automatic scoring and result export (CSV/PDF)

- Seating arrangement
  - Define halls, rows, and seat counts
  - Import student lists and map students to exams/rooms
  - Auto-generate seating plans with options:
    - Randomized allocation
    - Group separation / avoid adjacent seats for same school/section
    - Pattern-based placements (e.g., alternate seats)
  - Print-friendly seating charts and printable PDFs

- Admin features
  - Student management (bulk import via CSV)
  - Exam session management
  - Export reports and seating manifests

---

## Tech stack

- Frontend: HTML, SCSS / Less / CSS, light JavaScript
- Backend: PHP (vanilla or micro framework—see repository files)
- Database: MySQL / MariaDB (commonly) — SQLite possible with light edits
- Optional: Composer for PHP packages

---

## Prerequisites

- PHP 7.4+ (or compatible)
- Web server (Apache, Nginx) or an all-in-one stack (XAMPP, MAMP, WAMP)
- MySQL / MariaDB (or other DB if supported)
- Git (for source control)

---

## Quick installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Ambitious-CODERS/MCQ-Exam-Seating-Arrangement.git
   cd MCQ-Exam-Seating-Arrangement
   ```

2. Place the project in your web server document root (or configure a virtual host).

3. Create the database:
   - If `db/schema.sql` exists:
     ```bash
     mysql -u root -p mcq_seating < db/schema.sql
     ```
   - Otherwise, inspect `db/` or `sql/` for schema or sample data.

4. Copy the example config (if provided) and update DB credentials:
   ```bash
   cp config.example.php config.php
   # edit config.php to add DB credentials and base URL
   ```

5. Ensure the web server can read/write any `uploads/` or `storage/` directories.

6. Open the app in your browser:
   - http://localhost/MCQ-Exam-Seating-Arrangement/ (adjust to your setup)

---

## Configuration

Look for configuration or environment files; common names:
- `config.php`, `config.example.php`
- `.env` or `.env.example`

Typical settings to set:
- Database host, user, password, database name
- Base URL / app URL
- Upload paths and temporary storage
- Mail settings (if emailing results / notifications)

Example safe config snippet (do not commit secrets):
```php
<?php
return [
  'db' => [
    'host' => '127.0.0.1',
    'user' => 'root',
    'pass' => '',
    'name' => 'mcq_seating',
  ],
  'base_url' => 'http://localhost/MCQ-Exam-Seating-Arrangement',
];
```

---

## Usage / Typical workflow

1. Admin: create exam and exam session (title, date/time, duration).
2. Admin: add MCQ questions to a question bank or import CSV.
3. Admin: create halls/rooms with rows and seat counts.
4. Admin: import student roster (CSV) and assign students to exam sessions or batches.
5. Generate seating plan:
   - Choose hall/session
   - Select algorithm options (randomize, spacing rules)
   - Generate and preview seating chart
6. Publish exam to students (if online) and/or print seating charts for invigilators.
7. After exam: upload/collect answer sheets or process online responses → view/export results.

---

## Seating algorithm & customization

Files that handle seating logic are usually in directories like `includes/`, `lib/`, `app/`, or `controllers/`. Search for filenames or functions containing:
- seat, seating, arrangement, allocate, assign

Common configurable options:
- Random vs deterministic assignment (use seeded RNG for reproducible allocations)
- Constraints: avoid placing students from same class/section nearby
- Patterns: row-wise / column-wise / alternate seat patterns
- Gap enforcement to maintain spacing

Tips:
- For reproducible random seating, seed with a known value (e.g., exam id + date).
- Keep constraint checks O(1) where possible and avoid repeated scans of the full seat map.
- When adding complex constraints, consider backtracking or greedy heuristics; add logging to debug allocations.

---

## Database / sample schema

If the repo includes `db/schema.sql`, use that. Typical tables:
- exams (id, title, start_time, duration, settings)
- questions (id, exam_id, text, option_a..d, correct_option, marks)
- students (id, roll_no, name, group, email)
- halls (id, name, rows, seats_per_row)
- seats (id, hall_id, row, number)
- assignments (id, exam_id, student_id, seat_id, hall_id)

Look under `/db`, `/sql`, or `/migrations` for exact files.

---

## Folder structure (typical)

- /                — project root
- /public or /www  — public entry files (index.php, exam pages)
- /assets          — CSS/SCSS, JS, images
- /includes or /app — PHP classes, helpers, controllers
- /db or /sql      — schema and sample data
- /uploads         — uploaded CSVs or images
- /docs            — additional documentation

Adjust based on the actual repository layout.

---

## Troubleshooting

- Blank pages: enable PHP errors for development
  ```php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  ```
- DB connection failures: confirm credentials, host, and port
- Permissions: ensure `uploads/` and any generated export folders are writable by the web server user
- Seat collisions: if generated assignments duplicate seats, check the generator's uniqueness checks and re-run with a seed or reset assignments

---

## Security & privacy notes

- Do not commit database credentials or API keys.
- Sanitize and validate any imported CSVs to avoid injection or malformed data.
- If storing student data, ensure compliance with local privacy rules (access control, minimal retention).

---

## Organization & contributors

This repository is part of the Ambitious-CODERS organization.

Maintainers and organization members
- [@ommankar2008](https://github.com/ommankar2008) – *Om Mankar* (Project Lead)
- [@savjigajanan2006](https://github.com/savjigajanan2006) – *Gajanan Savji*
- [@vedantkolte2007](https://github.com/vedantkolte2007) – *Vedant Kolte*
- [@shiv-2707](https://github.com/shiv-2707) – *Shivraj Dalave*

Notes:
- Replace the placeholder handles above with actual GitHub handles of organization members to properly tag them.
- To mention the entire organization in an issue or PR you can use `@Ambitious-CODERS` (this mentions the org but may not notify every member depending on their notification settings).
- If you want me to insert and tag every organization member programmatically, I can fetch the members list and update this section — confirm and I will proceed.

Acknowledgements
- Thanks to all Ambitious-CODERS members and external contributors for improvements, testing, and bug reports.

---

## Contributing

1. Fork the repo
2. Create a feature branch: `git checkout -b feature/your-feature`
3. Commit, push, and open a pull request
4. Describe changes, migration steps, and sample data for testing

Please include test data and clear setup steps for bigger changes (DB migrations, config updates).

If you are a member of the Ambitious-CODERS organization and want to be listed in the Maintainers section, send your GitHub handle or allow the repository administrator to add you automatically.

---

## License

Add a license file (e.g., MIT) to make terms clear. If you want, I can propose a LICENSE file for you.

---

## Contact

Organization: [Ambitious-CODERS](https://github.com/Ambitious-CODERS)  
Primary contact / repo owner: [@ommankar2008](https://github.com/ommankar2008)

If you want, I can:
- commit this README to the repository,
- replace the member placeholders with actual organization member handles (I can fetch them if you permit),
- produce a matching LICENSE,
- create an INSTALL.md with screenshots,
- or tailor the README to specific file names and routes found in your repo (point me to them and I will update the text accordingly).
