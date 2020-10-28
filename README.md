# Matcha

## Introduction
This project is about creating a dating website.\

You will need to create an app allowing two potential lovers to meet,
from the registration to the final encounter.\

A user will then be able to register, connect, fill his/her profile, search and look into
the profile of other users, like them, chat with those that “liked” back.\

## Registration and Signing-in
- The app must allow a user to register asking at least an email address, a username, a last name, a first name and a password that is somehow protected. 
- After the registration, an e-mail with an unique link must be sent to the registered user to verify his account.
- The user must then be able to connect with his/her username and password. 
- The user must be able to receive an email allowing him/her to re-initialize his/her password should the first one be forgotten and disconnect with 1 click from any pages on the site.

## User profile
- Once connected, a user must fill his or her profile, adding the following information:
    - The gender.
    - Sexual preferences.
    - A biography.
    - A list of interests with tags (ex: #vegan, #geek, #piercing etc...). These tags must be reusable.
    - Pictures, max 5, including 1 as profile picture.
- At any time, the user must be able to modify these information, as well as the last name, first name and email address.
- The user must be able to check who looked at his/her profile as well as who “liked” him/her.
- The user must have a public “fame rating”
- The user must be located using GPS positionning, up to his/her neighborhood. 
- If the user does not want to be positionned, you must find a way to locate him/her even without his/her knowledge.
- The user must be able to modify his/her GPS position in his/her profile.

##  Browsing
- The user must be able to easily get a list of suggestions that match his/her profile.
- You will only propose “interesting” profiles for example, only men for a heterosexual girls. 
- You must manage bisexuality. If the orientation isn’t specified, the user will be considered bi-sexual.
- You must cleverly match3 profiles:
    - Same geographic area as the user.
    - With a maximum of common tags.
    - With a maximum “fame rating”.
- You must show in priority people from the same geographical area.
- The list must be sortable by age, location, “fame rating” and common tags.
- The list must be filterable by age, location, “fame rating” and common tags.

## Research
- The user must be able to run an advanced research selecting one or a few criterias such as:
    - A age gap.
    - A “fame rating” gap.
    - A location.
    - One or multiple interests tags.
- As per the suggestion list, the resulting list must be sortable and filterable by age, location, “fame rating” and tags.

## Profile of other users
- A user must be able to consult the profile of other users. 
- Profiles must contain all the information available about them, except for the email address and the password.
- When a user consults a profile, it must appear in his/her visit history.
- The user must also be able to:
    - If he has at least one picture “like” another user. When two people “like” each other, we will say that they are “connected” and are now able to chat. If the current user does not have a picture, he/she cannot complete this action.
    - Check the “fame rating”.
    - See if the user is online, and if not see the date and time of the last connection.
    - Report the user as a “fake account”.
    - Block the user. A blocked user won’t appear anymore in the research results and won’t generate additional notifications.
- A user can clearly see if the consulted profile is connected or “like” his/her profile and must be able to “unlike” or be disconnected from that profile.

## Chat
- When two users are connected, they must be able to “chat” in real time.
- How you will implement the chat is totally up to you. 
- The user must be able to see from any page if a new message is received.

##  Notifications
- A user must be notified in real time of the following events:
    - The user received a “like”.
    - The user’s profile has been checked.
    - The user received a message.
    - A “liked” user “liked” back.
    - A connected user “unliked” you.
- A user must be able to see, from any page that a notification hasn’t been read.

## Bonus Part
- Add Omniauth strategies for the connection.
- Import pictures from Facebook and/or Google+.
- Create an interactive map of the users (which implies a more precise GPS localization via JavaScript).

## Security Part
- All your forms must have correct validations and the whole website must be secure.
- To have a “plain text” password stored in your database.
- To be able to inject HTML of “user” Javascript code in unprotected variables.
- To be able to upload unwanted content.
- To be able to alter a SQL request.

## Help

### Create new VM
- matcha -> linux -> 64bits -> use an existing VHD file
- config net -> bridged

### Config SSH Access
- Allow @IP in /etc/hosts.allow

### Config DB Access
- Allow @IP in /opt/lampp/etc/extra/httpd-xampp.conf

### Delete matcha and clone new version

### Config ssh via vscode with SSH FILE SYSTEMS plugin

### delete the old DB and import the new

