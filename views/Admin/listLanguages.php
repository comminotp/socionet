<?php 
    $this->title = "Liste des langues"; 
    
    function OuiNon($arg) {
        return $arg ? "Oui" : "Non";
    }
    
?>

<h1>Liste des langues</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Active</th>
        <th colspan="2">Action</th>
    </tr>
    <?php foreach($languages as $l):  ?>
    <tr>
        <td><?php echo $l['idLanguage']; ?></td>
        <td><?php echo $l['LanguageName']; ?></td>
        <td><?php echo OuiNon($l['Enabled']); ?></td>
        <td><a href="admin/editLanguage/<?php echo $l['idLanguage'] ?>"><img src="contents/img/b_edit.png" alt="Editer" title="Editer" width="16" height="16" border="0" /></a></td>
        <td>
            <form method="post" action="admin/deleteLanguage">
                <input type="hidden" name="idLanguage" value="<?php echo $l['idLanguage'] ?>" />
                <input type="image" src="contents/img/b_drop.png" alt="Supprimer" />
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<p><a href="admin/editLanguage/"><img src="contents/img/b_edit.png" alt="Editer" title="Editer" width="16" height="16" border="0" />Ajouter une nouvelle langue</a></p>
