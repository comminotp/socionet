<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 

        <title>Formulaire</title>
    </head>
    <body>
        <div>
            <form id="inscription" action="Traitement.php" method="post" >
                <fieldset>
                    <legend>
                        Formulaire
                    </legend>
                    <table>
                        <tr>
                            <td>
        
                                Nom de l'institution :*
                            </td>
                            <td>
                                <input type="text" name="nom" id="nom" placeholder="(ex. Centre d'aide de Gen�ve)" required autofocus />
                            </td>
                        </tr>
                        <tr>
                            <td	>
                                Adresse :*
                            </td>
                            <td>
                                <textarea rows="2" cols="50" name="adresse" id="adresse" placeholder="(ex. 120 Route du Jura)" required autofocus></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Coordonn�es de l'institution :*
                            </td>
                            <td>
                                <input type="text" name="coordonnees" id="coordonnees" placeholder="(ex. 12.34567, 98.765432)" required autofocus />
                            </td>
                        </tr>
                        <tr>
                            <tr>
                                <td>
                                    Description :*
                                </td>
                                <td>
                                    <textarea rows="4" cols="50" name="description" id="description" required autofocus></textarea>
                                </td>
                            </tr>
                            <td>
                                Logo :
                            </td>
                            <td>
                                <input type="file"  name="logo" id="logo" placeholder="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Image :
                            </td>
                            <td>
                                <input type="file" name="image" id="image" placeholder="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>						
                                <input type="submit" id="button" value="Envoyer"   />
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
            <p>Les champs avec * sont obligatoires</p>
        </div>
    </body>
</html>