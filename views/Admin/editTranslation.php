<?php $this->title = "Editer une traduction"; ?>

<h1>Editer une traduction</h1>
<form method="post" action="admin/saveTranslation">

    <table>
        <tr>
            <th>idLangue</th>
            <td><?php echo select('idLanguage',$languages,'fr') ?></td>
            <td class="error"><?php if (!empty($errors['idLanguage'])) { echo $errors['idLanguage']; } ?></td>
        </tr>
        <tr>
            <th>idText</th>
            <td><?php echo select('idText',$texts,0) ?></td>
            <td class="error"><?php if (!empty($errors['idText'])) { echo $errors['idText']; } ?></td>
        </tr>
        <tr>
            <th>Traduction</th>
            <td><textarea name="Translation" cols="80" rows="10"></textarea></td>
            <td class="error"><?php if (!empty($errors['translation'])) { echo $errors['translation']; } ?></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="saveTranslation" value="Enregistrer" /></td>
        </tr>
    </table>
</form>

<p><a href="admin/">Menu Administration</a></p>
<p><a href="admin/listLanguages">Liste des langues</a></p>



