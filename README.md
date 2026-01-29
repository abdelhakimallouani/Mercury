# 📇 Application de Gestion de Contacts – Laravel

## 📌 Contexte du projet

Ce projet consiste à développer une application web de **gestion de contacts organisés par groupes**, réalisée individuellement avec le framework **Laravel** et une **base de données relationnelle**.

L’objectif principal est de découvrir et maîtriser les bases de Laravel :
- Architecture MVC
- Eloquent ORM
- Relations entre modèles
- Validation des formulaires
- Templates Blade
- Bonnes pratiques de développement

---

## 🎯 Objectifs pédagogiques

- Comprendre le fonctionnement du framework Laravel
- Implémenter un CRUD complet
- Utiliser les relations Eloquent (One-to-Many)
- Manipuler des formulaires avec validation
- Structurer une application selon l’architecture MVC
- Documenter un projet professionnellement

---

## 🛠️ Technologies et contraintes

- **Laravel**
- **PHP**
- **MySQL / SQLite**
- **Architecture MVC Laravel**
- **Eloquent ORM**
- **Relations Eloquent** : `hasMany`, `belongsTo`
- **Validation Laravel**
- **Blade Templates**

---

## 🚀 Fonctionnalités (User Stories)

### US-01 – Créer un groupe
- Formulaire de création de groupe
- Nom du groupe obligatoire
- Groupe enregistré en base de données
- Liste des groupes affichée

### US-02 – Modifier / Supprimer un groupe
- Modification du nom du groupe
- Suppression d’un groupe
- Gestion propre des contacts associés

### US-03 – Ajouter un contact
- Formulaire avec :
  - Nom
  - Email
  - Téléphone
  - Groupe (liste déroulante)
- Validation des champs
- Enregistrement en base de données

### US-04 – Voir la liste des contacts
- Liste des contacts affichée
- Groupe associé visible pour chaque contact
- Vue Blade avec boucle `@foreach`

### US-05 – Modifier un contact
- Formulaire pré-rempli
- Possibilité de changer le groupe
- Mise à jour enregistrée

### US-06 – Supprimer un contact
- Bouton de suppression
- Confirmation implicite ou explicite
- Suppression en base de données

### US-07 – Filtrer les contacts par groupe
- Sélection d’un groupe
- Affichage des contacts liés à ce groupe
- Utilisation de la relation Eloquent : `$group->contacts`

### US-08 – Rechercher un contact
- Champ de recherche par nom
- Recherche insensible à la casse
- Résultats après soumission du formulaire
- Requête Eloquent avec `where` / `like`

### US-09 – Messages flash
- Messages de succès après :
  - Création
  - Modification
  - Suppression
- Message d’erreur en cas d’échec
- Affichage dans les vues Blade

---

## 🔗 Relations Eloquent

### Group
```php
hasMany(Contact::class)
