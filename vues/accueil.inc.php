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
			<p>Teste et manipulation de la table basket.sql</p>
		</div>						<!-- contenu -->
		
		
		<div id="pied">	
			$footer
		</div>
	</div>		<!-- global -->
</body>
</html>
FIN
?>