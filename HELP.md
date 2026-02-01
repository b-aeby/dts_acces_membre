# 📖 Guide d'aide - DTS: Accès Membre

Bienvenue dans la documentation complète du plugin **DTS: Accès Membre**.

---

## Table des matières

1. [Guide de démarrage rapide](#guide-de-démarrage-rapide)
2. [Installation détaillée](#installation-détaillée)
3. [Configuration pas à pas](#configuration-pas-à-pas)
4. [Utilisation du plugin](#utilisation-du-plugin)
5. [Dépannage](#dépannage)
6. [FAQ](#faq)
7. [Références techniques](#références-techniques)

---

## Guide de démarrage rapide

**En 5 minutes :**

1. ✅ Installez et activez le plugin
2. ✅ Assurez-vous que Event Manager et User Registration sont actifs
3. ✅ Créez un événement dans Event Manager
4. ✅ Assignez un tag (`membre-actif`, `membre-passif`, ou `non-membre`)
5. ✅ Insérez le shortcode `[acces_membre]` dans les réglages d'événement

---

## Installation détaillée

### Prérequis

Avant d'installer DTS: Accès Membre, assurez-vous que vous avez :

- **WordPress** version 5.0 ou supérieure
- **Event Manager** plugin activé
- **User Registration** plugin activé
- Accès administrateur au site

### Étapes d'installation

#### 1. Téléchargement

- Téléchargez le fichier du plugin
- Vous devriez avoir un dossier : `dts_acces_membre/`

#### 2. Upload du plugin

**Option A : Via FTP/SFTP**
- Connectez-vous au serveur via FTP
- Naviguez vers `/wp-content/plugins/`
- Téléchargez le dossier `dts_acces_membre` dans ce répertoire

**Option B : Via le tableau de bord WordPress**
- Allez dans **Extensions → Ajouter**
- Cliquez sur **Téléverser une extension**
- Sélectionnez le fichier ZIP du plugin
- Cliquez sur **Installer maintenant**

#### 3. Activation

- Dans **Extensions → Mes extensions**, cherchez "DTS: accès membre"
- Cliquez sur **Activer**
- Le plugin est maintenant actif !

---

## Configuration pas à pas

### Étape 1 : Vérifier les plugins requis

Dans le tableau de bord WordPress :

1. Allez à **Extensions → Mes extensions**
2. Vérifiez que **Event Manager** est actif ✅
3. Vérifiez que **User Registration** est actif ✅

### Étape 2 : Configurer les plans d'adhésion

Dans **User Registration** :

1. Allez à **Réglages → Abonnements/Plans**
2. Assurez-vous que vous avez les plans suivants :
   - **Slug** : `membre-actif` (nom : "Membre Actif")
   - **Slug** : `membre-passif` (nom : "Membre Passif")
   - **Slug** : `non-membre` (nom : "Non-Membre") *(optionnel)*

> **Important :** Les slugs doivent être exactement `membre-actif` et `membre-passif` (en minuscules, avec tirets)

### Étape 3 : Créer des événements

Dans **Event Manager** :

1. Créez un nouvel événement
2. Remplissez les informations de base
3. Allez à l'onglet **Tags**
4. Assignez un ou plusieurs tags parmi :
   - `membre-actif`
   - `membre-passif`
   - `non-membre`

### Étape 4 : Insérer le shortcode

Dans **Event Manager** :

1. Allez aux **Réglages avancés** de l'événement
2. Cherchez la section **Format page événement seul** ou **Formulaire de réservation**
3. Remplacez le contenu par le shortcode : `[acces_membre]`
4. Enregistrez les modifications

---

## Utilisation du plugin

### Scénarios d'utilisation courants

#### Scénario 1 : Événement réservé aux membres actifs

1. Créez un événement (ex: "Randonnée pédestre avancée")
2. Assignez le tag `membre-actif`
3. Insérez `[acces_membre]` dans le formulaire
4. Seuls les utilisateurs avec le statut "Membre Actif" pourront voir le formulaire de réservation

#### Scénario 2 : Événement mixte

1. Créez un événement (ex: "Conférence d'information")
2. Assignez les tags : `membre-actif` ET `membre-passif`
3. Insérez `[acces_membre]`
4. Les membres actifs ET passifs peuvent s'inscrire

#### Scénario 3 : Événement public

Si vous voulez que tout le monde accède au formulaire :
- Créez l'événement SANS tags de restriction
- Insérez directement votre formulaire sans utiliser le shortcode

### Utilisation avancée

#### Contenu imbriqué dans le shortcode

Vous pouvez ajouter du contenu dans le shortcode qui s'affichera seulement si l'accès est accordé :

```
[acces_membre]
<!-- Contenu qui s'affiche si accès autorisé -->
[event_manager_form event_id="123"]
[/acces_membre]
```

---

## Dépannage

### Le formulaire n'apparaît pas

**Symptôme :** L'utilisateur est connecté mais ne voit rien

**Solutions :**

1. ✅ Vérifiez que l'utilisateur a un statut d'adhésion assigné dans User Registration
2. ✅ Vérifiez que le statut correspond au tag de l'événement
3. ✅ Vérifiez l'orthographe exacte des slugs (`membre-actif`, `membre-passif`)
4. ✅ Videz le cache du site (si vous utilisez un plugin de cache)

### Le message "Veuillez vous connecter" s'affiche toujours

**Symptôme :** Même les utilisateurs connectés voient ce message

**Solutions :**

1. ✅ Videz les cookies de votre navigateur
2. ✅ Testez dans une session incognito
3. ✅ Vérifiez que WordPress détecte bien l'utilisateur connecté
4. ✅ Vérifiez les logs d'erreur WordPress

### "Aucun statut de membre défini"

**Symptôme :** Le message apparaît même pour un utilisateur avec un abonnement

**Solutions :**

1. ✅ Vérifiez que l'abonnement est **actif** (pas en attente ou annulé)
2. ✅ Dans User Registration, vérifiez le statut de l'abonnement
3. ✅ Assurez-vous que les slugs correspondent exactement

### Erreurs de base de données

**Si vous voyez une erreur SQL :**

1. ✅ Vérifiez que les plugins Event Manager et User Registration sont compatibles avec votre version de WordPress
2. ✅ Vérifiez les noms des tables de base de données
3. ✅ Activez le mode débogage WordPress pour voir les erreurs détaillées

---

## FAQ

### Q : Comment ajouter de nouveaux statuts d'adhésion ?

**R :** Le plugin supporte actuellement :
- `membre-actif`
- `membre-passif`
- `non-membre`

Pour ajouter d'autres statuts, contactez le support ou modifiez le plugin directement.

### Q : Un utilisateur peut-il avoir plusieurs statuts à la fois ?

**R :** Oui ! Si un utilisateur a plusieurs abonnements actifs, le plugin vérifiera si AU MOINS UN correspond au tag de l'événement.

### Q : Que se passe-t-il si un événement a plusieurs tags ?

**R :** L'utilisateur doit avoir UN statut correspondant à UN des tags. Si l'événement a les tags `membre-actif` ET `membre-passif`, un utilisateur membre-actif aura accès.

### Q : Puis-je personnaliser les messages d'erreur ?

**R :** Actuellement, les messages sont fixés dans le code. Une version future permettra la personnalisation.

### Q : Comment tester le plugin en développement ?

**R :** 

1. Créez un événement test avec un tag
2. Créez deux comptes utilisateurs : un avec le statut correct, un sans
3. Testez les deux accès
4. Utilisez les outils de débogage du navigateur (F12) pour voir les erreurs

### Q : Le plugin fonctionne-t-il avec d'autres plugins de réservation ?

**R :** Non, ce plugin est conçu spécifiquement pour Event Manager. Pour utiliser avec d'autres plugins, une modification serait nécessaire.

### Q : Peut-on désactiver certains tags ?

**R :** Les trois tags (`membre-actif`, `membre-passif`, `non-membre`) doivent être configurés dans User Registration. Vous n'êtes pas obligé de les utiliser tous.

---

## Références techniques

### Architecture du plugin

Le plugin fonctionne en deux phases principales :

#### Phase 1 : Récupération des tags d'événement

```
Base de données
       ↓
Query: term_relationships + term_taxonomy + terms
       ↓
Slugs: ['membre-actif', 'membre-passif', ...]
```

#### Phase 2 : Vérification des abonnements

```
get_current_user_id()
       ↓
Query: ur_membership_subscriptions
       ↓
Abonnements de l'utilisateur
       ↓
Comparaison avec les tags requis
```

### Tables de base de données utilisées

- `{prefix}term_relationships` - Relations terme/objet
- `{prefix}term_taxonomy` - Hiérarchie des termes
- `{prefix}terms` - Les tags eux-mêmes
- `{prefix}ur_membership_subscriptions` - Abonnements utilisateurs
- `{prefix}posts` - Informations des abonnements

### Fonctions principales

**`get_custom_ur_subscriptions($atts, $content = null)`**

Fonction principale du shortcode. Gère :
- La vérification de connexion
- La récupération des tags
- La vérification des abonnements
- L'affichage du formulaire ou des messages

### Shortcode

**`[acces_membre]`**

- Pas de paramètres obligatoires
- Support du contenu imbriqué
- Exécute les shortcodes imbriqués avec `do_shortcode()`

### Constantes

- `ABSPATH` - Vérifiée pour éviter un appel direct au plugin

---

## Support et contribution

Pour toute question ou problème, consultez :

- 📧 Contact : support@diabetetypesport.ch
- 🌐 Site : https://diabetetypesport.ch
- 📋 [Voir le README.md](README.md)

---

**Dernière mise à jour :** Février 2026  
**Version :** 1.1
