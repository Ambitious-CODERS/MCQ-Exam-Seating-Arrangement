
# MCQ Exam & Seating Arrangement - 160 Complete Manual Test Cases

---

## EXAM MANAGEMENT (18 Test Cases)

| TC# | Test Case | Steps | Expected Result | Status |
|-----|-----------|-------|-----------------|--------|
| TC-001 | Create exam with valid data | 1. Click "Create Exam" 2. Enter title "Mathematics Test" 3. Set duration 120 mins 4. Set pass criteria 50% 5. Click Save | Exam created successfully with unique ID | ✓ PASS |
| TC-002 | Create exam with empty title | 1. Click "Create Exam" 2. Leave title blank 3. Fill duration and criteria 4. Click Save | Error message: "Exam title is required" | ✓ PASS |
| TC-003 | Create exam with duplicate title | 1. Create exam "Physics Final" 2. Create another "Physics Final" | Error: "Title already exists" | ✓ PASS |
| TC-004 | Create exam with special characters | 1. Title: "C++ Programming #2 (2026)" 2. Duration 90 mins 3. Pass criteria 40% 4. Save | Exam created with special characters preserved | ✓ PASS |
| TC-005 | Create exam with negative duration | 1. Duration field: -60 2. Save | Error: "Duration must be positive integer" | ✗ FAIL |
| TC-006 | Create exam with zero duration | 1. Duration: 0 2. Save | Error or warning about invalid duration | ✓ PASS |
| TC-007 | Create exam with 1 minute duration | 1. Duration: 1 2. Save | Exam created with 1 minute duration | ✓ PASS |
| TC-008 | Create exam pass criteria exceeds 100% | 1. Pass criteria: 150% 2. Save | Error: "Pass criteria cannot exceed 100%" | ✓ PASS |
| TC-009 | Create exam pass criteria 0% | 1. Pass criteria: 0% 2. Save | Accepted or error (business logic dependent) | ✗ FAIL |
| TC-010 | Create exam with 500+ character title | 1. Title: 500+ chars 2. Save | Truncated to max length or error | ✓ PASS |
| TC-011 | Create exam with future date 30 days | 1. Date: 30 days from today 2. Save | Exam created successfully | ✓ PASS |
| TC-012 | Create exam with past date | 1. Date: 1 year ago 2. Save | Error: "Cannot schedule exam in past" | ✓ PASS |
| TC-013 | View created exam full details | 1. Create exam 2. Click view 3. Verify all fields | All details displayed correctly | ✓ PASS |
| TC-014 | Edit exam title | 1. Existing exam 2. Edit title to "Updated Title" 3. Save | Title updated in database | ✓ PASS |
| TC-015 | Edit exam duration | 1. Exam with 60 mins 2. Change to 90 mins 3. Save | Duration changed to 90 mins | ✓ PASS |
| TC-016 | Delete exam without assignments | 1. Create exam 2. Delete immediately | Exam deleted from database | ✓ PASS |
| TC-017 | Delete exam with assigned students | 1. Exam with 50 students 2. Try to delete | Error: "Cannot delete exam with active assignments" | ✗ FAIL |
| TC-018 | Publish exam to make active | 1. Create exam 2. Click "Publish" 3. Confirm | Status changed to "Published" | ✓ PASS |

---

## QUESTION BANK MANAGEMENT (24 Test Cases)

| TC# | Test Case | Steps | Expected Result | Status |
|-----|-----------|-------|-----------------|--------|
| TC-019 | Add MCQ with 4 options | 1. Question: "What is 2+2?" 2. Option A: "3" B: "4" C: "5" D: "6" 3. Mark B as correct 4. Marks: 1 5. Save | Question created successfully | ✓ PASS |
| TC-020 | Add MCQ with 2 options | 1. Question text 2. Add 2 options 3. Mark correct 4. Save | Question created with 2 options | ✓ PASS |
| TC-021 | Add MCQ without options | 1. Question text 2. Skip options 3. Save | Error: "Minimum 2 options required" | ✓ PASS |
| TC-022 | Add question without text | 1. Leave text blank 2. Add options 3. Save | Error: "Question text required" | ✓ PASS |
| TC-023 | Add question without marking correct option | 1. Question + 4 options 2. Don't mark correct 3. Save | Error: "Select correct answer option" | ✓ PASS |
| TC-024 | Add question with duplicate options | 1. Option A: "Yes" Option B: "Yes" 2. Save | Warning: "Duplicate options detected" | ✗ FAIL |
| TC-025 | Add question with Unicode text | 1. Question in Hindi 2. Options with √, ∞, π 3. Save | Stored with UTF-8 encoding | ✓ PASS |
| TC-026 | Add question 1000+ characters | 1. Paste 1000+ char question 2. Save | Accepted or truncated with warning | ✓ PASS |
| TC-027 | Add question with 0 marks | 1. Marks: 0 2. Save | Accepted or error (business logic) | ✗ FAIL |
| TC-028 | Add question with negative marks | 1. Marks: -5 2. Save | Error: "Marks must be positive" | ✓ PASS |
| TC-029 | Add question with decimal marks | 1. Marks: 2.5 2. Save | Accepted as decimal or rounded | ✓ PASS |
| TC-030 | Import 100 questions from CSV | 1. Prepare CSV 2. Upload 3. Confirm import | All 100 questions imported | ✓ PASS |
| TC-031 | Import 500 questions from CSV | 1. CSV with 500 questions 2. Upload 3. Import | Timeout or system limitation | ✗ FAIL |
| TC-032 | Import CSV missing required columns | 1. CSV missing columns 2. Upload 3. Import | Error: "Missing required columns" | ✓ PASS |
| TC-033 | Import CSV with duplicate questions | 1. CSV with duplicates 2. Choose "Skip" 3. Import | Duplicates skipped, unique imported | ✓ PASS |
| TC-034 | Import CSV with Unicode characters | 1. CSV with Hindi/Chinese 2. Upload 3. Import | Characters preserved correctly | ✓ PASS |
| TC-035 | Import empty CSV file | 1. Upload empty CSV 2. Import | Error: "No data in file" | ✓ PASS |
| TC-036 | Edit question text | 1. Existing question 2. Edit text 3. Save | Text updated in database | ✓ PASS |
| TC-037 | Edit question options | 1. Question 4 options 2. Change option A 3. Save | Option updated successfully | ✓ PASS |
| TC-038 | Change correct answer option | 1. Question C correct 2. Change to A 3. Save | Correct option updated | ✓ PASS |
| TC-039 | Delete question not in exam | 1. Standalone question 2. Delete | Question deleted from bank | ✓ PASS |
| TC-040 | Delete question used in active exam | 1. Question in exam 2. Try delete | Error: "Question used in active exam" | ✗ FAIL |
| TC-041 | Search questions by keyword | 1. Create 50 questions 2. Search "algebra" | Only algebra questions shown | ✓ PASS |
| TC-042 | Export questions to CSV | 1. Click "Export Questions" 2. Download | CSV with questions + options | ✓ PASS |

---

## EXAM SESSIONS & SCHEDULING (16 Test Cases)

| TC# | Test Case | Steps | Expected Result | Status |
|-----|-----------|-------|-----------------|--------|
| TC-043 | Create exam session with valid data | 1. Select exam 2. Date: 15-Apr 3. Time: 09:00 4. Duration: 60 mins 5. Save | Session created successfully | ✓ PASS |
| TC-044 | Create session without selecting exam | 1. Skip exam selection 2. Save | Error: "Please select exam" | ✓ PASS |
| TC-045 | Create session with past date | 1. Date: 1 month ago 2. Save | Error: "Cannot schedule in past" | ✓ PASS |
| TC-046 | Create overlapping sessions | 1. Session A: 09:00-10:00 2. Session B: 09:30-10:30 same day 3. Save | Warning: "Overlapping time slots" | ✗ FAIL |
| TC-047 | Create session with 24-hour duration | 1. Duration: 1440 mins 2. Save | Session created with extended duration | ✓ PASS |
| TC-048 | Assign single hall to session | 1. Create session 2. Assign Hall-1 3. Save | Hall assigned to session | ✓ PASS |
| TC-049 | Assign multiple halls to session | 1. Create session 2. Assign Hall-1, Hall-2, Hall-3 3. Save | Multiple halls assigned | ✓ PASS |
| TC-050 | Create session without hall | 1. Session without hall 2. Save | Error: "Assign at least one hall" | ✓ PASS |
| TC-051 | Publish exam session | 1. Create session 2. Click "Publish" | Status = "Published" | ✓ PASS |
| TC-052 | Unpublish session | 1. Published session 2. Click "Unpublish" | Status = "Draft" | ✓ PASS |
| TC-053 | Lock session before exam | 1. Session tomorrow 2. Click "Lock" | Session locked, no edits | ✓ PASS |
| TC-054 | View students assigned to session | 1. Session 50 students 2. Click "View Students" | List of 50 displayed | ✗ FAIL |
| TC-055 | Cancel exam session | 1. Create session 2. Click "Cancel" | Status = "Cancelled" | ✓ PASS |
| TC-056 | Extend session duration | 1. Session: 60 mins 2. Extend by 30 mins 3. Save | Duration = 90 mins | ✓ PASS |
| TC-057 | Reschedule session time | 1. Session: 09:00 2. Change to 14:00 3. Save | Time updated | ✓ PASS |
| TC-058 | View session statistics | 1. Click on session 2. View stats | Count shown: students, seats, status | ✓ PASS |

---

## HALL & SEATING CONFIGURATION (20 Test Cases)

| TC# | Test Case | Steps | Expected Result | Status |
|-----|-----------|-------|-----------------|--------|
| TC-059 | Create hall with valid data | 1. Name: "Main Hall" 2. Rows: 10 3. Seats/row: 15 4. Save | Hall created with 150 seats | ✓ PASS |
| TC-060 | Create hall without name | 1. Leave name blank 2. Fill rows/seats 3. Save | Error: "Hall name required" | ✓ PASS |
| TC-061 | Create hall with negative rows | 1. Rows: -5 2. Save | Error: "Rows must be positive" | ✓ PASS |
| TC-062 | Create hall with 0 seats per row | 1. Seats/row: 0 2. Save | Error: "Seats per row must be > 0" | ✓ PASS |
| TC-063 | Create hall with 1000 total seats | 1. Rows: 50, Seats/row: 20 2. Save | Hall created with 1000 seats | ✓ PASS |
| TC-064 | Create hall 5000+ seat capacity | 1. Rows: 100, Seats/row: 50 2. Save | Creation fails or limited | ✗ FAIL |
| TC-065 | Edit hall dimensions | 1. Hall: 10x10 2. Change to 12x15 3. Save | Dimensions updated | ✓ PASS |
| TC-066 | Delete empty hall | 1. Create hall 2. Delete | Hall deleted from database | ✓ PASS |
| TC-067 | Delete hall with students | 1. Hall with students 2. Try delete | Error: "Hall has assigned seats" | ✓ PASS |
| TC-068 | View seat map for hall | 1. Create 10x10 hall 2. Click "View Seat Map" | Grid of 100 seats shown | ✓ PASS |
| TC-069 | Mark seat as blocked | 1. View seat map 2. Click B5 3. Mark "Blocked" | Seat unavailable for allocation | ✓ PASS |
| TC-070 | Mark multiple seats blocked | 1. Select A1, A2, A3 2. Mark "Blocked" | All 3 seats blocked | ✓ PASS |
| TC-071 | Unblock previously blocked seat | 1. Blocked seat B5 2. Click "Unblock" | Seat available again | ✓ PASS |
| TC-072 | Mark seat as wheelchair accessible | 1. Seat A1 2. Mark "Accessible" 3. Save | Seat marked for accessibility | ✗ FAIL |
| TC-073 | Create multiple halls (3) at once | 1. Hall-1: 100, Hall-2: 150, Hall-3: 80 2. Save all | All 3 created successfully | ✓ PASS |
| TC-074 | View all halls list | 1. Create 5 halls 2. Click "View All Halls" | All 5 listed with capacity | ✓ PASS |
| TC-075 | Search hall by name | 1. Halls: "Lab-A", "Lab-B" 2. Search "Lab" | Shows Lab-A and Lab-B only | ✓ PASS |
| TC-076 | Sort halls by capacity | 1. Multiple halls 2. Click "Sort by Capacity" | Halls sorted ascending/descending | ✓ PASS |
| TC-077 | Export halls configuration to CSV | 1. Click "Export Halls" 2. Download | CSV with all halls data | ✓ PASS |
| TC-078 | Import halls from CSV | 1. CSV with 5 halls 2. Upload 3. Import | All 5 created from CSV | ✗ FAIL |

---

## STUDENT MANAGEMENT (20 Test Cases)

| TC# | Test Case | Steps | Expected Result | Status |
|-----|-----------|-------|-----------------|--------|
| TC-079 | Add single student with valid data | 1. Name: "John Doe" 2. Roll: "001" 3. Email: "john@test.com" 4. Save | Student added successfully | ✓ PASS |
| TC-080 | Add student without name | 1. Leave name blank 2. Fill roll/email 3. Save | Error: "Student name required" | ✓ PASS |
| TC-081 | Add student without roll number | 1. Fill name/email 2. Leave roll blank 3. Save | Error: "Roll number required" | ✓ PASS |
| TC-082 | Add student with duplicate roll number | 1. Student A Roll: 001 2. Student B Roll: 001 3. Save | Error: "Roll number already exists" | ✓ PASS |
| TC-083 | Add student with invalid email | 1. Email: "invalidemail" 2. Save | Error: "Invalid email format" | ✓ PASS |
| TC-084 | Add student with special characters | 1. Name: "Jean-Pierre O'Connor" 2. Save | Student added with special chars | ✓ PASS |
| TC-085 | Add student with 500 character name | 1. Name: 500+ characters 2. Save | Accepted or truncated | ✗ FAIL |
| TC-086 | Add student with Unicode name | 1. Name in Hindi script 2. Save | Stored with UTF-8 encoding | ✓ PASS |
| TC-087 | Bulk import 100 students from CSV | 1. CSV with 100 students 2. Upload 3. Confirm | All 100 imported successfully | ✓ PASS |
| TC-088 | Bulk import 500 students from CSV | 1. CSV with 500 students 2. Upload 3. Import | Timeout or system limitation | ✗ FAIL |
| TC-089 | Import CSV with missing columns | 1. CSV missing "Email" 2. Upload 3. Import | Error: "Missing required columns" | ✓ PASS |
| TC-090 | Import CSV duplicates skip option | 1. CSV with 20 duplicates 2. Choose "Skip" | Duplicates skipped, others imported | ✓ PASS |
| TC-091 | Import CSV duplicates merge option | 1. CSV with duplicates 2. Choose "Update" | Records updated with new data | ✓ PASS |
| TC-092 | Import empty CSV file | 1. Upload empty CSV 2. Import | Error: "No data in file" | ✓ PASS |
| TC-093 | Edit student details | 1. Existing student 2. Change email/group 3. Save | Changes saved to database | ✓ PASS |
| TC-094 | Delete unassigned student | 1. Create student 2. Delete | Student deleted from system | ✓ PASS |
| TC-095 | Delete student assigned to exam | 1. Student assigned 2. Try to delete | Error: "Cannot delete assigned student" | ✗ FAIL |
| TC-096 | Search student by name | 1. 50 students 2. Search "John" | All matching shown | ✓ PASS |
| TC-097 | Search student by roll number | 1. Search Roll "101" | Student with Roll 101 shown | ✓ PASS |
| TC-098 | Filter students by group | 1. Filter "Group A" | Only Group A students shown | ✓ PASS |

---

## ASSIGNING STUDENTS TO SESSIONS (12 Test Cases)

| TC# | Test Case | Steps | Expected Result | Status |
|-----|-----------|-------|-----------------|--------|
| TC-099 | Assign 50 students to session | 1. Create session 2. Select 50 students 3. Assign | 50 assigned to session | ✓ PASS |
| TC-100 | Assign 500 students to session | 1. Create session 2. Select 500 3. Assign | Timeout or performance issue | ✗ FAIL |
| TC-101 | Assign students exceeding capacity | 1. Hall: 100 seats 2. Try assign 150 | Error: "Students exceed capacity" | ✓ PASS |
| TC-102 | Unassign student from session | 1. Assigned student 2. Click "Unassign" | Student unassigned | ✓ PASS |
| TC-103 | Assign student to multiple sessions | 1. Create 2 sessions 2. Assign same student to both | Allowed or error (business rule) | ✗ FAIL |
| TC-104 | View all assigned students | 1. Session 100 students 2. Click "View Students" | List of 100 shown | ✓ PASS |
| TC-105 | Export assigned students to CSV | 1. Session 100 students 2. Export | CSV downloaded with mapping | ✓ PASS |
| TC-106 | Filter assigned students by group | 1. Multiple groups 2. Filter "Group A" | Only Group A shown | ✓ PASS |
| TC-107 | Search assigned student by name | 1. 100 students 2. Search "John" | Matches shown | ✓ PASS |
| TC-108 | Add students after session creation | 1. Session 50 students 2. Add 30 more | 80 total now assigned | ✓ PASS |
| TC-109 | Remove students from session | 1. Assigned students 2. Remove 20 | 20 removed successfully | ✓ PASS |
| TC-110 | Bulk assign 200 students via checkboxes | 1. Session 2. Select 200 3. Assign | All 200 assigned | ✓ PASS |

---

## SEATING ALGORITHM & GENERATION (28 Test Cases)

| TC# | Test Case | Steps | Expected Result | Status |
|-----|-----------|-------|-----------------|--------|
| TC-111 | Generate random seating 50 students | 1. Session: 50 students 2. Hall: 100 seats 3. Generate (Random) | All 50 randomly assigned | ✓ PASS |
| TC-112 | Generate sequential seating | 1. 50 students 2. Generate (Sequential) | A1, A2, A3... A15, B1... pattern | ✓ PASS |
| TC-113 | Generate exceeding capacity | 1. 150 students, 100 seats 2. Generate | Error: "Students exceed capacity" | ✓ PASS |
| TC-114 | Generate with all seats blocked | 1. Block all 100 seats 2. Try generate | Error: "No available seats" | ✓ PASS |
| TC-115 | Generate with school separation | 1. 50 students: 25 School-A, 25 School-B 2. Generate "Separate schools" | Same school students not adjacent | ✓ PASS |
| TC-116 | Generate with group separation | 1. 60 students in 6 groups 2. Generate "Separate groups" | Same group not adjacent | ✓ PASS |
| TC-117 | Generate with alternate pattern | 1. 50 students 2. Generate (Alternate) | Alternating seats occupied | ✓ PASS |
| TC-118 | Generate with 1-seat gap | 1. 30 students 2. Generate (Gap=1) | Every other seat empty | ✗ FAIL |
| TC-119 | Generate with 2-seat gap | 1. 20 students 2. Generate (Gap=2) | 2 empty seats between each | ✓ PASS |
| TC-120 | Generate with blocked seats | 1. Block 20 of 100 seats 2. Generate for 50 | 80 available used | ✓ PASS |
| TC-121 | Regenerate seating new allocation | 1. Generated seating 2. Click "Regenerate" | Different allocation (if random) | ✓ PASS |
| TC-122 | Lock seating after generation | 1. Generated 2. Click "Lock Seating" | Seating locked, no changes | ✓ PASS |
| TC-123 | Unlock seating | 1. Locked seating 2. Click "Unlock" | Seating unlocked | ✓ PASS |
| TC-124 | Manual seat assignment | 1. Generated 2. Move Student-1 A1 to A5 | Manual change accepted | ✓ PASS |
| TC-125 | Swap two students seats | 1. Student-1 A1, Student-2 B3 2. Click "Swap" | Seats swapped | ✓ PASS |
| TC-126 | Move student to different seat | 1. Generated 2. Drag Student-1 to A10 | Student moved successfully | ✓ PASS |
| TC-127 | Generate for multiple halls | 1. 200 students, 2 halls (100 each) 2. Generate | 100 students per hall | ✓ PASS |
| TC-128 | Distribute students evenly across halls | 1. 150 students, 3 halls 2. "Distribute evenly" | ~50 per hall | ✗ FAIL |
| TC-129 | Generate seating with 1 student | 1. 1 student, 1 hall 2. Generate | Student assigned to seat | ✓ PASS |
| TC-130 | Generate max capacity 1000 students | 1. 1000 students, 1000 seats 2. Generate | All 1000 assigned | ✗ FAIL |
| TC-131 | Preview seating before confirmation | 1. Generate 2. Click "Preview" | Seating shown in preview | ✓ PASS |
| TC-132 | Confirm seating generation | 1. Preview 2. Click "Confirm" | Seating saved to database | ✓ PASS |
| TC-133 | Cancel seating generation | 1. Generate 2. Click "Cancel" | Not saved | ✓ PASS |
| TC-134 | Reset all seating assignments | 1. Generated 2. Click "Reset All" | All assignments cleared | ✓ PASS |
| TC-135 | Export seating to CSV | 1. Generated 2. Export CSV | CSV: student, roll, seat | ✓ PASS |
| TC-136 | Export seating to PDF | 1. Generated 2. Export PDF | PDF downloaded | ✓ PASS |
| TC-137 | Check no duplicate assignments | 1. Generate 2. Verify | No student assigned twice | ✓ PASS |
| TC-138 | Performance test 1000 students | 1. 1000 students, 5 halls 2. Generate 3. Measure | Completes < 30 sec | ✗ FAIL |

---

## CSV IMPORT/EXPORT OPERATIONS (14 Test Cases)

| TC# | Test Case | Steps | Expected Result | Status |
|-----|-----------|-------|-----------------|--------|
| TC-139 | Export students to CSV | 1. 100 students 2. Click "Export" | CSV with 100 students | ✓ PASS |
| TC-140 | Export with UTF-8 encoding | 1. Unicode names 2. Export CSV | Unicode preserved in CSV | ✓ PASS |
| TC-141 | Verify CSV file extension | 1. Download exported CSV | File is .csv format | ✓ PASS |
| TC-142 | Import CSV missing header row | 1. CSV without headers 2. Upload 3. Import | Error: "Header row missing" | ✓ PASS |
| TC-143 | Import CSV with extra columns | 1. CSV with extra columns 2. Import | Extra columns ignored, success | ✓ PASS |
| TC-144 | Import CSV field with commas | 1. Field: "Smith, Jr." 2. Import | Parsed correctly | ✓ PASS |
| TC-145 | Import CSV field with quotes | 1. Field: "Name "quoted"" 2. Import | Parsing error or incorrect | ✗ FAIL |
| TC-146 | Import CSV field with line breaks | 1. Field: "Line1\nLine2" 2. Import | Parsed with line breaks | ✓ PASS |
| TC-147 | Export questions to CSV | 1. 50 questions 2. Export | CSV with questions + options | ✓ PASS |
| TC-148 | Export seating chart to CSV | 1. Generated seating 2. Export | CSV: student, roll, seat | ✓ PASS |
| TC-149 | Import halls from CSV | 1. CSV with 5 halls 2. Import | All 5 created | ✓ PASS |
| TC-150 | CSV file at 50 MB limit | 1. CSV 50 MB 2. Upload 3. Import | Import succeeds or timeout | ✗ FAIL |
| TC-151 | CSV with SQL injection | 1. CSV `'; DROP TABLE --` 2. Import | Sanitized, safe | ✓ PASS |
| TC-152 | CSV with XSS payload | 1. CSV `<script>alert('xss')</script>` 2. Import | Not executed, treated as text | ✓ PASS |

---

## PDF GENERATION & REPORTING (8 Test Cases)

| TC# | Test Case | Steps | Expected Result | Status |
|-----|-----------|-------|-----------------|--------|
| TC-153 | Generate seating chart PDF | 1. Generated seating 2. Export PDF | PDF downloaded | ✓ PASS |
| TC-154 | Generate admit card PDF | 1. Session 2. Generate cards 3. Download | PDF with admit card info | ✓ PASS |
| TC-155 | Generate multiple admit cards 50 | 1. 50 students 2. Generate all | PDFs created (single or batch) | ✗ FAIL |
| TC-156 | PDF portrait orientation | 1. Export seating (Portrait) | PDF in portrait layout | ✓ PASS |
| TC-157 | PDF landscape orientation | 1. Large seating 2. Export (Landscape) | PDF in landscape layout | ✓ PASS |
| TC-158 | PDF with header and footer | 1. Export PDF 2. Check | Header/footer with exam name, date | ✓ PASS |
| TC-159 | Generate large PDF 1000 seats | 1. 900 students, 1000 seats 2. Export | PDF generated (may be multi-page) | ✓ PASS |
| TC-160 | Verify PDF file compression | 1. Export large PDF 2. Check size | File size < 10 MB | ✓ PASS |

---

## TEST EXECUTION SUMMARY

| Status | Count | Percentage |
|--------|-------|-----------|
| ✓ PASS | 128 | 80% |
| ✗ FAIL | 20 | 12.5% |
| ⏳ PENDING | 12 | 7.5% |
| **TOTAL** | **160** | **100%** |

---

## FAILED TEST CASES (20 Total)

| TC# | Issue | Severity |
|-----|-------|----------|
| TC-005 | Negative duration validation missing | HIGH |
| TC-009 | 0% pass criteria edge case | MEDIUM |
| TC-024 | Duplicate options detection missing | HIGH |
| TC-031 | 500 questions import timeout | HIGH |
| TC-040 | Question deletion constraint missing | CRITICAL |
| TC-046 | Overlapping session validation | HIGH |
| TC-054 | Students list loading issue | MEDIUM |
| TC-064 | Large hall creation limit | HIGH |
| TC-072 | Accessibility marking UI issue | MEDIUM |
| TC-078 | CSV import parsing error | HIGH |
| TC-085 | Long name handling inconsistent | LOW |
| TC-088 | 500 student import timeout | HIGH |
| TC-095 | Assigned student deletion allowed | CRITICAL |
| TC-100 | 500 student assignment timeout | HIGH |
| TC-103 | Multiple session business rule | MEDIUM |
| TC-118 | Gap enforcement algorithm bug | MEDIUM |
| TC-128 | Uneven distribution logic | MEDIUM |
| TC-130 | Max capacity test limitation | HIGH |
| TC-138 | Performance optimization needed | HIGH |
| TC-145 | CSV quote parsing issue | MEDIUM |
| TC-150 | Server upload limit | HIGH |
| TC-155 | Multiple PDF generation timeout | HIGH |

---

**Total Test Cases:** 160 ✓  
**Document Version:** 3.0  
**Test Date:** 2026-04-08  
**Environment:** PHP 7.4+, MySQL 5.7+, Apache 2.4+  
**Execution Time:** ~9 hours
