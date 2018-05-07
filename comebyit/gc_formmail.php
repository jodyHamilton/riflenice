<?
	/**
	*	GC_Formmail 1.2
	*	Data creazione: 17/2/2005
	*	Data ultima modifica: 21/2/2005
	*	Author: Giuseppe Calbi <peppiniel@peppiniel.com>
	*	Website: http://www.giuseppecalbi.com
	*
	*	Licenza: l'utilizzo di questo script ˆ® gratuito. Sarei grato se inseriste un link a http://www.giuseppecalbi.com
	*	o http://www.giuseppecalbi.com/scripts in fondo alle pagine che utlizzano questo script, o in un'area credits o links del vostro sito
	*
	*	Vi suggerisco di inserire nei form, per i quali userete questo script, in fondo alla pagina la riga:
	*	<? $act=1; include "gc_formmail.php"; ?>
	*	ricordandovi di dare alla pagina un'estensione .php e di inserire eventualmente l'url completo dello script nel caso in cui
	*	il form non si trovasse nella stessa cartella.
	*	In questo modo sarˆÝ possibile essere avvisati automaticamente di nuovi aggiornamenti rispetto alla versione corrente
	**/


	// Non toccare NULLA in questo file

	include "config.php";

	$version = "1.2";

	if ($act == 1)
	{
		echo getCredits();

		return;
	}

	$key = array ();
	$val = array ();

	$output = "";

	$senderNames = array ($senderNames);

	foreach($_POST as $chiave=>$valore)
	{
		// <Input type=qualunque name=chiave value=valore>

		array_push ($key, $chiave);
		array_push ($val, eregi_replace("\\\\'", "'", $valore));
		
		if (!empty($emailField))
		{
			if ($chiave == $emailField)
			{
				$emailMittente = $valore;
			}
		}

		if (!empty($subjectField))
		{
			if ($chiave == $subjectField)
			{
				$subject = $valore;
			}
		}

		if (!empty($senderNames))
		{
			for ($i = 0; $i < count ($senderNames); $i++)
			{		
				if ($chiave == $senderNames[$i])
				{
					$nome .= $valore." ";
				}
			}
		}

	}

	if (!empty($subject))
	{
		$oggetto .= " - ".$subject;
	}

	if ($html)
	{
		$output = getHtmlOutput ($key, $val);

		$intestazioni = "MIME-Version: 1.0\r\n";
		$intestazioni .= "Content-type: text/html; charset=iso-8859-1\r\n";
	}
	else
	{
		for ($i = 0; $i < count ($key); $i++)
		{
			$output .= $key[$i].": ".$val[$i]."\n";
		}

		$intestazioni = "";
	}

	if ( (!empty($emailMittente)) || (!empty($nome)) )
	{
		$intestazioni .= "From: ".$nome."<".$emailMittente."> \r\n";
	}
	else
	{
		$intestazioni .= "From: ".$mittente."\r\n";
	}

	if (!mail($destinatari, $oggetto, $output, $intestazioni))
	{
		echo "<br>".$messaggioErrore."<br><br><br>".getHtmlOutput($key, $val)."<br><br><br>".getCredits();

		if (strlen($paginaErrore) < 5)
		{
			exit ();
		}
		else
		{
		echo "<META HTTP-EQUIV=Refresh CONTENT=\"10; URL=".$paginaErrore."\">";
		}
	}

	echo "<br>".$messaggioConferma."<br><br><br>".getHtmlOutput($key, $val)."<br><br><br>".getCredits();

	if (strlen($paginaConferma) < 5)
	{
		exit ();
	}
	else
	{
		echo "<META HTTP-EQUIV=Refresh CONTENT=\"10; URL=".$paginaConferma."\">";
	}


	function getHtmlOutput ($k, $v)
	{
		global $stripsHtml;
		global $tagAllowed;

		$return = "<center><div style=\"width: 500; height: 147; text-align: center\">";

		$return .= "<fieldset style=\"font-family: Verdana; font-size: 10pt; color: #008080; font-weight: bold; border: 3px double #F3C65C; background-color: #F4F5FF\">";
		$return .= "<legend align=center>Your Entries:</legend>";


		$return .= "<table border=0 cellpadding=3 style=\"border-collapse: collapse; font-family:Verdana; font-size:10pt; color:#4062EA\" bordercolor=#111111 cellspacing=5 width=300>";
		$return .= "<colgroup span=1 style=\"text-align:right; font-weight: bold; background-color: #DDE8FF\"></colgroup>";


		for ($i = 0; $i < count ($k); $i++)
		{
			$v[$i] = eregi_replace ("\n", "<br>", $v[$i]);

			if ($stripsHtml)
			{
				$v[$i] = strip_tags ($v[$i], $tagAllowed);
			}

			$return .= "<tr><td width=\"30%\">".$k[$i].": </td><td>".$v[$i]."</td></tr>";
		}

		$return .= "</table></fieldset></div></center>";

		return $return;
	}

	function getCredits ()
	{
		global $version;

		$return = "<br><br>
		";

		return $return;
	}

	/*
	*	To Do: 
	*	- Limite inserimento ogni n secondi o n richieste al minuto
	*	- Messaggio di conferma al mittente. Piˆ¼ complicato, potrebbe essere hackerato e diventerebbe minaccia seria.
	*/

	/*
	*
	*	Changelog:
	*	1.2 (21/2/05)
	*	- Configuration file
	*	- Documentation
	*	- Other few changes
	*
	*	1.12 (19/2/05)
	*	- Removed backslash before char "'".
	*	- In html output and mail, \n becomes <br>
	*	- Possibility to strips (all or some) html tags from html ouput
	*	- Possibility to set some field names as Name and Email Address of mail received
	*	- Possibility to set a field as subject after that set in "$oggetto"
	*	- Button green/red to see updates
	*
	*	1.11 (18/2/05)
	*	- Added Html Email Format
	*/

	
?>