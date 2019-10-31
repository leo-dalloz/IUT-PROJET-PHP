Projet iut info 13 
Leo Dalloz Jérémy Pouzargues Lucas Urgenti Laurent Vouriot Audrey Wagner



####################################################################
	    Les consignes de sécurité pour les mots de passe
 ###################################################################

 Le mot de passe doit comporter au moins : 
 	1 majuscule
	1 chiffre 
	1 minuscule 
	8 caractères

###################################################################
			Mot de passe oublié
###################################################################

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
	verification/envoie d'email sur un autre serveur always data. 


