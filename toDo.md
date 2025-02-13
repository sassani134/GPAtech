
## Critères techniques

Symfony 7.2 sous PHP 8.3 
SQL Doctrines

## Tests(optionnel)
- [x] Test Entite
    - Tests Unitaires
    - Les ecrires, obtenire un echec
    - Utilisateur nom prenom email horodater
    
- [x] Test Routes API
        - Applications Tests
        - GET /api/users : Récupérer tous les utilisateurs (sans pagination)
        - POST /api/users : Ajouter un utilisateur.
        - PUT /api/users/{id} : Modifier un utilisateur existant.
        - DELETE /api/users/{id} : Supprimer un utilisateur.
    - Les ecrires, obtenire un echec

## Principales

### Entite
- [ ] Entite
    - [ ] Utilisateur nom prenom email horodater
    - [ ] Les tests fonctionne

### API
- [ ] API
    - [ ] CRUD:
        - GET /api/users : Récupérer tous les utilisateurs (sans pagination)
        - POST /api/users : Ajouter un utilisateur.
        - PUT /api/users/{id} : Modifier un utilisateur existant.
        - DELETE /api/users/{id} : Supprimer un utilisateur.
        - Validation des données (e.g., le champ email doit être unique et correctement formaté).
        - Gestion des erreurs avec des réponses appropriées (exemple : 404 si l’utilisateur n’existe pas).
    - Les tests fonctionne

 ## Pour aller plus loin (optionnel)
- [ ] Interface Web
    - Read Tous les utilisateurs$
        - Modifier/Supprimer sur chaque ligne
        - Un bouton ajouter