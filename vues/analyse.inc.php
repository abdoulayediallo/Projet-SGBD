<?php
echo <<< FIN

$header

<body>
	<div id="global">		<!-- global -->
	
		<div id="entete">	<!-- entete -->
			<h1>$titre</h1>	
			<p class="sous-titre">
				:: <strong>I.E.P.S. EVERE</strong> ::
			</p>	
		</div>				<!-- entete -->
		
		<div id="navigation"> 		<!-- navigation -->
			$menu
		</div>						<!-- navigation -->
		
		<div id="contenu">			<!-- contenu -->
		
			<h2>$h2_titre</h2>
			<article>
				<p>::: Les joueurs dans teamsplayer qui ne sont pas dans players ::: </p>
				<p>$afficherJoueurInconnues</p>
			</article>	
			<hr>
			<article>
				<p>::: Les coachs dans teamscoachs qui ne sont pas dans users ::: </p>
				<p>$afficherCoachInconnues</p>
			</article>	
			<hr>
			<article>
				<p>::: Les types de matchs dans teamscalendar n'existant pas dans typesmatchs ::: </p>
				<p>$afficherTypeMatchInconnues</p>
			</article>	
			<hr>
			<article>
				<p>::: Le(s) idUser dans roles absent(s) dans users ::: </p>
				<p>$afficheridUserRolesInconnues</p>
			</article>	
			<hr>
			<article>
				<p>::: Le(s) mail incorrecte(s) dans users et players ::: </p>
				<p>$afficherMailIncorrectesUSERS $afficherMailIncorrectesPLAYERS</p>
				
			</article>		
		</div>						<!-- contenu -->
		
		
		<div id="pied">	
			$footer
		</div>
	</div>		<!-- global -->
</body>
</html>
FIN
?>