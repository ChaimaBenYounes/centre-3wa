# centre-3wa
Description
Un centre propose plusieurs formations composées de différents modules :

training: name , description, module
module: name
-la formation « BackOffice Web Developper » composée des modules « HTML CSS », « PHP » et « MySQL »
-la formation « Front-end Web Developper » composée des modules « HTML CSS », « JavaScript » et « Bootstrap »
-la formation « Web Designer » composée des modules « HTML CSS », « Photoshop », « Illustrator » et « Bootstrap »

La première page est une page de bienvenue
Suite au clic sur l'une des formations, la seconde page doit afficher les modules composant celle-ci
Il est également possible de cliquer sur un module pour afficher toutes les formations où il existe
Un menu listant toutes les formations doit être présent sur chaque page

La classe CSS "active" doit être présente sur le bouton de la formation visitée
Informations techniques

La première route doit être de la forme "/trainings"

La deuxième route doit être de la forme "/training/SLUG-DE-LA-FORMATION" où « SLUG-DE-LA-FORMATION » est l'identifiant unique de la formation
La troisième route doit être de la forme "/module/SLUG-DU-MODULE" où « SLUG-DU-MODULE » est l'identifiant unique du module


Fichiers fournis
La mise en page des vues réalisées à l'aide de Bootstrap
