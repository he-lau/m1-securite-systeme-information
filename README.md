# m1-securite-systeme-information

## Projet 1 : formulaire d'identification sécurisé

### Informations techniques

- Page de connexion et d'inscription sécurisée
- Langages utilisés : HTML5, CSS3, PHP7
- Solutions de sécurité implémentée :
  - Faille XSS : encodage des entrées avec `htmlspecialchars()`
  - Injection SQL : prepared statement
  - Hachage du mot de passe avec Bcrypt
  - Force brute :
    - Tentative de connexion limité
    - `sleep(1)` : avant d'exécuter la requête de connexion
  - Conditions sur les champs d'identification
    - identifiant : 4 caractères minimum
    - mot de passe : 8 caractères minimum, 1 chiffre, 1 majuscule, et 1 minuscule


**IMPORTANT : il est conseiller de ne pas entrer en dur les informations identifiantes de la base de données dans les variables, mais plutôt les mettre dans un fichier à part et se référer au chemin du fichier (EN-DEHORS DE LA RACINE DU SITE). Je ne l'ai pas fait pour faciliter la portabilité du projet.**    


### Les étapes pour exécuter en local

1. Avoir installé un serveur local
2. Mettre en place la base de données en créant la/les table(s) nécessaire : exécuter le script sql `bd.sql` avec la commande `source` sous Mysql
3. Modifier la valeur des variables dans le fichier `php/functions_db.php` pour pouvoir se connecter à la base de données créées :
- `$server` : le DSN suit une syntaxe spécifique. ("pilote:host=serveur;dbname=nomBd")
- `$username` : l'identifiant de l'utilisateur
- `$password` : mot de passe de l'utilisateur
4. Lancer votre serveur local et accéder au repértoire contenant le site
