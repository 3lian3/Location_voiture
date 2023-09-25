### Location de Voitures : DonkeyCar

### Description

Ce projet est une application web de location de voitures construite en PHP 8.1, en suivant le modèle de conception orientée objet (POO) et le motif architectural Modèle-Vue-Contrôleur (MVC). Le projet permet la gestion des utilisateurs ainsi que la gestion de la disponibilité des véhicules selon les dates. L'interface utilisateur est réalisée avec Bootstrap.

### :hammer_and_wrench: Technologies utilisées

- PHP 8.1 (POO, MVC)
- MySQL
- Bootstrap
- Gestion de dates en PHP

### :white_check_mark: Prérequis

- PHP 8.1 ou supérieur
- MySQL 5.7 ou supérieur
- Serveur web (comme Apache)
- Composer (si vous utilisez des dépendances)

### :gear: Installation

1. Clonez ce dépôt GitHub.
2. Importez le fichier SQL dans votre base de données MySQL.
3. Modifiez le fichier `config/database.php` avec vos informations de connexion à la base de données.
4. Lancez votre serveur web.
5. Accédez à l'application via votre navigateur web.

### :book: Utilisation

Après l'installation, vous pouvez vous connecter comme utilisateur et commencer à réserver des voitures.

**Exemple d'utilisation du code pour vérifier la disponibilité d'un véhicule :**

```php

if ($car->isAvailable($startDate, $endDate)) {
}
```
