# testoo
préparation du test POO / MVC

Consultable ici:
http://poo.moncf2m.be/

V1 : 
- 4 utilisateurs avec 3 types de droits:

  admin / admin (administration des toutes les news)

  modo / modo (modification de toutes les news)

  redac1 / redac1 et redac2 / redac 2 (administration de leurs news respectives)
  
  A faire dans la V2
- Pas encore de protections contre les attaques (pas de traitement htmlentities etc...)
- Le modérateur ne peut supprimer ses news
- Mauvais fonctionnement de la classe Session chez OVH (session_status() non reconnu)

V1.1
- protection des champs titres et textes

V1.2
- Modification des vues accueilAdmin et pageArticle

V1.3
- Mise de l'heure actuelle par défaut lors de la création d'article
- L'administrateur peut supprimer ses articles
