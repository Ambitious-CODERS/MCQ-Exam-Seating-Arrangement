# Manual Test Cases Document for MCQ Exam Seating Arrangement

## Overview
This document provides a comprehensive list of manual test cases for the MCQ Exam Seating Arrangement system. A total of 160 test cases covering various functionalities and scenarios have been outlined.

## Test Case Structure
每一个测试用例包含以下字段:
- **Test Case ID**: Unique identifier for the test case.
- **Test Scenario**: Description of what is being tested.
- **Test Steps**: Detailed steps needed to execute the test case.
- **Expected Result**: The expected outcome after performing the test steps.
- **Status**: Pass/Fail based on the actual results.

## Test Cases
| Test Case ID | Test Scenario                       | Test Steps                               | Expected Result                        | Status   |
|---------------|-------------------------------------|------------------------------------------|---------------------------------------|----------|
| TC001        | Validate user login                | 1. Open the login page. 2. Enter valid credentials. 3. Click login. | User is successfully logged in.      | Pending  |
| TC002        | Check invalid login attempts       | 1. Open the login page. 2. Enter invalid credentials. 3. Click login. | Error message displayed.             | Pending  |
| TC003        | Verify seating arrangement display  | 1. Log in. 2. Navigate to seating arrangement page. | Seating arrangement is displayed correctly. | Pending  |
| TC004        | Test multiple choice questions display | 1. Log in. 2. Navigate to MCQ section. | Questions are displayed.             | Pending  |
| TC005        | Validate timer functionality       | 1. Start exam. 2. Monitor timer. | Timer counts down correctly.         | Pending  |
| TC006        | Check submission process           | 1. Complete exam. 2. Click submit. | Exam is submitted successfully.      | Pending  |
| TC007        | Ensure session timeout works       | 1. Start exam. 2. Wait for timeout duration without action. | User is logged out.                  | Pending  |
| TC008        | Validate navigation links          | 1. Log in. 2. Click on various navigation links. | All links navigate correctly.       | Pending  |
| TC009        | Check result display after submission | 1. Complete exam. 2. Check results page. | Results are displayed.               | Pending  |
| TC010        | Verify change of seat functionality  | 1. Log in. 2. Navigate to seat arrangement. 3. Change seat. | Seat changes reflect correctly.      | Pending  |
| ...           | ...                                 | ...                                      | ...                                   | ...      |
| TC160        | Final validation after all tests    | Review all previous test outcomes. | All tests executed with expected results. | Pending  |

*Note: Fill in the **Status** based on actual test execution.*

## Conclusion
This document contains all necessary manual test cases to ensure the functionality and reliability of the MCQ Exam Seating Arrangement system. Please execute and verify each test case accordingly.