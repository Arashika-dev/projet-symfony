# projet-symfony


## Entités

J'ai commencé par créer toutes mes entités avec leur relation pour créer ma base de donnée. 

## Advertisement

### Index
J'ai ajouter le bouton permettant d'acceder a l'ajout d'une annonce, uniquement si on est connecté.

### Form new
J'ai créer un CRUD automatique sur l'entité Advertisement, le formulaire généré par symfony m'a donné une liste déroulante pour le modèle moto mais je souhaiterai que l'utilisateur puisse saisir lui même le modèle. J'ai donc intégrer le ModelMotoType dans l'AdvertisementType pour obtenir les champs de données en ajoutant cascade: persist sur les propriété de relation entre entités.

### Upload d'images


## User/Authentification

J'ai créer l'entité utilisateur a l'aide de make:user et le système d'authentification grâce à make:auth.

### Login/Logout
Les boutons Connexion/Déconnexion varient en fonction de 'app.user' et renvoient vers leur route respective.

### Event hashpassword
Un event subscriber permet de hasher le mot de passe lors de l'inscription dans la BDD.

### Gestion User dans EasyAdmin
J'ai souhaité que lors de la création d'un utilisateur dans EasyAdmin, l'administrateur puisse choisir le rôle de ce nouvel utilisateur. J'ai donc utilisé ChoiceField, le fait que "roles" soit un array m'as contraint à utiliser ->allowMultipleChoices(), ce qui n'est pas plus mal, car on pourra a l'avenir affecter plusieurs roles a un même utilisateur.