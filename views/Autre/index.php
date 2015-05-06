<?php $this->title = "Autre exemple"; ?>

<h1>Une autre page d'exemple</h1>
<?php
    echo '$donnee_de_test -> ';
    var_dump($donnee_de_test);

    echo '<br /><br />Test de nettoyage: ';
    echo $this->sanitize($exemple_html);

    echo '<br /><br />Test de sql: ';
    foreach($billets as $billet) {
        echo $billet['BIL_TITRE'] . ' -> ' .$billet['BIL_CONTENU'];
        echo '<br />';
    }
?>
