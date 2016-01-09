# PHP-Webapp ITM14
# Authors: Tabea Halmschlager, Elisabeth Haberl

Die Entwicklung wurde via GitHub und XAMPP verwirklicht. Als das Produkt 
ausgereift war, haben wir es auf den Projekt-ITM-Server geladen, wo auch 
eine MySQL Datenbank zur Verfügung steht.

SQL injections vermeiden: Laut http://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php 
werden diese bereits durch die Verwendung von MySQLi vermieden.

# Requirements: 
- Inputs (Form) -> Done
– Outputs -> Done
– 1 DB-Table -> Done
– CRUD Operationen -> Done
– Pair-/Teamprogramming -> Done

# Architecture
– 3-Tier-Archtitektur -> Done

# Configurationmanagement
– GIT -> Done
– documentation -> Done
– testing -> Done (curl)

# Other optional points
– Table joins, more than 1 DB Table -> Done
- No SQL Injection‘s possible -> Done

# Testing with CURL:
Liefert HTML-Code und Statuscode: curl -I http://localhost/phpwebapp/index.php
Insert: curl -X POST http://localhost/phpwebapp/index.php --data "alcoholname=Wine%level=1"
Update: curl -X POST http://localhost/phpwebapp/index.php?id=Wine --data "updateName=Wodka%updateLevel=5"
Delete: curl http://localhost/phpwebapp/delete.php?id=Wodka
