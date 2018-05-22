Hangman with Symfony
========================

https://github.com/MatthieuMota/ECV-Hangman

Part 1 & 2 :

- Copy all assets to web folder (css, fonts, images)
- Create all routes
    - /fr/game -> game.html
    - /fr/contact -> Make the form with subject, email and message.
- Translations
- Contact Form class

Part 3 :

- Create a new SecurityController
- Create 2 pages
    - /fr/register -> Keep layout and add register form (class RegisterType)
       - email
       - password
       - confirm password
    - /fr/login -> Keep layout and add login form (no class)
        - email
        - password
- Create user entity (id, email, password)

Part 4 :

Le dictionnaire (Voir GameController)
1. Créer le service Dictionnary
2. Récupérer le service dans cette méthode
3. Définir un tableau de mots dans le service (constante ? ...)
4. La méthode getRandom() du service doit renvoyer un mot aléatoire
