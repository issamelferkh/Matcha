## Fonctionalities #########################################################################################
## Objectifs -> OK
## Consignes générales -> OK
### Registration and Signing-in -> OK
### User profile -> OK
### Browsing -> OK
- Browsing: if "connected" display "disconnect" button

### Profile of other users -> NOK
- [ ] When two people “like” each other, we will say that they are “connected” and are now able to chat.
- [ ] A user can clearly see if the consulted profile is connected or “like” his profile and must be able to “unlike” or be disconnected from that profile.

### Chat -> OK
### Notifications -> NOK
- A connected user “unliked” you.

### Historique
- consulter user visiter your profile
- users you like
- users like you

### Matches page -> OK
### Template -> OK
### Doc and Help
- https://cdn.intra.42.fr/pdf/pdf/4832/matcha.en.pdf
- https://cdn.intra.42.fr/pdf/pdf/3667/matcha.fr.pdf
- for send id using get => 	<?php if (isset($la_case[0]['user_id'])) $user_id = hash('whirlpool',htmlspecialchars(trim($la_case[0]['user_id']))); ?>
- UPDATE `like_table` SET `liked`=0,`noped`=0 ,`reported`=0,`blocked`=0,`connected`=0 WHERE 1




## Issues, Opt AND Sec #########################################################################################
## Objectifs -> OK
## Consignes générales -> OK
### Registration and Signing-in -> OK
- [ ] Log-out -> avoid logout from unkown source
- [ ] signin.php -> CSRF
- [ ] signup.php  -> CSRF
- [ ] forget_pwd.php  -> CSRF

### User profile -> OK
- profile_pic.php
    - [ ] can't upload any picture
    - [ ] check picture format
    - [ ] limit sizeof pic
    - [ ] limit types of pic
    - [ ] avoid LFI 
    - [ ] Vuln: if delete asprofile value from fronent -> add avatar pic as profile ?

### Browsing -> OK

### Profile of other users -> NOK

### Chat -> OK
- Chat: list contact (online or last connection)
- Chat: Display by default the last msg in chat

### Notifications -> NOK

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

### Security
- in all pages
    - SQL
    - XSS
    - CSRF
    - Secure GET vars
    - valide all form
- Chat
    - Chat sucure msg (if spaces, lenght ...)

## To-Do in 1337 ################################################################################################################

## Consignes générales ->
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

### Registration and Signing-in ->
- signup.php
    - [ ] test signup
    - [ ] test all error msg
    - [ ] send mail
- active_user.php
    - [ ] test all error msg
- forget_pwd.php
    - [ ] test send mail
    - [ ] test all error msg
- forget_pwd_reset.php
    - [ ] test all error msg
- forget_pwd_verif.php
    - why token ? "header("location:forget_pwd_reset.php?msg=".$token.""); " line 18
    - [ ] test all error msg
- signin.php
    - [ ] test all error msg
- signout.php
    - [ ] test all error msg


### User profile ->
- profile.php
    - [ ] check if profile completed -> once connection and in all pages -> test for new profile
    - [ ] Test GPS in same city
- profile_update.php
    - [ ] Gender => if(isset($la_case[0]['gender'])) -> selected by default in output
    - [ ] Sexual Preference => if(isset($la_case[0]['sex_pre'])) -> selected by default in output

### Browsing ->

### Research -> NOK
- [ ] The user must be able to run an advanced research selecting one or a few criterias such as:
> - [ ] A age gap.
> - [ ] A location.
> - [ ] One or multiple interests tags.
> - [ ] A “fame rating” gap.
- [ ] The resulting list must be sortable by age, location, “fame rating” and common tags.
- [ ] The resulting list must be filterable by age, location, “fame rating” and common tags.

### Profile of other users ->

### Chat ->

### Notifications -> 



