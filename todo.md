# Matcha
## To-Do in 1337

### General:
diffrence between browsing and search ?+++

### Consignes générales ->
- [ ] logo
- [ ] ft_putmsg -> test in all pages
- [ ] auteur 
- [ ] Error , Warning or notice => server side or client side -> in console
- [ ] setup database
- [ ] matcha font ???
- [ ] Compatible sur Firefox (>= 41) et Chrome (>= 46)
- [ ] Responsive
- [ ] Matcha  devra être sécurisé
> - Tous vos formulaires doivent avoir des validations correctes, autant coté client que coté serveur.
> - Avoir des mots de passe “en clair” dans une base de données.
> - Pouvoir injecter du code HTML ou JavaScript “utilisateur” dans des variables mal protégées.
> - Pouvoir uploader du contenu indésirable.
> - Pouvoir modifier une requête SQL.
- [ ] send mail test it in 1337 !

### Registration and Signing-in -> OK

### User profile ->
- in tag: fix this error => No search results.
    - error in ajax and jquery CNDs

- profile.php
    - error in profile
    - [ ] check if profile completed -> once connection and in all pages -> test for new profile
    - [ ] Test GPS in same city

- profile_update.php
    - [ ] Gender => if(isset($la_case[0]['gender'])) -> selected by default in output
    - [ ] Sexual Preference => if(isset($la_case[0]['sex_pre'])) -> selected by default in output

- GPS
    - if not allow location -> get location with IP automatically +++ is the third
    - if allow location get it by gps is the second
    - if add it manual is the first



### Browsing ->
- Browsing: if "connected" display "disconnect" button

### Research -> NOK
- [ ] The user must be able to run an advanced research selecting one or a few criterias such as:
> - [ ] A age gap.
> - [ ] A location.
> - [ ] One or multiple interests tags.
> - [ ] A “fame rating” gap.
- [ ] The resulting list must be sortable by age, location, “fame rating” and common tags.
- [ ] The resulting list must be filterable by age, location, “fame rating” and common tags.

### Profile of other users ->
- [ ] When two people “like” each other, we will say that they are “connected” and are now able to chat.
- [ ] A user can clearly see if the consulted profile is connected or “like” his profile and must be able to “unlike” or be disconnected from that profile.

### Chat ->
- Chat: list contact (online or last connection)
- Chat: Display by default the last msg in chat

### Notifications -> 
- A connected user “unliked” you.

### Historique > OK

### Matches page -> OK

### Template -> OK

### Security
- in all pages
    - SQL
    - XSS
    - CSRF
    - Secure GET vars
    - valide all form
- Chat
    - Chat sucure msg (if spaces, lenght ...)

- [ ] signin.php -> CSRF
- [ ] signup.php  -> CSRF
- [ ] forget_pwd.php
    - CSRF
    - reset pwd timeout
    - send mail te reset pwd with 1 click if 2 click => msg deja fait
- [ ] signout.php   -> CSRF avoid logout from unkown source

#### User profile ->
- profile_pic.php
    - [ ] check picture format
    - [ ] limit sizeof pic
    - [ ] limit types of pic
    - [ ] avoid LFI 
    - [ ] Vuln: if delete asprofile value from fronent -> add avatar pic as profile ?
- profile_update.php
    - XSS + SQLi

### Errors
- DevTools failed to load SourceMap: Could not load content for https://10.12.100.163/matcha/assets/js/bootstrap/popper.min.js.map: Certificate error: net::ERR_CERT_AUTHORITY_INVALID

- DevTools failed to load SourceMap: Could not load content for https://10.12.100.163/matcha/assets/js/bootstrap/bootstrap.min.js.map: Certificate error: net::ERR_CERT_AUTHORITY_INVALID

### Optimization
- One Query -> Join queries
- update all $_SESSION -> $_SESSION['auth]
- list all pages to optimize =>
    - asstes
    - config
    - include
    - user
        - chat
            - get_msg.php
            - put_msg.php
        - action.php
        - online.php
        - browing_in.php
        - ...

### Doc and Help
- https://cdn.intra.42.fr/pdf/pdf/4832/matcha.en.pdf
- https://cdn.intra.42.fr/pdf/pdf/3667/matcha.fr.pdf
- for send id using get => 	<?php if (isset($la_case[0]['user_id'])) $user_id = hash('whirlpool',htmlspecialchars(trim($la_case[0]['user_id']))); ?>
- UPDATE `like_table` SET `liked`=0,`noped`=0 ,`reported`=0,`blocked`=0,`connected`=0 WHERE 1
- default gps
    lati : 32.8821039
    lang : -6.8978120999999994