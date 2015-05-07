<?php $this->title = "Editer un numéro de téléphone"; 
 require_once 'views/htmltools.php';
?>

<h1>Editer un numéro de téléphone</h1>
<form method="post" action="admin/savePhoneNumber">
    
<table>
    <tr>
        <th>Téléphone</th>
        <td><input type="text" name="PhoneNumber" value="<?php echo $phoneNumber['PhoneNumber'] ?>" /></td>
        <td class="error"><?php if (!empty($errors['PhoneNumber'])) { echo $errors['PhoneNumber']; } ?></td>
    </tr>
    <tr>
        <th>Institution</th>
        <td><?php echo select("idInstitution", AssociativeArray($institutions, "idInstitution", "InstitutionName"), $phoneNumber['idInstitution']); ?></td>
        <td class="error"><?php if (!empty($errors['idInstitution'])) { echo $errors['idInstitution']; } ?></td>
    </tr>
    <tr>
        <th><input type="hidden" name="idPhone" value="<?php echo $phoneNumber['idPhone'] ?>"</th>
        <td><input type="submit" name="saveLanguage" value="Enregistrer" /></td>
    </tr>
</table>
</form>

<p><a href="admin/">Menu Administration</a></p>
<p><a href="admin/listLanguages">Liste des langues</a></p>
