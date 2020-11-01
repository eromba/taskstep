TaskStep - Todo list manager for local PHP servers
================================

Features
---

- Organize tasks by immediate, this week, this month, this year and lifetime tasks
- Add and filter by contexts and projects (for GTD fans)
- Print lists on 3 x 5 index cards
- Automatically list all items for today
- Current and overdue items are highlighted automatically
- Available languages: English, Russian, German, Spanish (partial)
- Free and open-source

Dependencies
---

- MariaDB (MySQL) Database
- PHP => 7.0

Installation
---

- Create database, user and rights. Use your own secure credentials!
```
CREATE DATABASE taskstep;
CREATE USER 'taskstep'@'localhost' IDENTIFIED BY 'taskstep';
GRANT ALL PRIVILEGES ON taskstep.* TO 'taskstep'@'localhost';
```
- Put code into desired location e.g. `/var/www/taskstep`
- Go to installation URL: `https://www.example.com/taskstep/install/install.php`
- Remove subdir `install` for security reasons
- Log in and change your password

Project History
---

TaskStep was originally designed by [Rob Lowcock](https://github.com/rob-lowcock) in 2006, significantly refactored by [Ethan Romba](https://www.github.com/eromba) in 2008, and given much-needed updates by [Thomas Hooge](https://www.github.com/thooge) in 2020.
