# projet-symfony


## Entités

J'ai commencé par créer toutes mes entités avec leur relation pour créer ma base de donnée. 

## Advertisement Form

J'ai créer un CRUD automatique sur l'entité Advertisement, le form généré par symfony m'a donné une liste déroulante pour le modèle moto mais je souhaiterai que l'utilisateur puisse saisir lui même le modèle. J'ai donc intégrer le ModelMotoType dans l'AdvertisementType pour obtenir les champs de données.

## User/Authentification

J'ai créer l'entité utilisateur a l'aide de make:user et le système d'authentification grâce à make:auth.

### Login/Logout
Les boutons Connexion/Déconnexion varient en fonction de 'app.user' et renvoient vers leur route respective.

### Event hashpassword