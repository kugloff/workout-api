# API Goal canvas

| Whats | Hows | Inputs | Outputs | Goals | Who |
| ----- | ---- | ------ | ------- | ----- | --- |
| Authenticate | Users register on the website | name, email, password | auth token | Create new user account | Visitors |
| Authenticate | Users login to the website | email, password | auth token | Authenticate user | Visitors |
| Manage runs | Create run session | date, distance, duration, pace | run | Record running activity | Users |
| Manage runs | List user runs | user id | run list | Get all runs of user | Users |
| Manage runs | Get run details | run id | run | Get details of a run | Users |
| Manage runs | Edit run | date, distance, duration, pace | run | Update existing run | Users |
| Manage runs | Delete run | run id | - | Delete existing run | Users |
| Analyze performance | View statistics | user id | stats (total distance, avg pace, total runs) | Track progress |