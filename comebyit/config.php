<?
	/**
	*	GC_Formmail 1.2
	*	Created: 17/2/2005
	*	Last Modified: 21/2/2005
	*	Author: Giuseppe Calbi <peppiniel@peppiniel.com>
	*	Website: http://www.giuseppecalbi.com
	*
	*	License: this script is free. I will be pleased if you put a link to http://www.giuseppecalbi.com
	*	or http://www.giuseppecalbi.com/scripts at the end of the pages that use this script, or in a credit section 
        *       or links section
	*
	*	I suggest you to insert a small line at the end of each page that uses this script:
	*	<? $act=1; include "gc_formmail.php"; ?>
	*	remember to give the page the extension name .php and to insert the full url of the script in case 
        *       it is in a different folder.
	*	Only after this you could be automatically alerted for new updates
	**/

	/**
	*	Configuration file
	*	
	*	With this file you can choose execution option for the programm.
	*	How to do? It's simple, you only have to modify the data below.
	*	Keep attention to change only the text between " ".
	**/


	/**
	*	Name and email of sender shown in the received email. It will be shown like is: "Name <address@provider.com>"
	**/

	$mittente = "ComeByItQuiz <personalityquiz@riflenice.com>";


	/**
	* 	Names and email addresses that will receive the form data
	*	If you want more than one addressee, insert all of them using a comma to separate them like this
	*	ex. $destinatari = "Joe Black <webmaster@domain.com>, Tim White <commercial@domain.com>";
	**/

	$destinatari = "jody <jhamiltoorion@gmail.com>";
	

	/**
	*	Subject of the received email
	**/

	$oggetto = "Come By It Quiz Entry";


	/**
	*	Page to be automatically redirected after some seconds of confirmation page
	*	Write the page address between the " ". If no page is selected, you will receive only a confirmation message
	**/

	$paginaConferma = "";


	/**
	*	Text/Message (can be html) to be shown as head of the confirmation page
	**/

	$messaggioConferma = "<center><font color=navy size=3 face=verdana>The Rifle Nice server is processing the results of your personality quiz.  <br><br> We occasionally experience server delays of up to 24 hours- there is no need to resubmit your data. <br><br> You will receive your results via email. <br><br> Rifle Nice is not responsible for any negative side effects you experience from these automated results.<br><br></font></center><br><br>";


	/**
	*	Page to be automatically redirected after some seconds of error page
	*	Write the page address between the " ". If no page is selected, you will receive only a confirmation message
	**/

	$paginaerrore = "";


	/**
	*	Text/Message (can be html) to be shown as head of the error page
	**/

	$messaggioErrore = "<center><font color=red size=3 face=verdana><b>This did not work right, um...</b></font><center><br>";


	/**
	*	Specify the name of a field in the form for sender's email address. Ex. if the form contains <input type=text name=emailaddress> you should set "emailaddress" the field below
	**/

	$emailField = "email";


	/**
	*	Specify the name of a field in the form for sender's email body. Ex. if the form contains <input type=hidden name=tipomodulo value=new_proposals> you should set "new_proposte" as below.
	*	This value will be shown in the email body with the "body" ($oggetto) specified previously. If you want to see as body only this field, please delete $oggetto
	**/
	
	$subjectField = "";


	/**
	*	Specify one or more fields to use as sender name.
	*	Ex. if in the form i use <input type=text name=name> and <input type=text name=surname> you should define "name" and "surname" as below.
	*	Please use a , between each setting and remeber to use " "
	**/

	$senderNames = "Firstname, Lastname";


	/**
	*	If this option is set to 1, the confirmation page will show all the data inserted. If set to 0 it will print only the confirmation message without the data
	**/

	$mostraInputinConferma = 0;


	/**
	*	If set to 1, email will be sent in graphic html, is set to 0 will be sent in text mode
	**/

	$html = 1;


	/**
	* If set to 1, all the html tags for the inputs will be hidden before the print out. It is possible to specify which tag to allow. If it is 0 every html tag will be allowed
	**/

	$stripsHtml = 1;


	/**
	*	Specify which html tag is allowed in case the previous setting is set to 1
	**/

	$tagAllowed = "<b><i><br><u>";


?>