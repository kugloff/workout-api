# Running Tracker API

A Laravel-based REST API for tracking running activities and monitoring progress.

## Project Description

This project is a backend application built with Laravel that allows users to:
- Register and log in
- Record running sessions
- Track distance, duration and pace
- View statistics and progress

---

## Technologies Used

- Laravel
- PHP
- SQLite
- Composer

---

## Main tables

- `users` – application users (authentication, roles)
- `runs` – recorded running sessions
- `goals` – user fitness goals
- `routes` – predefined running routes (admin)
- `tags` – labels for runs (e.g. easy, interval, long run) (admin)
- `run_tag` – pivot table for many-to-many relationship (tags - runs)

### Relationships

- User - hasMany - Runs
- User - hasMany - Goals
- Route - hasMany - Runs
- Run - belongsTo - Route
- Run - belongsToMany - Tags
- Tag - belongsToMany - Runs

### Additional features

- Each run can have an uploaded image (e.g. route screenshot)
- Role-based access control (`user`, `admin`)
- Admin users can manage `tags` and `routes`