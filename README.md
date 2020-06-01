# Matcha

## Objectifs
- de cree un site de rencontres.
- App 
-permet-> user sign-up + renseigner ses details perso et ses preferences dans l'autre 
-pouvoir-> matcher autre user ayant plus au moins un profile correspondant
-si-> les 2 users matcher, les 2 users -pouvoir-> s'echanger des mots doux, si affinites -poivoir-> chater via chat prive que vous aurez conçu.

## Consignes générales
- Libres d’organiser et de nommer les fichiers.
- auteur 
- Matcha ne doit produire aucune erreur, warning ou notice, coté serveur et coté client, dans la console web.
- Libres d’utiliser le langage de votre choix + microframework + la majorité des librairies disponibles
- Coté client => vos pages devront utiliser HTML, CSS et JavaScript.
- Matcha ne devra comporter aucune faille de sécurité. 
- Libres d’utiliser le serveur web de votre choix, que ce soit Apache, Nginx
- Matcha devra être au minimum compatible sur Firefox (>= 41) et Chrome (>= 46)
- Vous devrez utiliser DB de type relationnelle ou orienté graphe.
- Libre d'utiliser DB(MySQL, MariaDB, PostgreSQL, Cassandra, InfluxDB, Neo4j...). 
- Vous devrez aussi forger vos requêtes à la main, comme des grands. Mais si vous êtes smart, vous pouvez faire votre propre librairie pour wrapper vos requêtes.
- Matcha ne doit pas contenir de librairies externes ou de composants proposant :
> - Un ORM ou un ODM
> - Un validateur de données
> - Une gestion de comptes utilisateurs
> - Une gestion de votre base de données
- Matcha devra être présentable sur mobile, et garder une mise en page acceptable sur de petites résolutions.
- Matcha  devra être sécurisé
> - Tous vos formulaires doivent avoir des validations correctes, autant coté client que coté serveur.
> - Avoir des mots de passe “en clair” dans une base de données.
> - Pouvoir injecter du code HTML ou JavaScript “utilisateur” dans des variables mal protégées.
> - Pouvoir uploader du contenu indésirable.
> - Pouvoir modifier une requête SQL.

## Partie obligatoire
### Registration and Signing-in ##########
- Sign-up -> asking at least: email + username + last name + first name + password (soit peu sécurisé).
- Sign-up -> activation: by send an e-mail with an unique link.
- Sign-in -> with username and password.
- Forget-pwd -> receive an email to re-initialize the pwd
- Log-out -> with 1 click from any pages on the site.

### User profile ##########
- Profile -> Once connected, the user must fill his profile, adding the following information:
> - The gender (Son genre).
> - Sexual preferences (Son orientation sexuelle).
> - A biography (Une bio courte).
> - A list of interests with tags (ex: #vegan, #geek, #piercing etc...). These tags must be reusable.
> - Pictures, max 5, including 1 as profile picture.
- Profile -> At any time, the user must be able to modify these information.
- Profile -> The user must be able to check who looked at his profile and “liked” him.
- Profile -> The user must have a public "fame rating" (score de popularite public) -> To I to define
- GPS -> The user must be located (using GPS) up to his neighborhood.
- GPS -> If the user does not want to be positionned, you must find a way to locate him even without his knowledge.
- GPS -> The user must be able to modify his GPS position in his profile.

### Browsing ##########
- The user must be able to easily get a list of suggestions that match his profile (if the profile is filled). in this list:
> - propose only interesting profiles (for exe only men for a heterosexual girls)
> - manage also the bisexuality
> - if the orientation isn't specified -> user will considered bi-sexual.
- the profiles are matched with:
> - sexual orientation
> - geographic area 
> - max of common tags
> - max of "fame rating"
- You must show in priority people from the same geographical area.
- The suggestion list must be sortable by age, location, “fame rating” and common tags.
- The suggestion list must be filterable by age, location, “fame rating” and common tags.

### Research ##########
- The user must be able to run an advanced research selecting one or a few criterias such as:
> - A age gap.
> - A “fame rating” gap.
> - A location.
> - One or multiple interests tags.
- The resulting list must be sortable by age, location, “fame rating” and common tags.
- The resulting list must be filterable by age, location, “fame rating” and common tags.

### Profile of other users ##########
- the user must be able to consult the profile of other users.
- Profiles must contain all the information available about them, except for the email address and the password.
- When a user consults a profile, it must appear in his visit history.
- The user must also be able to:
> - If he has at least one picture he can “like” and "dislake" another user.
> - When two people “like” each other, we will say that they are “connected” and are now able to chat.
> - If the current user does not have a picture, he/she cannot complete this action.
> - Check the “fame rating”
> - See if the user is online, and if not see the date and time of the last connection.
> - Report the user as a “fake account”
> - Block the user. A blocked user won’t appear anymore in the research results and won’t generate anymore notifications.
> - A user can clearly see if the consulted profile is connected or “like” his profile and must be able to “unlike” or be disconnected from that profile.

### Chat ##########
- When two users are connected (they like each other). they must be able to “chat” in real time (telerate a 10s).
- How you will implement the chat is totally up to you.
- The user must be able to see from any page if a new message is received.

### Notifications ##########
-  A user must be notified in real time (telerate a 10s) of the following events:
> - The user received a “like”.
> - The user’s profile has been checked.
> - The user received a message.
> - A “liked” user “liked” back.
> - A connected user “unliked” you.
A user must be able to see, from any page that a notification hasn’t been read
