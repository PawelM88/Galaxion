# Galaxion - Spaceship Battle Game 

## Description
Spaceship Battle Game is a browser game in which players manage their own spaceships, earn points, buy modules and participate in epic space battles. The game offers three difficulty levels and different opponents that players must face using their ships' statistics and available upgrades.

## The Aim of th project
The project was created as a demo to show my programming skills in working with Symfony, PHP, JavaScript and creating applications with combat systems, ship upgrades and user data management.

## Technologies
- **Symfony 7**
- **PHP 8**
- **MySQL**
- **JavaScript (ES6)**
- **HTML5**
- **CSS3**

## Requirements
- PHP 8.0 or newer
- Composer
- MySQL server

## Installation

1. Clone Repository and go to the app directory:

```bash
git clone -b main https://github.com/PawelM88/Galaxion
```
```bash
cd galaxion
```
2. Install dependencies:
```bash
composer install
```
3. Configure database in `.env` file:
```
DATABASE_URL="mysql://user:password@127.0.0.1:3306/dbname"
```
4. Create and initialize the database:
```bash
php bin/console doctrine:database:create
```
```bash
php bin/console doctrine:schema:update --force
```
5. Start local server

## Architecture
- Controllers: Responsible for handling application logic, including `BattleSystemController` handling combat mechanics.<br>
- Services: For example, `PointsHandler`, which manages points earned by the player.<br>
- Views: Used Twig templates to render application pages.<br>
- Routing: Symfony routing handling paths to individual functions, such as buying a new ship or the combat system.

## Testing
To run all unit tests:
```bash
php bin/phpunit
```
To run particular test:
```bash
php bin/phpunit tests/Unit/CostRetrieverTraitTest.php
php bin/phpunit tests/Unit/BattleCalculationTest.php
php bin/phpunit tests/Unit/PointsHandlerTest.php
```

## Features
- Combat System: Extensive turn-based combat system with various types of weapons (missiles and energy weapons) and defenses (armor, shields).<br>
- Ship Modules: Players can upgrade their ships with available modules that affect their combat statistics.<br>
- Enemy System: Three difficulty levels, with different types of enemies, such as pirates or Inesctoid ships.<br>
- Point System: Players earn points for winning battles, which they can spend on new modules and ship upgrades.<br>
- Encyclopedia: An in-game page that contains descriptions of modules, enemies, and combat mechanics.

## TODO
- Introduce a turn-based combat system in JavaScript (coming in the future), where the user will see updated statistics after each turn.

## Author
- Paweł Młynarczyk

## License
The project is available under the MIT license.
