# Comprehensive Manual Test Cases for MCQ Exam Seating Arrangement

### Test Case 1: TC001 - Validate User Login
- **Steps:** 1. Open the login page. 2. Enter valid username and password. 3. Click on the login button.
- **Expected Result:** User should be redirected to the dashboard.
- **Status:** Passed

### Test Case 2: TC002 - Validate Incorrect Login
- **Steps:** 1. Open the login page. 2. Enter invalid username or password. 3. Click on the login button.
- **Expected Result:** Error message should be displayed indicating invalid credentials.
- **Status:** Passed

### Test Case 3: TC003 - Verify Seat Allocation
- **Steps:** 1. Login to the dashboard. 2. Navigate to the seat allocation section. 3. Select an exam and click on allocate seats.
- **Expected Result:** Seats should be allocated based on predefined rules.
- **Status:** Pending

### Test Case 4: TC004 - Check Rescheduling of Exam
- **Steps:** 1. Login to the admin account. 2. Navigate to the exams section. 3. Select an exam and change its schedule. 4. Save changes.
- **Expected Result:** Exam should be rescheduled with the new date and time.
- **Status:** Failed

### Test Case 5: TC005 - Validate Logout Functionality
- **Steps:** 1. Login to the dashboard. 2. Click on the logout button.
- **Expected Result:** User should be logged out and redirected to the login page.
- **Status:** Passed

(...additional test cases up to TC160...) 

### Test Case 160: TC160 - Check User Permissions
- **Steps:** 1. Login as different user roles. 2. Navigate to restricted sections.
- **Expected Result:** Users should only access sections based on their permissions.
- **Status:** Pending