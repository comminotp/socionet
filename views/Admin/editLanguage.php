<?php $this->title = "Editer une langue"; ?>

<h1>Editer une langue</h1>
<form method="post" action="admin/saveLanguage">
    
<table>
    <tr>
        <th>Id</th>
        <td><input type="text" name="idLanguage" value="<?php echo $language['idLanguage'] ?>" /></td>
        <td class="error"><?php if (!empty($errors['idLanguage'])) { echo $errors['idLanguage']; } ?></td>
    </tr>
    <tr>
        <th>Langue</th>
        <td><input type="text" name="LanguageName" value="<?php echo $language['LanguageName'] ?>" /></td>
        <td class="error"><?php if (!empty($errors['LanguageName'])) { echo $errors['LanguageName']; } ?></td>
    </tr>
    <tr>
        <th>Active</th>
        <td><input type="checkbox" name="Enabled" <?php echo $language['Enabled'] ? 'checked="checked"': "" ?> /></td>
        <td class="error"></td>
    </tr>
    <tr>
        <th><input type="hidden" name="oldIdLanguage" value="<?php echo $language['oldIdLanguage'] ?>"</th>
        <td><input type="submit" name="saveLanguage" value="Enregistrer" /></td>
    </tr>
</table>
</form>

<p><a href="admin/">Menu Administration</a></p>
<p><a href="admin/listLanguages">Liste des langues</a></p>
