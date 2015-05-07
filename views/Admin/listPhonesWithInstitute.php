<?php 
    $this->title = "Liste des numéros de téléphone avec les institutions"; 
    
    function OuiNon($arg) {
        return $arg ? "Oui" : "Non";
    }
    
?>

<h1>Liste des numéro de téléphone</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Téléphones</th>
        <th>Institutions</th>
        <th colspan="2">Action</th>
    </tr>
    <?php foreach($PhoneNumber as $l):  ?>
    <tr>
        <td><?php echo $l['idPhones']; ?></td>
        <td><?php echo $l['PhoneNumber']; ?></td>
        <td><?php echo $l['idInstititions']; ?></td>
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
