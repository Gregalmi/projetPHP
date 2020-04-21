# projetPHP
Site web en html, css, javascript et php

Site réalisé en groupe de 3 en 10 jours dans le cadre de ma formation.

##Enoncé :

###Objectifs :
- Réaliser la conception d’un site web selon le besoin exposé.
- Être autonome sur la création de site web sans Framework PHP.
- Être capable de se débrouiller seul (recherche / compréhension des erreurs).
- Organiser correctement son code et le commenter (versioning)
- Savoir configurer un serveur web (vhost, url rewrite)
- Avoir de l’ambition et découvrir des fonctionnalités non-abordées en cours.

*Les Recettes du programmeur*
Réaliser un site permettant de gérer des recettes de cuisine (ou autre).
- Il sera possible de manipuler plusieurs types de contenu (ingrédients, unités, produits, etc.)
- Il sera possible de créer des recettes complètes (inspirez-vous des livres et site de cuisine)
- Une gestion de droits sera mise en place afin de permettre à plusieurs personnes (avec rôle différent) d’accéder à différentes informations et contenus
- Réfléchissez à d’autres fonctionnalités

*Prérequis du projet et contraintes techniques*
- Vous devez utiliser l’HTML5 et le CSS3
- Vous devez utiliser PHP5 (ou PHP7 si souhaité)
- Vous devrez proposer les maquettes de votre projet final présentant les différentes interfaces. (2 à 5 maximum)
- Le site web devra être déployé sur un serveur Apache configuré (local si vous le souhaitez ou distant pour ceux qui ont un serveur en ligne)
- Le site web devra reposer sur une base de données.
- Vous utiliserez l’extension PDO fournit avec PHP5 pour accéder à vos données
- Une conception de votre base de données vous sera également demandée si nécessaire (au minimum un schéma des entités de la BDD).
- Le coeur du site devra implémenter un système de CRUD pour les données (Create, Read, Update, Delete | créer, lire, mettre à jour, supprimer  requête SQL classique).
- Vous devrez réaliser un espace d’administration et ainsi implémenter une gestion de droits / privilèges complète.
- Vous devrez manipuler les dates avec précaution afin que celles-ci soient toujours correctement insérées dans la BDD et affichées à l’écran en français.
- Enfin, tout le code sera versionné (git)

*Prérequis du projet et contraintes fonctionnelles*
- Le site devra forcément proposer une page d’accueil
- Le visiteur aura accès à un menu pour naviguer sur les différentes pages du site
- Un espace utilisateur et donc une gestion de compte seront présents.
- Les différentes interactions (accès aux pages et administration en général) entre l’utilisateur, l’administrateur et le site devront être sécurisées.
- Les pages du backoffice devront être limités à certains rôles.
- Il sera possible d’administrer les contenus.
- Le site devra proposer au minimum 3 rubriques (pages / type de contenu).
Base de données
- Implémentation d’une gestion de contenu (à votre guise : des textes, articles, recettes, fiches, entités spécifiques, produits, messages, etc.)
- Implémentation d’un formulaire de contact
o Insérer les messages dans la base de données
- Implémentation d’une gestion utilisateur
o Inscription, avec validation par email peut être un plus
o Connexion
o Session PHP
o Actions / Interactions avec le contenu
Serveur
- Apache devra être installé (Sur Windows avec wamp par exemple)
- Un vhost sera créé pour l’accès à votre site
- Pour les points bonus : URL Rewrite et Cache sur les assets (fichiers CSS / JS)
- Les fichiers (conf Apache + .htaccess) seront ajoutés en lecture sur le repository afin de simplifier l’accès par le correcteur.
Espace administration
- Espace dédié pour administrer les contenus et les utilisateurs
o Les articles, utilisateurs, messages, commentaires et autres entités du site.
- Sécuriser l’espace administrateur en accès
- Gestion de droits et de permissions avancées
o Interdire en accès les pages admin
Interface
- Multi pages et présence d’un menu de navigation
- Définir une charte graphique cohérente et ergonomique
- Responsive design (adapté mobile par exemple)
- Utilisation d’un framework CSS (optionnel)
