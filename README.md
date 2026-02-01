# DTS: Accès Membre

**Restriction d'accès aux réservations d'événements selon le statut de membre**

Un plugin WordPress permettant de gérer l'accès au formulaire de réservation des événements en fonction du statut d'adhésion de l'utilisateur.

---

## 🎯 Fonctionnalités

- ✅ **Restriction d'accès basée sur les tags d'événement** : Contrôlez qui peut accéder au formulaire de réservation
- ✅ **Intégration Event Manager** : Compatible avec les événements gérés par le plugin Event Manager
- ✅ **Gestion des statuts de membres** : Support de plusieurs statuts (membre-actif, membre-passif, non-membre)
- ✅ **Intégration User Registration** : Utilise les abonnements définis dans User Registration
- ✅ **Shortcode simplifié** : Utilisez simplement `[acces_membre]` pour ajouter la restriction
- ✅ **Messages personnalisés** : Affichage de messages clairs selon le statut de l'utilisateur

---

## 📋 Prérequis

- WordPress 5.0+
- Plugin **Event Manager**
- Plugin **User Registration** (pour la gestion des abonnements/membres)

---

## 🚀 Installation

1. Téléchargez le plugin
2. Placez le dossier `dts_acces_membre` dans `/wp-content/plugins/`
3. Activez le plugin depuis le tableau de bord WordPress
4. Configurez vos événements avec les tags appropriés

---

## 📖 Utilisation

### Configuration des événements

1. **Créez vos événements** dans Event Manager
2. **Assignez des tags** à vos événements :
   - `membre-actif` : Accès réservé aux membres actifs
   - `membre-passif` : Accès réservé aux membres passifs
   - `non-membre` : Accès réservé aux non-membres
3. **Dans les réglages avancés de l'événement**, remplacez le formulaire de réservation par le shortcode `[acces_membre]`

### Shortcode

```
[acces_membre]
```

Le plugin gère automatiquement :
- La vérification de la connexion de l'utilisateur
- La récupération des tags de l'événement
- La vérification du statut d'adhésion de l'utilisateur
- L'affichage du formulaire ou des messages appropriés

---

## 🔄 Flux de fonctionnement

```
1. L'utilisateur accède à la page d'un événement
   ↓
2. Le shortcode [acces_membre] s'exécute
   ↓
3. Vérification : L'utilisateur est-il connecté ?
   ├─ NON → Affichage du message de connexion
   └─ OUI ↓
4. Récupération des tags de l'événement
   ↓
5. Récupération du statut d'adhésion de l'utilisateur
   ↓
6. Vérification : Le statut correspond-il ?
   ├─ OUI → Affichage du formulaire de réservation
   └─ NON → Affichage du message de restriction
```

---

## 💬 Messages affichés

- **Non connecté** : "Veuillez vous connecter pour vous inscrire à cet événement." + lien de connexion
- **Pas de statut** : "Aucun statut de membre défini pour ce compte."
- **Accès refusé** : Affichage du statut actuel et du statut requis
- **Accès accordé** : Affichage du contenu du shortcode (formulaire de réservation)

---

## 🛠️ Structure du code

Le plugin fonctionne en deux phases :

### Phase 1 : Récupération des tags d'événement
- Interroge la base de données pour obtenir les tags de la taxonomie `event-tag`
- Associés à l'événement courant

### Phase 2 : Vérification du statut d'adhésion
- Récupère l'utilisateur connecté
- Interroge les abonnements dans User Registration
- Compare les statuts d'adhésion avec les tags requis

---

## ⚙️ Configuration requise

### Dans User Registration
Assurez-vous que les plans/abonnements ont les slugs suivants :
- `membre-actif`
- `membre-passif`
- `non-membre` (optionnel)

Ces slugs doivent correspondre exactement aux tags d'événement utilisés.

---

## 📝 Version

**v1.1** - Février 2026

---

## 📞 Support

Pour plus d'informations ou de l'aide, consultez la [documentation complète](HELP.md).

---

## 📄 Licence

Ce plugin est créé pour le site diabetetypesport.ch

