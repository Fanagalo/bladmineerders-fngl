<?php

/**
 * Template part for showing the legenda on content-determination-separate-table.php
 *
 * @package bladmineerders-fngl
 */

    if (get_locale() == 'nl_NL') {

        printf(
        '<div class="table-legend-column">
                <h3>Orgaan</h3>
                het meest opvallend door de aantasting getroffen orgaan  <br/>
                <br/>
                <strong>blad</strong> ook naald, phyllodium, bladsteel   <br />
                <strong>bladknop</strong> ook ontvouwend jong blad  <br />
                <strong>bloem</strong> ook bloeiwijze<br />
                <strong>knop</strong> zowel blad- als bloemknoppen <br />
                <strong>stengel</strong> ook halm, onderste deel van de bloemsteel, bij grassen ook de bladschede  <br />
                <strong>systemisch</strong> de gehele bovengrondse plant  <br />
                <strong>wortel</strong> ook wortelstok en kruipende stengel, uitloper  <br />
                <strong>wortelhals</strong> ook het onderste deel van de stengel<br />
            </div>

            <div class="table-legend-column">
                <h3>PARASITEERWIJZE</h3>
                <strong>bladvlek</strong> verkleurd, meestal niet vergald, vaak ± necrotisch teken van een schimmelaantasting  <br />
                <strong>boorder</strong> larve inwendig, uitwendig vrijwel geen tekenen  <br />
                <strong>dons</strong> 0.5-2 mm hoge schimmeldons  <br />
                <strong>gal</strong> zwelling en/of misvorming  <br />
                <strong>kanker</strong> beperkte gebied van dood plant materiaal<br />
                <strong>mineerder-boorder</strong> larve leeft aanvankelijk als mineerder, later als boorder  <br />
                <strong>mineerder > boorder</strong><br />
                <strong>overtrek</strong> dunne film van schimmelweefsel  <br />
                <strong>streep</strong> streep van schimmelweefsel in de lengterichting van een grasblad<br />
                <strong>wrat</strong> prop van schimmelweefsel, meestal bruin-zwart en < 2 mm  <br />
            </div>

            <div class="table-legend-column">
                <h3>KOLOMMEN</h3>
                <strong>P</strong> met afbeelding<br />
                <strong>G</strong> aantal geslachten op deze website<br />
                <strong>S</strong> aantal soorten op deze website<br />             
                <h3>TABEL FILTEREN EN SORTEREN</h3> 
                <strong>Filter</strong> bovenstaande tabel door een zoekterm te typen in het search-veld (bovenaan rechts in de tabel).<br/>
                <strong>Sorteer een kolom</strong> door te klikken op de pijltjes achter de kolomnaam (zowel oplopend als aflopend). <br/>
                <strong>Sorteer op meerdere kolommen</strong> door met Shift&nbsp;+&nbsp;klik op volgende pijltjes te klikken.<br/>
                <h3>NOTA BENE</h3> 
                Het waardplanten-spectrum van een parasiet is vaak onvolledig bekend, 
                zeker op het niveau van afzonderlijke soorten. Raadpleeg daarom in elk geval ook 
                de tabel van alle soorten van dit geslacht.<br/>
            </div>
        ');

    } else {

        printf('
            <div class="table-legend-column">
                <h3>Organ</h3>
                the part of the plant that most conspicuously is hit by the parasite<br/>
                <br/> 
                <strong>bud</strong>: both flower buds and leaf buds <br/>
                <strong>flower</strong>: also inflorescence  <br/>
                <strong>leaf</strong>: also needle, phyllodium, petiole <br/>
                <strong>leaf bud</strong>: also unfolding young leaf <br/>
                <strong>root</strong>: also root stock, runners <br/>
                <strong>root collar</strong>: also the lowest part of the stem <br/>
                <strong>stem</strong>: also culm, the lower part of the peduncle, in grasses also leaf sheath <br/>
                <strong>systemic</strong>: the entire above-ground plant
            </div>

            <div class="table-legend-column">
                <h3>PARASITIC MODE</h3> 
                <strong>borer</strong>: larva living internally, almost no outwards signs <br/>
                <strong>canker</strong>: restricted area of dead plant tissue  <br/>
                <strong>down</strong>: 0.5-2 mm high fungal down <br/>
                <strong>film</strong>: very thin cover of fungal tissue <br/>
                <strong>free</strong>: free-living, vagrant<br/>
                <strong>gall</strong>: swelling and/or malformation <br/>
                <strong>hidden</strong>: concealed by dense webbing, leaf folds etc.<br/>
                <strong>leaf spot</strong>: discoloured, often ± necrotic, generally not galled, sign of a fungus infection <br/>
                <strong>miner > borer</strong>: larve initially makes a mine, lives as a borer later <br/>
                <strong>pustule</strong>: plug of fungal tissue, generally brown-black and < 2 mm <br/>
                <strong>saprotrophic</strong>: developing on recently dead, still identifiable, plant tissue  <br/>
                <strong>scale</strong>: scale insect<br/>
                <strong>stripe</strong>: longitudinal line of fungal tissue in a grass leaf
            </div>

            <div class="table-legend-column">
                <h3>COLUMNS</h3>
                <strong>P</strong>: with image<br/>
                <strong>G</strong>: number of genera on this website<br/>
                <strong>S</strong>: number of species on this website<br/>
                <h3>FILTER AND SORT TABLE</h3> 
                To <strong>filter</strong> the table above, add a text to the search field (top right of the table).<br/>
                To <strong>sort a column</strong> click on an arrow after the column name (both ascending and descending). <br/>
                <strong>Sort multiple columns</strong> with Shift&nbsp;+&nbsp;click on the arrows.<br/>
                <h3>IMPORTANT</h3>
                The host plant spectre of a parasite is rarely known exhaustively; 
                this applies in particular at the species level. It is advisable therefore to 
                check at least also the list of all parasites of this genus.<br/>
            </div>
        '); 
    }
?>