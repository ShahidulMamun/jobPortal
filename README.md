# LivejobsBD

LivejobsBD is a job portal built with Laravel, focused on the Bangladesh job market. The idea started from a simple observation — most local job sites feel clunky, slow, and aren't great on mobile, even though most people here are browsing jobs from their phones. This project is my attempt at fixing that, starting with the candidate side of things.

🌐 **Live:** https://livejobsbd.com

---

## Why I built this

I didn't want to just clone a generic job board template. The focus has been on getting the actual candidate experience right first — searching for jobs, filtering by what actually matters (division, salary, experience level), managing a profile, and tracking applications — before spending time on the employer side.

The employer/recruiter side is still being built out. Right now the architecture is set up so that adding it later doesn't mean rewriting what already exists.

---

## What candidates can do right now

- Browse and search jobs
- Filter by job type, category, experience level, salary range, and division
- Open a job and see the full picture — description, responsibilities, requirements, benefits, required skills
- Track applications from a dashboard
- Save/bookmark jobs for later
- See a "profile strength" indicator so they know what's missing
- Manage their profile: work experience, education, skills, resume upload, and social/portfolio links

---

## Auth & registration

Registration is a single flow where the user picks their role:

```text
User Registration
       │
       ├── Candidate
       │
       └── Employer
```

A few things worth mentioning here:

- Candidate and employer have separate login/auth flows even though registration is unified
- Registration is protected by a session-based **math CAPTCHA** ("4 + 7 = ?") instead of pulling in a third-party service — the answer is generated and checked entirely server-side, and rotates after every attempt so it can't be replayed
- All input validation happens server-side, not just in the browser

---

## Employer side (work in progress)

This part isn't finished yet. What's planned:

- Job posting
- Application management
- Employer dashboard with recruitment stats
- Candidate browsing/management for employers

---

## Tech stack

| Technology | Purpose |
|---|---|
| PHP / Laravel | Backend framework |
| Blade | Templating |
| MySQL | Database |
| Vite | Frontend build tooling |
| Bootstrap 5 | Layout utilities |
| Custom CSS | Design system / UI |
| Font Awesome | Icons |
| Google Fonts | Typography |

---

## How it's structured

```text
LivejobsBD
│
├── Authentication
│   ├── Registration (role-based)
│   ├── Candidate login
│   ├── Employer login
│   └── Math CAPTCHA
│
├── Candidate
│   ├── Dashboard
│   ├── Job search & filtering
│   ├── Job details
│   ├── Applications
│   ├── Saved jobs
│   └── Profile (experience, education, skills, resume, links)
│
├── Employer (in progress)
│   ├── Registration & auth
│   ├── Job posting
│   ├── Application management
│   └── Dashboard
│
└── Frontend
    ├── Responsive layout
    ├── Job listing & details
    └── Reusable Blade components
```

Standard Laravel MVC underneath — nothing exotic. Blade components are reused across pages instead of copy-pasted, and validation lives server-side.

---

## Screenshots


<img width="1467" height="872" alt="LivejobsBD Homepage" src="https://github.com/user-attachments/assets/9ac2eb84-94ef-4b9d-abf3-d9cda49de845" />

<img width="1907" height="895" alt="LivejobsBD Job Search" src="https://github.com/user-attachments/assets/2cf853c8-f912-40f3-b90b-b13bf5f82ba0" />

<img width="1894" height="892" alt="LivejobsBD Job Details" src="https://github.com/user-attachments/assets/360ca5b7-6d7f-4f69-ac7a-26bd6178a8b7" />

<img width="1886" height="907" alt="LivejobsBD Candidate Dashboard" src="https://github.com/user-attachments/assets/3c8c295e-9f54-4108-8cd6-1d27dc9d78c4" />


<img width="1513" height="781" alt="LivejobsBD Candidate Profile" src="https://github.com/user-attachments/assets/639728e4-d915-4127-9ae9-decce69f2a09" />

---

## Roadmap

- [ ] Employer dashboard
- [ ] Job posting workflow
- [ ] Application management for employers
- [ ] Candidate job alerts
- [ ] Email notifications
- [ ] Job recommendation system
- [ ] Resume management improvements

---

## Getting started

**Requirements:** PHP, Composer, MySQL, Node.js & npm

```bash
git clone https://github.com/ShahidulMamun/job-portal.git
cd job-portal

composer install
npm install

cp .env.example .env
php artisan key:generate

# set your DB credentials in .env, then:
php artisan migrate

npm run build
php artisan serve
```

---

## Status

Actively being worked on. Candidate-facing features (search, apply, profile, dashboard) are functional. Employer features are next.

---

## Developer

**MD Shahidul Islam** — Laravel & full-stack developer
GitHub: [@ShahidulMamun](https://github.com/ShahidulMamun)
Live project: https://livejobsbd.com

---

If you find this useful or interesting, a ⭐ on the repo is appreciated. Feedback's welcome too.
