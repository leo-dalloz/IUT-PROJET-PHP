Projet iut info 
Leo Dalloz Jérémy Pouzargues Lucas Urgenti Laurent Vouriot Audrey Wagner

http://projet-iut-info.alwaysdata.net/PROJET-PHP/controller/indexC.php


### Les consignes de sécurité pour les mots de passe ###

 Le mot de passe doit comporter au moins : 
 	1 majuscule
	1 chiffre 
	1 minuscule 
	8 caractères
	
### Presentation du projet ### 

Notre but avec ce projet était de faire un site web moderne, élégant en utilisant majoritairement
le php avec un sytème de connexion/inscription ainsi qu'un système de mots de passe oublié sécurisé.
Un  système de discussions dynamiques et original en utilisant une architecture MVC.

### Choix techniques ### 
Nous avons utilisé en majorité du php avec une architecture mvc, ainsi que de l'html5 et css3, 
du sql et du javascript. 
Pour les tokens afin qu'ils soient les plus complexes possibles on crypte en md5 
un entier aléatoire de 6 chiffres.
En ce qui concerne la protection des mots de passes nous avons utilisé une clé de hachage avec 
l'algorithme bcrypt. 

### Mot de passe oublié ### 

 Nous avons souhaité faire un système d'envoie d'email pour pouvoir modifié son mot 
 de passe en cas d'oublie de celui ci. Sur conseille de notre professeur nous avons 
 utilisé un système de token. 


 Comment ça marche : 	
 	l'utilisateur va sur la page mot de passe oublié ou il entre son email, on verifie
	que celui ci existe dans la BD, on lui envoie un mail avec un lien qui contient 
	un token unique sur une page pour modifier son mot de passe. Ce token unique est 
	stocké dans la BD dans le tuple de la personne souhaitant changer son mot de passe 
	on stock aussi dans la  BD la date de création de ce token pour une double sécurité
	Lorsque le mot de passe est modifié on remet le token et sa date à null dans la BD.
	Le système  de token permet d'augmenter la sécurité. On peut aisaiment verifier si 
	quelqu'un tente d'acceder à la page de modification d'email sans token ou avec un 
	mauvais token.

Problèmes rencontrés : 
	Durant les phases de testes d'envoie d'email, nous avons envoyé beaucoup d'email
	depuis le serveur alwaysdata du groupe, les boites mails ont finis par considérer 
	cette adresse comme spam, nous avons dû donc rediriger la page de de 
	verification/envoie d'email sur un autre serveur always d

### Configuration logicielle ### 
fonctionne sur les dernieres versions de :
- google chrome
- firefox
- opera 
- safari 
- microsoft edge 

configuration minimale : 
-4gb ram 

configuration recommandée
- 64gb de ram 
- intel core i9 9900K 
- nvidia rtx 2080ti  

	
### Identifiants de connexion ### 
FreeNote :
	compte test :
		-pseudo : Test
		-pwd: Test123123
		
	admin :
		pseudo : laurent 
		pwd: Bonjour13
		
alwaysdata :
	pseudo : projet.iut.info13@gmail.com
	pwd: jullazone

php myAdmin :
	pseudo : 191346_admin
	pwd: jullazone
github :
	pseudo : leo-dalloz
	pwd : JulLaZone123


	



