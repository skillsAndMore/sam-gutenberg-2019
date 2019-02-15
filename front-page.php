<?php
/*
 * Questa pagina rappresenta la homepage del nuovo skillsAndMore
 */

//* Aggiungo la sezione sotto al mio menu
add_action( 'genesis_header', 'sam_intro', 14 );
function sam_intro() {
	?>
	<div class="header-intro">
		<div class="wrap">
			<h2>La scuola digitale per gli sviluppatori del futuro</h2>
			<p>SkillsAndMore &egrave; il luogo ideale per mantenersi aggiornati sulle ultime tecniche dello sviluppo web e per confrontarsi con persone che fanno il tuo stesso lavoro.</p>
		</div>
		<div class="btns">
			<!-- <a class="btn normal" href="#">Scopri di pi&ugrave;</a> -->
			<a class="btn cta" href="/registrami">Diventa uno Skillato</a>
		</div>
	</div>
	<?php
}

//*Rimuovo il loop generale e inserisco il mio codice
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_after_header', 'sam_front_page_custom_loop', 5);
function sam_front_page_custom_loop(){
	?>
	<div class="value-prop">
		<p class="value-center-text">Per gli sviluppatori del futuro che vogliono mantenersi aggiornati e al passo con i trend del settore. A differenza delle altre piattaforme di e-learning, con SkillsAndMore potrai raggiungere questi risultati nel minor tempo possibile grazie ai corsi e alla sua affiatata community.</p>
		<h1>Cosa aspettarti da questa piattaforma</h1>
		<div class="flex wrap">
			<div class="value f-1-3">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490.02 490.02">
					<path fill="#EF6C00" d="M245.1 393.32c19.5 0 38.5-3.8 56.6-11.3 36.6-15.1 65-43.6 80.2-80.2s15.2-76.8 0-113.4c-23-55.6-76.8-91.5-137-91.5-19.5 0-38.5 3.8-56.6 11.3-75.5 31.2-111.5 118.1-80.2 193.6 23 55.5 76.8 91.5 137 91.5zm-49.2-266.8c15.7-6.5 32.2-9.8 49-9.8 52.1 0 98.7 31.1 118.7 79.3 13.1 31.7 13.1 66.6 0 98.2-13.1 31.7-37.8 56.3-69.5 69.5-15.7 6.5-32.2 9.8-49 9.8-52.1 0-98.7-31.1-118.7-79.3-27.1-65.4 4.1-140.7 69.5-167.7z"/>
					<path fill="#2C2F33" d="M14.4 328.02c1.5 4 5.3 6.6 9.3 6.6 1.1 0 2.2-.2 3.3-.6 5.1-1.8 7.8-7.5 6-12.7-29.3-81.9-9.8-171.4 51-233.6 42-43 98.3-67.1 158.4-67.8 60-.7 116.9 22 159.9 64l-25.3.3c-5.5.1-9.8 4.5-9.8 10 .1 5.4 4.5 9.8 9.9 9.8h.1l49.2-.6c2.6 0 5.1-1.1 7-3 1.8-1.9 2.8-4.4 2.8-7l-.6-49.2c-.1-5.5-4.5-10-10-9.8-5.5.1-9.8 4.5-9.8 10l.3 25.3C369.3 24.02 307.6-.68 242.2.02c-65.4.9-126.7 27-172.4 73.8-32.7 33.5-55.1 75.4-64.6 121-9.3 44.5-6.1 90.5 9.2 133.2zm391.6 74.4c-86.7 88.8-229.5 90.4-318.3 3.8l25.3-.3c5.5-.1 9.8-4.5 9.8-10-.1-5.4-4.5-9.8-9.9-9.8h-.1l-49.2.6c-5.5.1-9.8 4.5-9.8 10l.6 49.2c.1 5.4 4.5 9.8 9.9 9.8h.1c5.5-.1 9.8-4.5 9.8-10l-.3-25.3c47.6 46.4 109.3 69.6 171.1 69.6 63.7 0 127.3-24.6 175.2-73.6 32.7-33.5 55.1-75.4 64.6-121 9.3-44.4 6.1-90.5-9.2-133.1-1.8-5.1-7.5-7.8-12.7-6-5.1 1.8-7.8 7.5-6 12.7 29.4 81.7 9.9 171.2-50.9 233.4z"/>
				</svg>
				<h3>Contenuti aggiornati</h3>
				<p>Qui troverai sempre le ultime novit&aacute; sullo sviluppo web e mobile. &Egrave; una promessa!
				</p>
			</div>

			<div class="value f-1-3">
				<svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" stroke-miterlimit="1.41" viewBox="0 0 491 491" clip-rule="evenodd" stroke-linejoin="round">
					<path fill="#2C2F33" fill-rule="nonzero" d="M329.1 412.15v-43.6c0-12.3-5.4-23.7-14.8-31.5-36-29.5-74.6-50.3-88.5-57.3v-52.2c8.1-7.3 12.8-17.6 12.8-28.7v-63.6c0-37.1-30.1-67.2-67.2-67.2h-13.7c-37.1 0-67.2 30.1-67.2 67.2v63.6c0 11 4.7 21.4 12.8 28.7v52.2c-13.9 7.1-52.5 27.8-88.5 57.3-9.4 7.7-14.8 19.2-14.8 31.5v43.6c0 5.5 4.4 9.9 9.9 9.9h309.3c5.5 0 9.9-4.5 9.9-9.9zm-19.8-9.9H19.8v-33.7c0-6.3 2.8-12.2 7.6-16.2 38.7-31.8 80.6-52.9 88.6-56.8 4.4-2.2 7.1-6.5 7.1-11.4v-61.3c0-3.3-1.7-6.4-4.4-8.2-5.3-3.5-8.4-9.3-8.4-15.6v-63.6c0-26.1 21.3-47.4 47.4-47.4h13.7c26.1 0 47.4 21.3 47.4 47.4v63.6c0 6.3-3.1 12.1-8.4 15.6-2.8 1.8-4.4 4.9-4.4 8.2v61.2c0 4.9 2.7 9.3 7.1 11.4 8 3.9 49.9 25.1 88.6 56.8 4.8 4 7.6 9.9 7.6 16.2v33.8z"/>
					<path fill="#EF6C00" fill-rule="nonzero" d="M337.7 272.35l41-39.3h77.8c18.6 0 33.6-15.1 33.6-33.6v-88.1c0-18.6-15.1-33.6-33.6-33.6H312.2c-18.6 0-33.6 15.1-33.6 33.6v88.1c0 18.6 15.1 33.6 33.6 33.6h8.7v32.2c0 4 2.4 7.5 6 9.1 1.3.5 2.6.8 3.9.8 2.6-.1 5-1 6.9-2.8zm-25.5-59.1c-7.6 0-13.8-6.2-13.8-13.8v-88.1c0-7.6 6.2-13.8 13.8-13.8h144.3c7.6 0 13.8 6.2 13.8 13.8v88.1c0 7.6-6.2 13.8-13.8 13.8h-81.8c-2.6 0-5 1-6.8 2.8l-27.2 26v-18.9c0-5.5-4.4-9.9-9.9-9.9h-18.6z"/>
					<path fill="#EF6C00" fill-rule="nonzero" d="M333.8 147.95h101.1c5.5 0 9.9-4.4 9.9-9.9s-4.4-9.9-9.9-9.9H333.8c-5.5 0-9.9 4.4-9.9 9.9 0 5.4 4.5 9.9 9.9 9.9zm101.2 36.1c5.5 0 9.9-4.4 9.9-9.9s-4.4-9.9-9.9-9.9H333.8c-5.5 0-9.9 4.4-9.9 9.9s4.4 9.9 9.9 9.9H435z"/>
				</svg>
				<h3>Community affiatata</h3>
				<p>Non c’&egrave; crescita senza confronto! Grazie al forum privato tutti gli skillati si confrontano ogni giorno su argomenti che riguardano carriera, interessi ma anche dubbi.</p>
			</div>

			<div class="value f-1-3">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490.1 490.1">
					<path fill="#2C2F33" d="M356.32 424l2.5-2.2c.4-.3.7-.6 1-1 1.3-1.5 30.5-35.2 41.6-61.1h5.3c15.1 0 27.4-12.3 27.4-27.4V289c0-15.1-12.3-27.4-27.4-27.4h-5.9c-9.1-23.7-24.6-45.1-45.2-62.5-3-10.7-.8-22.1 6.7-34 4.2-6.7 4.2-15.1-.1-21.8-4.3-6.7-11.8-10.3-19.7-9.3-28.9 3.6-46.2 16.7-56.3 28.9-9.5-2.6-19.3-4.6-29.2-5.7-5.4-.6-10.4 3.2-11 8.7-.6 5.4 3.2 10.4 8.7 11 11 1.3 21.9 3.7 32.3 7 4.2 1.3 8.7-.3 11.2-3.9 6.8-10.1 20.5-22.9 46.7-26.2.2 0 .4 0 .6.3s.1.5 0 .6c-10.4 16.6-13.5 33.9-8.9 50.1.1 2.9 1.4 5.6 3.7 7.4 21.1 17 36.4 38.6 44.2 62.5 1.3 4.1 5.2 6.8 9.4 6.8h12.8c4.2 0 7.6 3.4 7.6 7.6v43.3c0 4.2-3.4 7.6-7.6 7.6h-12.1c-4.3 0-8.2 2.8-9.5 7-5.6 18.3-30.2 49.3-39.8 60.4l-2.2 1.9c-20.6 18.6-22.7 40.6-22.8 47.2v13.9h-57.1V457c0-2.8-1.2-5.5-3.3-7.4-2.1-1.9-4.9-2.8-7.7-2.5-14.6 1.5-29.3 1.3-43.5-.6-2.8-.4-5.7.5-7.8 2.4-2.2 1.9-3.4 4.6-3.4 7.5v13.9h-57.1V466c-.5-10.5-3.8-37.1-24.6-58.5-9.8-10.1-18.6-23.5-26.2-39.7-.1-.1-.1-.2-.2-.4-4.5-8.6-7.9-17.7-10.2-27.3l-.1-.4c0-.1-.1-.2-.1-.3-3.6-12-3.2-27.1-3.2-27.2v-.3c0-6.6.6-13.3 1.6-19.8.9-5.4-2.7-10.5-8.1-11.4s-10.5 2.7-11.4 8.1c-1.3 7.5-1.9 15.2-1.9 22.9-.1 2-.3 18.8 4 33.3 2.6 10.7 6.6 21.2 11.7 31.2 8.4 18.2 18.5 33.3 29.8 45 15.9 16.4 18.6 37 19 45.4v4.1c0 .4 0 .7.1 1.3.7 10.1 9.2 18.1 19.3 18.1h57.9c10.7 0 19.4-8.7 19.4-19.4v-3.3c8.7.7 17.3.8 26.1.4v2.9c0 10.7 8.7 19.4 19.4 19.4h57.9c10.7 0 19.4-8.7 19.4-19.4v-14.1c.2-3.1 1.3-19.1 16.3-32.6z"/>
					<path fill="#EF6C00" d="M56.82 191.4c0 44.9 36.5 81.5 81.5 81.5 44.9 0 81.5-36.5 81.5-81.5 0-44.9-36.5-81.5-81.5-81.5-44.9 0-81.5 36.5-81.5 81.5zm143.2 0c0 34-27.7 61.7-61.7 61.7s-61.7-27.7-61.7-61.7 27.7-61.7 61.7-61.7 61.7 27.7 61.7 61.7zm88.2-134.6c0-31.3-25.5-56.8-56.8-56.8s-56.8 25.5-56.8 56.8 25.5 56.8 56.8 56.8 56.8-25.5 56.8-56.8zm-93.9 0c0-20.4 16.6-37 37-37s37 16.6 37 37-16.6 37-37 37-37-16.6-37-37z"/>
				</svg>
				<h3>Risparmio assicurato</h3>
				<p>Registrandoti con il nostro abbonamento sarai sicuro di ottenere a un prezzo congelato la migliore formazione che il web offre.</p>
			</div>
		</div>
	</div>

	<div class="levels">
		<h1>Una scuola digitale per tutti</h1>
		<div class="flex wrap">
			<div class="level f-1-3">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492.8 492.8">
					<path fill="#EF6C00" d="M233.3 90.75v47.5c0 5.5 4.4 9.9 9.9 9.9s9.9-4.4 9.9-9.9v-46c20.4-3.2 36.1-20.9 36.1-42.3 0-23.6-19.2-42.8-42.8-42.8s-42.8 19.2-42.8 42.8c0 19.1 12.5 35.2 29.7 40.8zm13.1-63.8c12.7 0 23 10.3 23 23s-10.3 23-23 23-23-10.3-23-23 10.3-23 23-23z"/>
					<path fill="#2C2F33" d="M192.7 318.85v43c-12.6 6.4-44.9 24-75 48.7-8.4 6.9-13.2 17.1-13.2 28v37.2c0 5.5 4.4 9.9 9.9 9.9s9.9-4.4 9.9-9.9v-37.2c0-4.9 2.2-9.6 6-12.7 32.9-27 68.5-45 75.3-48.3 4.3-2.1 6.9-6.3 6.9-11.1v-52.3c0-3.3-1.7-6.4-4.4-8.2-4.1-2.7-6.5-7.3-6.5-12.1v-54.3c0-21.5 17.5-39 39-39h11.7c21.5 0 39 17.5 39 39v54.3c0 4.9-2.4 9.4-6.5 12.1-2.8 1.8-4.4 4.9-4.4 8.2v52.3c0 4.7 2.7 9 6.9 11.1 6.8 3.3 42.4 21.3 75.3 48.3 3.8 3.1 6 7.7 6 12.7v37.2c0 5.5 4.4 9.9 9.9 9.9s9.9-4.4 9.9-9.9v-37.2c0-10.9-4.8-21.1-13.2-28-30.1-24.8-62.4-42.3-75-48.7v-43c6.9-6.4 10.9-15.5 10.9-25.1v-54.3c0-32.4-26.4-58.8-58.8-58.8h-11.7c-32.4 0-58.8 26.4-58.8 58.8v54.3c0 9.6 4 18.7 10.9 25.1z"/>
				</svg>
				<h3>Junior</h3>
				<p>Non hai ancora creato la tua prima pagina web ma muori dalla voglia di farlo? Grazie ai corsi base avrai tutto il materiale per muovere i primi passi.</p>
			</div>
			<div class="level f-1-3">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492.8 492.8">
					<path fill="#EF6C00" d="M321.8 176.05c1.9 1.9 4.5 2.9 7 2.9s5.1-1 7-2.9l30.8-30.8c7 4.7 15.2 7.2 23.8 7.2 11.4 0 22.2-4.5 30.3-12.5 16.7-16.7 16.7-43.9 0-60.6-8.1-8.1-18.9-12.5-30.3-12.5s-22.2 4.5-30.3 12.5c-13.9 13.9-16.2 35.1-6.9 51.4l-31.3 31.3c-3.9 3.8-3.9 10.1-.1 14zm52.3-82.8c4.4-4.4 10.1-6.7 16.3-6.7 6.2 0 11.9 2.4 16.3 6.7 9 9 9 23.6 0 32.6-4.4 4.4-10.1 6.8-16.3 6.8-6.2 0-11.9-2.4-16.3-6.8-9-9-9-23.6 0-32.6zm-140.8-2.5v47.5c0 5.5 4.4 9.9 9.9 9.9s9.9-4.4 9.9-9.9v-46c20.4-3.2 36.1-20.9 36.1-42.3 0-23.6-19.2-42.8-42.8-42.8s-42.8 19.2-42.8 42.8c0 19.1 12.5 35.2 29.7 40.8zm13.1-63.8c12.7 0 23 10.3 23 23s-10.3 23-23 23-23-10.3-23-23 10.3-23 23-23zm-144 125.5c7.7 0 15.1-2.1 21.6-5.9l31.3 31.3c1.9 1.9 4.5 2.9 7 2.9s5.1-1 7-2.9c3.9-3.9 3.9-10.1 0-14l-31-31c10.7-16.6 8.9-39-5.7-53.6-8.1-8.1-18.9-12.5-30.3-12.5s-22.2 4.5-30.3 12.5c-16.7 16.7-16.7 43.9 0 60.6 8.2 8.1 19 12.6 30.4 12.6zm-16.3-59.2c4.4-4.4 10.1-6.7 16.3-6.7s11.9 2.4 16.3 6.7c9 9 9 23.6 0 32.6-4.4 4.4-10.1 6.8-16.3 6.8-6.2 0-11.9-2.4-16.3-6.8-9-9-9-23.6 0-32.6z"/>
					<path fill="#2C2F33" d="M192.7 318.85v43c-12.6 6.4-44.9 24-75 48.7-8.4 6.9-13.2 17.1-13.2 28v37.2c0 5.5 4.4 9.9 9.9 9.9s9.9-4.4 9.9-9.9v-37.2c0-4.9 2.2-9.6 6-12.7 32.9-27 68.5-45 75.3-48.3 4.3-2.1 6.9-6.3 6.9-11.1v-52.3c0-3.3-1.7-6.4-4.4-8.2-4.1-2.7-6.5-7.3-6.5-12.1v-54.3c0-21.5 17.5-39 39-39h11.7c21.5 0 39 17.5 39 39v54.3c0 4.9-2.4 9.4-6.5 12.1-2.8 1.8-4.4 4.9-4.4 8.2v52.3c0 4.7 2.7 9 6.9 11.1 6.8 3.3 42.4 21.3 75.3 48.3 3.8 3.1 6 7.7 6 12.7v37.2c0 5.5 4.4 9.9 9.9 9.9s9.9-4.4 9.9-9.9v-37.2c0-10.9-4.8-21.1-13.2-28-30.1-24.8-62.4-42.3-75-48.7v-43c6.9-6.4 10.9-15.5 10.9-25.1v-54.3c0-32.4-26.4-58.8-58.8-58.8h-11.7c-32.4 0-58.8 26.4-58.8 58.8v54.3c0 9.6 4 18.7 10.9 25.1z"/>
				</svg>
				<h3>Middle</h3>
				<p>Sai creare pagine web ma vuoi approfondire linguaggi come JavaScript o PHP? Abbiamo pensato anche a questo, inizia subito.</p>
			</div>
			<div class="level f-1-3">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492.8 492.8">
					<path fill="#EF6C00" d="M362 266.95h47.3c5.6 17.1 21.7 29.4 40.7 29.4 23.6 0 42.8-19.2 42.8-42.8s-19.2-42.8-42.8-42.8c-21.4 0-39.2 15.9-42.3 36.5H362c-5.5 0-9.9 4.4-9.9 9.9 0 5.4 4.5 9.8 9.9 9.8zm88-36.4c12.7 0 23 10.3 23 23s-10.3 23-23 23-23-10.3-23-23 10.3-23 23-23zm-128.2-54.5c1.9 1.9 4.5 2.9 7 2.9s5.1-1 7-2.9l30.8-30.8c7 4.7 15.2 7.2 23.8 7.2 11.4 0 22.2-4.5 30.3-12.5 16.7-16.7 16.7-43.9 0-60.6-8.1-8.1-18.9-12.5-30.3-12.5s-22.2 4.5-30.3 12.5c-13.9 13.9-16.2 35.1-6.9 51.4l-31.3 31.3c-3.9 3.8-3.9 10.1-.1 14zm52.3-82.8c4.4-4.4 10.1-6.7 16.3-6.7 6.2 0 11.9 2.4 16.3 6.7 9 9 9 23.6 0 32.6-4.4 4.4-10.1 6.8-16.3 6.8-6.2 0-11.9-2.4-16.3-6.8-9-9-9-23.6 0-32.6zm-140.8-2.5v47.5c0 5.5 4.4 9.9 9.9 9.9s9.9-4.4 9.9-9.9v-46c20.4-3.2 36.1-20.9 36.1-42.3 0-23.6-19.2-42.8-42.8-42.8s-42.8 19.2-42.8 42.8c0 19.1 12.5 35.2 29.7 40.8zm13.1-63.8c12.7 0 23 10.3 23 23s-10.3 23-23 23-23-10.3-23-23 10.3-23 23-23zM42.8 296.45c18.9 0 35-12.4 40.7-29.4h43.4c5.5 0 9.9-4.4 9.9-9.9s-4.4-9.9-9.9-9.9H85.1c-3.1-20.6-20.9-36.5-42.3-36.5-23.6 0-42.8 19.2-42.8 42.8-.1 23.6 19.2 42.9 42.8 42.9zm0-65.9c12.7 0 23 10.3 23 23s-10.3 23-23 23-23-10.3-23-23c-.1-12.7 10.3-23 23-23zm59.6-78.1c7.7 0 15.1-2.1 21.6-5.9l31.3 31.3c1.9 1.9 4.5 2.9 7 2.9s5.1-1 7-2.9c3.9-3.9 3.9-10.1 0-14l-31-31c10.7-16.6 8.9-39-5.7-53.6-8.1-8.1-18.9-12.5-30.3-12.5s-22.2 4.5-30.3 12.5c-16.7 16.7-16.7 43.9 0 60.6 8.2 8.1 19 12.6 30.4 12.6zm-16.3-59.2c4.4-4.4 10.1-6.7 16.3-6.7s11.9 2.4 16.3 6.7c9 9 9 23.6 0 32.6-4.4 4.4-10.1 6.8-16.3 6.8-6.2 0-11.9-2.4-16.3-6.8-9-9-9-23.6 0-32.6z"/>
					<path fill="#2C2F33" d="M192.7 318.85v43c-12.6 6.4-44.9 24-75 48.7-8.4 6.9-13.2 17.1-13.2 28v37.2c0 5.5 4.4 9.9 9.9 9.9s9.9-4.4 9.9-9.9v-37.2c0-4.9 2.2-9.6 6-12.7 32.9-27 68.5-45 75.3-48.3 4.3-2.1 6.9-6.3 6.9-11.1v-52.3c0-3.3-1.7-6.4-4.4-8.2-4.1-2.7-6.5-7.3-6.5-12.1v-54.3c0-21.5 17.5-39 39-39h11.7c21.5 0 39 17.5 39 39v54.3c0 4.9-2.4 9.4-6.5 12.1-2.8 1.8-4.4 4.9-4.4 8.2v52.3c0 4.7 2.7 9 6.9 11.1 6.8 3.3 42.4 21.3 75.3 48.3 3.8 3.1 6 7.7 6 12.7v37.2c0 5.5 4.4 9.9 9.9 9.9s9.9-4.4 9.9-9.9v-37.2c0-10.9-4.8-21.1-13.2-28-30.1-24.8-62.4-42.3-75-48.7v-43c6.9-6.4 10.9-15.5 10.9-25.1v-54.3c0-32.4-26.4-58.8-58.8-58.8h-11.7c-32.4 0-58.8 26.4-58.8 58.8v54.3c0 9.6 4 18.7 10.9 25.1z"/>
				</svg>
				<h3>Senior</h3>
				<p>Vuoi scoprire le tecniche per velocizzare il tuo lavoro e migliorare la collaborazione in team? Puoi farlo grazie ai nostri corsi avanzati.</p>
			</div>
		</div>
	</div>
	<?php
}

//* Aggiungo la sezione dedicata ai testimonials
add_action( 'genesis_after_header', 'sam_testimonials', 10 );

add_action( 'genesis_before_footer', 'sam_courses_list', 3 );
function sam_courses_list() {
	$args = array(
		'post_type' => 'course',
		'posts_per_page' => 4,
		'post_status' => 'publish'
	);

	$courses_loop = new WP_Query( $args );
	$courses_page = get_permalink( get_page_by_path( 'corsi' ) );
	if( $courses_loop->have_posts() ):
		?>
		<div class="courses">
			<div class="flex wrap">
				<?php
				while( $courses_loop->have_posts() ) : $courses_loop->the_post();
					?>
					<a class="f-1-4" href="<?php the_permalink(); ?>">
						<?php
						the_post_thumbnail();
						//lifterlms_template_single_difficulty();
						?>
					</a>
					<?php
				endwhile;
				?>
				<a class="btn cta" href="<?php echo $courses_page; ?>" title="Scopri tutti i corsi di SkillsAndMore">Scopri tutti i corsi</a>
			</div>
		</div>
		<?php
	endif;

	wp_reset_query();

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 4
	);

	$article_loop = new WP_Query( $args );
	$blog_page = get_permalink( get_page_by_path( 'blog' ) );
	if( $article_loop->have_posts() ):
		?>
		<div class="articles">
			<div class="flex wrap">
				<div class="intro">
					<h2>Nuovi articoli ogni settimana</h2>
					<p>Nuovi articoli aggiornati per aiutarti a rimanere al passo con i tempi e conoscere le ultime novitá del mondo digitale. Iscriviti <a href="/newsletter" title="Iscriviti anche tu alla newsletter">alla nostra newsletter</a>!
						E per gli skillati che si sono <a href="/registrami" title="Diventa uno skillato!">iscritti alla nostra membership</a> riserviamo case study approfonditi.</p>
				</div>
				<?php
				while( $article_loop->have_posts() ): $article_loop->the_post();
					?>
					<div class="f-1-2">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						<div class="overlay">
							<a class="btn cta" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Leggi l'articolo</a>
							<div class="post-cat"><?php the_category( ', ' ); ?></div>
						</div>
					</div>
					<?php
				endwhile;
				?>
				<a class="btn cta all-art" href="<?php echo $blog_page; ?>" title="Scopri tutti gli articoli di SkillsAndMore">Leggi gli altri articoli</a>
			</div>
		</div>
		<?php
	endif;

	wp_reset_query();

	// Sezione Answers e FooBar
	?>
	<div class="media">
		<div class="flex wrap">
			<div class="intro">
				<h2>Segui i nostri nuovi appuntamenti!</h2>
				<p>Il nostro impegno &egrave; fornirti le informazioni migliori che ti aiuteranno a migliorare la tua carriera, per questo motivo abbiamo iniziato due nuovi appuntamenti <strong>video</strong> e <strong>audio</strong>. Cos&iacute; potrai scegliere la soluzione che preferisci!</p>
			</div>
			<div class="f-1-2">
				<h3>Ottieni risposte ai tuoi dubbi</h3>
				<p>Ecco le Skilled Answers, il nostro appuntamento quotidiano dove rispondiamo in formato video alle domande pi&ugrave; interessanti che troviamo su Quora.</p>
				<a title="Skilled Answers, risposte quotidiane ai tuoi dubbi digitali" href="https://www.youtube.com/playlist?list=PLs6wiV5pkOnCp2FSqHM6gvEKFjP2oBRqY" target="_blank" rel="noopener nofollow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/youtube-skilled-answers.jpg" alt="Skilled Answers, risposte quotidiane ai tuoi dubbi digitali"></a>
			</div>
		</div>
	</div>

	<?php
}

add_action( 'genesis_before_footer', 'sam_price_table', 4 );

genesis();
