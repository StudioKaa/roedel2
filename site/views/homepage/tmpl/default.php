<?php
// no direct access
defined('_JEXEC') or die;

$this->activiteiten = array(
    3 => array(
        'naam' => 'SVLA 2017',
        'form' => 'https://docs.google.com/a/scoutingrveer.nl/forms/d/e/1FAIpQLSd0vz9M1Y0uEZyIknmn_rgUDEVngRFlAk2AegisEe9hMjtd5g/viewform',
        'datum' => '10 juni',
        'sluit' => '2017-05-27'
    ),
    2 => array(
        'naam' => 'Ideeenbus LAK-avond',
        'form' => 'https://goo.gl/forms/oYldX4pUYGTHHt9t2',
        'datum' => '22 april',
        'sluit' => '2017-03-25'
    )
);

$this->activiteiten_toekomst = array();
foreach($this->activiteiten as $activiteit){
    $date1 = new DateTime();  //current date or any date
    $date2 = new DateTime($activiteit['sluit']);   //Future date
    if($date2 >= $date1){
        $diff = $date2->diff($date1)->format("%a");  //find difference
        $days = intval($diff);   //rounding days

        $this->activiteiten_toekomst[] = array(
            "form" => $activiteit["form"],
            "naam" => $activiteit["naam"],
            "datum" => $activiteit["datum"],
            "days" => $days
        );
    }
}

?>
<p class="info_well" style="margin-left: 0px; background-color: #eee;">Welkom op het leidingportaal van Scouting Raamsdonksveer! Mail voor al je vragen naar <a href="mailto:helpdesk@scoutingrveer.nl" target="_self">helpdesk@scoutingrveer.nl</a>. Dit portaal is voor iedereen met een <em>naam@scoutingrveer.nl</em> account. Lees hieronder meer over waar de e-mail blijft die naar je account wordt gestuurd.</p>
<p>&nbsp;</p>
<?php if(!empty($this->activiteiten_toekomst)): ?>
    <h2>Opgeven activiteiten</h2>
    <div class="info_well" style="margin-left: 0px; border: 3px double orange;">
        <ul>
            <?php foreach($this->activiteiten_toekomst as $activiteit): ?>
                <li>
                    <a target="_blank" href="<?php echo $activiteit['form']; ?>"><strong><?php echo $activiteit['naam']; ?></strong></a>,
                    <?php echo $activiteit['datum']; ?><br />(sluit over <?php echo $activiteit['days']; ?> dagen)

                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<h2>Informatie</h2>
<div class="infotabel infotabel3">
    <div class="row">
        <div class="info_col"><a href="https://docs.google.com/a/scoutingrveer.nl/document/d/1nVe0IbYojXHASqndDiWUE7h28JHVDrJFD0-heiieRys/edit?usp=sharing" target="_blank"><img alt="logo-docs" src="images/stories/leidingfoto/logo-docs.png" /><br />Blauwdruk</a>
        </div>
        <div class="info_col"><a href="https://drive.google.com/drive/u/<?php echo $this->juser->email; ?>/folders/0ABCrCmIE1OhHUk9PVA" target="_blank"><img alt="bestanden" src="images/jdownloads/catimages/folder_doc.png" /><br />Bestanden algemeen (voor vrijwilligers)</a>
        </div>
        <div class="info_col"><a href="/info" target="_blank"><img alt="info-boekje" src="images/stories/LJU/book-review-1.jpg" /><br />Info algemeen (gericht op ouders)</a>
        </div>
    </div>
</div>
<p>&nbsp;</p>
<h2>Samenwerken</h2>
<div class="infotabel infotabel3">
    <div class="row">
        <div class="info_col"><a href="http://drive.scoutingrveer.nl" target="_blank"><img alt="logo-drive" src="images/stories/leidingfoto/logo-drive.png" /><br />Drive</a>
        </div>
        <div class="info_col"><a href="leiding/e-mailadressen-en-lijsten" target="_self"><img alt="duim" src="images/stories/duim_op.jpg" /><br />E-mailadressen en lijsten</a>
        </div>
        <div class="info_col"><a href="https://3.basecamp.com/google_sign_in" target="_blank"><img alt="logo-basecamp" src="images/stories/logo-basecamp.png" /><br />Basecamp</a>
        </div>
    </div>
    <div class="row">
        <div class="info_col"><a href="https://facebook.com/groups/scoutingraamsdonksveer" target="_blank"><img alt="fb algemeen" src="images/stories/leidingfoto/fb_algemeen.png" /><br />Fbgroep ALGEMEEN</a>
        </div>
        <div class="info_col"><a href="https://facebook.com/groups/scoutingrveer" target="_blank"><img alt="fb groepsraad" src="images/stories/fb_groepsraad.png" /><br />Fbgroep GROEPSRAAD</a>
        </div>
        <div class="info_col"><a href="leiding/teams" target="_self"><img alt="smoelenboek" src="images/stories/leidingfoto/thumbnails/thumb_male-silhouette-group.jpg" /><br />Smoelenboek en teams</a>
        </div>
    </div>
</div>
<p>&nbsp;</p>
<h2>Tools</h2>
<div class="infotabel infotabel3">
    <div class="row">
        <div class="info_col"><a href="http://lab.scoutingrveer.nl/verhuurmail" target="_blank"><img alt="alarmclock-512" src="images/stories/alarmclock-512.png" /><br />Verhuuralarm</a>
        </div>
        <div class="info_col"><a href="http://scoutingrveer.nl/administrator/index.php?option=com_supercal" target="_blank"><img alt="agenda" src="images/stories/nieuwsbrief/plaatje_agenda.jpg" /><br />Agenda-items toevoegen</a>
        </div>
        <div class="info_col"><a href="http://ical.scoutingrveer.nl/index.php" target="_blank"><img alt="telefoon" src="images/stories/Mobile-Smartphone-icon.png" /><br />Agenda op je telefoon</a>
        </div>
    </div>
    <div class="row">
        <div class="info_col"><a href="administrator" target="_blank"><img alt="tools" src="/images/jdownloads/catimages/tools.png" /><br />Ketelhok</a>
        </div>
        <div class="info_col"><a href="https://docs.google.com/a/scoutingrveer.nl/forms/d/e/1FAIpQLScUbbPtix3QpVXyculwGruHL3azmGGEMNkqEiA6-vDJ6NpMgg/viewform?usp=sf_link" target="_blank"><img alt="money" src="images/stories/money.png" /><br />Online declaratieformulier</a>
        </div>
        <div class="info_col"><a href="http://mail.scoutingrveer.nl" target="_blank"><img alt="logo-gmail" src="images/stories/logo-gmail.png" /><br />Mail</a>
        </div>
    </div>
</div>
<p>&nbsp;</p>
<h2>Administratie</h2>
<div class="infotabel">
    <div class="row">
        <div class="info_col"><a href="http://sol.scouting.nl" target="_blank"><img alt="scouts-online1" src="images/stories/scouts-online1.jpg" /><br />Scouts OnLine</a>
        </div>
        <div class="info_col"><a href="https://myaccount.google.com/?authuser=<?php echo $this->juser->email; ?>" target="_blank"><img alt="geenfoto" src="images/stories/leidingfoto/geen.jpeg" /><br />Foto instellen</a><br />(Klik op de foto in het blauwe schildje).
        </div>
    </div>
</div>
<p>&nbsp;</p>
<h2>Je @scoutingrveer.nl e-mailadres</h2>
<p>Standaard wordt email naar <?php echo $this->juser->email; ?> doorgestuurd naar je eigen e-mailadres (naam@hotmail.com / naam@ziggo.nl / etc.). Je kunt ook een postvak aanvragen. Dan komt je mail daarin terecht en kun je die gescheiden houden van je persoonlijke mail. Meer informatie via helpdesk@scoutingrveer.nl.</p>