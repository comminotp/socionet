<?php $this->title = 'Configuration de la borne'; ?>

<form method="post" action="terminal/editConfig">
    <fieldset>
        <legend>Configuration de la borne</legend>
        <table>
            <tr>
                <th>
                    <span>Suis-je une borne ?</span>       
                </th>
                <td>
                    <input type="radio" name="isTerminal" value="true" <?php echo $isTerminal ? 'checked' : ''; ?>>Oui</input>
                    <input type="radio" name="isTerminal" value="false" <?php echo!$isTerminal ? 'checked' : ''; ?>>Non</input>
                </td>
            </tr>
            <tr>
                <th>
                    <span>Langage actuel :</span>
                </th>
                <td>
                    <select name="selectedLanguage">
                        <?php
                        foreach ($languages as $language) {
                            $idLan = $language['idLanguage'];
                            echo sprintf('<option value="%s" %s>%s</option>', $idLan, ($idLan == $selectedLanguage ? 'selected' : ''), $language['LanguageName']);
                        }
                        ?>
                    </select>
                </td>    
            </tr>
            <tr>
                <th><span>Emplacement :</span></th>
                <td><input type="text" name="location" value="<?php echo $location; ?>" /></td>
            </tr>    
            <tr>
                <td></td>
                <td><input type="submit" value="Modifier" /></td>
            </tr>
        </table>
    </fieldset>
</form>
