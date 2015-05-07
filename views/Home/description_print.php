<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $this->title = "Café Cornavin"; 
 ?>
	<!-- Titre de l'institution -->
    <div class="title">
        <h1>
            Café Cornavin
        </h1>
    </div>
	<!-- Les infos de l'institution, à savoir : l'adresse, le téléphone, les horaires ainsi que la description -->
	<table class="infos">
		<tr>
			<!-- Cellule contenant l'adresse, le téléphone et les horaires-->
			<td class="info-schedules">
				<div class="info">
					<p>Adresse : Rue du Temple 8 | 1201 Genève <span><br />Téléphone : 022.418.99.10</span></p>
				</div>
				<div class="schedules">
					Horaires: Me, Je, Ve: 11h00 à 17h00
				</div>
			</td>
			<!-- Cellule contenant la description de l'institution-->
			<td class="description">
				<div class="content">
					<p>Distribution de denrées alimentaires, espace café, échanges.</p>
					<p>Cyber de rue les mercredis.</p>
					<p>Peinture sur coquillage et poterie les mercredis et vendredis.</p>
				</div>
			</td>
		</tr>
	</table>
	<!-- Tableau contenant les deux images : Celle représentant l'institution puis celle de l'itinéraire Google Maps -->
	<table class="images">
		<tr>
			<!-- Cellule contenant l'image de l'institution-->
			<td class="image-td">
				<div class="picture">
					<img src="contents/img/petanque.jpg" alt="Error" class="image-place" />
				</div>
			</td>
		</tr>
		<tr>
			<!-- Cellule contenant l'image de l'itinéraire Google Maps -->
			<td class="image-td" class="image-map">
				<div class="map">
					<img src="contents/img/chmap.jpg" alt="Error"  />
				</div>
			</td>
		</tr>
	</table>
