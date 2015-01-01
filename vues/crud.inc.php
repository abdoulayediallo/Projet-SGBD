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
		<div>
		<form id="formulaire" action="?action=crud" method ="POST">
			<div id="contenu">			<!-- contenu -->
			
				<h2>$h2_titre</h2>
				<h2 align="center">$table_name</h2>
					$selectionTableEtOperation
				<p>$crud</p>	
			
			</div>						<!-- contenu -->
		</form>
		</div>
		<div id="pied">	
			$footer
		</div>
	</div>		<!-- global -->
</body>
</html>
FIN

?>
