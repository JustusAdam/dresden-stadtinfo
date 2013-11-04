Projektarbeit Einfuerung in die Medieninformatik 13/14

Erstellund eines Stadtfuerers fuer Dresden in Form einer Webseite.

Justus Adam, Jens Wettlaufer, Adrian Lieber, Peter Klausing

//////////////
STYLEGUIDE
//////////////

Aufteilung der Seiten:

0. Allgemein
	- weißer Hintergrund
	- keine abgerundeten Ecken
	- einfache, klare und intuitive Struktur
	- simple Bedienung
	- übersichtliche Darstellung
	- eindeutige Abgrenzungen

	- einen alles überdeckenden (width: 100%; z-index: 1), fixierten, knallig farbigen HEADER mit...
		-- ... KARTE/STARTSEITE-Button
		-- ... Überschrift
		-- ... "nach oben"-Button
	- body-Breite: 1000px
	- Schriftart: Calibri


1. Startseite
	- 6 Buttons mit Hintergrundbildern zu 6 verschiedenen Points of Interests (POIs)
		-- 3 Zeilen mit jeweils 2 POIs nebeneinander
	- POIs aus 6 verschiedenen Bereichen: 
		-- Großer Garten (Park)
		-- Blaues Wunder (Brücke)
		-- Semper Oper (Oper)
		-- Zwinger (Museum)
		-- Frauenkirche (Kirche)
		-- Technische Universität Dresden (Uni)

2. POI-Seiten
	- zu jedem POI eine eigene Seite
	- durchgehend dasselbe Layout
	- Eingabe der Daten über php-Code aus einer Datenbank
	
	- oberstes Element: Karte mit gekennzeichnetem POI (gleiche Funktionen wie 3.)
	- mittlere Elemente:
		-- linkes Element: Informationstext über den POI
		-- rechtes Element: optional für Video/Audio 
	- unterstes Element: jQuery-SlideShow-Bildergallerie

3. Karte
	- Fullscreen-Karte
	- alle POIs gekennzeichnet
		-- Name
		-- Adresse
		-- Bild
		-- Link zur POI-Seite
		-- Minimieren-Button (X)
	- Routen-Option von beliebiger Adresse
	- weitere Ideen folgen...

4. Impressum
	- ausschließlich Blocksatz-Text
	- Copyright auf alle Bilder
	- Freeware-Lizenz OpenStreetMap
	- freie Benutzung von jQuery-Programmierungen
