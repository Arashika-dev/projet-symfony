# projet-symfony


## Entités

J'ai commencé par créer toutes mes entités avec leur relation pour créer ma base de donnée. 

## Advertisement

### Index
J'ai ajouter le bouton permettant d'acceder a l'ajout d'une annonce, uniquement si on est connecté.

### Form new
J'ai créer un CRUD automatique sur l'entité Advertisement, le formulaire généré par symfony m'a donné une liste déroulante pour le modèle moto mais je souhaiterai que l'utilisateur puisse saisir lui même le modèle. J'ai donc intégrer le ModelMotoType dans l'AdvertisementType pour obtenir les champs de données en ajoutant cascade: persist sur les propriété de relation entre entités.

### Upload d'images
Voilà une partie qui m'a causé pas mal de soucis, j'ai d'abord créer un service qui s'occupe de gérer l'upload de fichier car je pourrais en avoir besoin pour les profils utilisateurs. L'argument 'multiple' m'as poser problème car le formulaire me retournait un message d'erreur: il veut une string ?!. J'ai donc trouver la solution d'englober mon new File avec un new All, apparemment ça permettrait de prendre en compte toutes les contraintes une par une.
Ensuite le fichier s'inscrivait bien dans la BDD mais pas d'uploads, que j'ai réussi a corrigé en enlevant un '/' au début du chemin ... J'ai aussi repasser le formulaire directement dans AdvertType plutôt que d'appeler ImageAdvertsType dans AdvertType, cela avait l'air de créer des conflits.

```php
public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('price')
            ->add('description')
            ->add('moto', ModelMotoType::class, [
                'label' => false,
            ])
            ->add('images', FileType::class, [
                'mapped' => false,
                'multiple' => true,
                'required' => false,
                'constraints' => [
                    new All([
                        new Image([
                             'maxSize' => '1024K',
                             'mimeTypesMessage' => "Merci d'uploader un fichier image valable"
                        ]) 
                    ])
                ]   
            ])
        ;
    }
```

## User/Authentification

J'ai créer l'entité utilisateur a l'aide de make:user et le système d'authentification grâce à make:auth.

### Login/Logout
Les boutons Connexion/Déconnexion varient en fonction de 'app.user' et renvoient vers leur route respective.

### Event hashpassword
Un event subscriber permet de hasher le mot de passe lors de l'inscription dans la BDD.

### Gestion User dans EasyAdmin
J'ai souhaité que lors de la création d'un utilisateur dans EasyAdmin, l'administrateur puisse choisir le rôle de ce nouvel utilisateur. J'ai donc utilisé ChoiceField, le fait que "roles" soit un array m'as contraint à utiliser ->allowMultipleChoices(), ce qui n'est pas plus mal, car on pourra a l'avenir affecter plusieurs roles a un même utilisateur.

### Voter
J'ai mis en place un voter pour que quiconque autre que l'administrateur ou l'utilisateur lui même puisse modifier, voir ou supprimer un profil. Cela déclenche une erreur 403 et throw un AccessDeniedException, je n'ai juste pas vraiment saisi comment choisir la page sur laquelle je veux rediriger, j'ai essayer un redirectToRoute mais visiblement l'exception est plus "forte". Il semblerait qu''il y est un moyen de faire une page personnalisé mais j'ai estimé que ce n'était pas le plus important et que j'allais perdre du temps...

### Edition
En travaillant sur l'édition d'un user, j'en suis venu a créer une fonction privée pour l'upload de l'image, je me suis alors demandé si je n'aurais pas dû créer un event pour ces uploads, en faisant appel au service que j'avais créer. Car cet evenements pourrait être utile pour les annonces comme pour les profils. Il faudrait aussi que je fasse en sorte de supprimer l'ancienne photo, mais je manque de temps.

## EasyAdmin
Pour cette partie il fallu que je plonge dans la doc d'EasyAdmin pour être sur de choisir les bon Fields, aussi pour personnaliser les menus histoire d'y trouver un retour au site "normal" ou de se logout facilement. 

### Remove
Pour pouvoir supprimer un model moto, par exemple, cela me renvoyait une erreur. J'ai donc ajouter un cascade remove sur les categories, mais le résultat ne me satisfait pas pleinement, car si je supprime le modèle, je supprime la catégorie également...
```php
#[ORM\OneToMany(mappedBy: 'category', targetEntity: ModelMoto::class, cascade: ["remove"])]
    private Collection $modelMotos;
```

## Conclusion

J'ai un peu couru après le temps sur ce projet parce que je me suis cassé les dents sur l'upload multiple mais j'ai finalement réussi. Je vois encore une floppée d'améliorations possibles, comme les quelques une énoncées plus haut. Ou encore un moteur de recherche, des filtres sur les annonces, un meilleur design (même si on est en back) ... 
Symfony offre tellement de possibilités qu'on s'y perdrait...