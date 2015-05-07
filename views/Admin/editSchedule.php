<?php $this->title = "Editer un horaire"; ?>

<form action="admin/saveSchedule" method="post">
    <table id="table" cellspacing="0" border="1">
        <tr>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
            <th>Samedi</th>
            <th>Dimanche</th>
        </tr>
        <tr>
            <td><input type="checkbox" name="day1"></td>
            <td><input type="checkbox" name="day2"></td>
            <td><input type="checkbox" name="day3"></td>
            <td><input type="checkbox" name="day4"></td>
            <td><input type="checkbox" name="day5"></td>
            <td><input type="checkbox" name="day6"></td>
            <td><input type="checkbox" name="day7"></td>
        </tr>
        <tr>
            <td colspan="3" class="Label"> <b>Toute La journée :</b><input type="checkbox" name="AllDay"></td>
            <td colspan="2"><b>de :</b><input type="time" class="DateInput" name="TimeBegin"></td>
            <td colspan="2"><b>à : </b><input type="time" class="DateInput" name="TimeEnd"></td>  
        </tr>
        <tr>
            <td colspan="3" class="Label"> <b>Toute L'année :</b><input type="checkbox" name="AllYear"></td>                     
            <td colspan="2"><b>du :</b><input type="date" class="DateInput" name="DateBegin"></td>
            <td colspan="2"><b>au :</b><input type="date" class="DateInput" name="DateEnd"></td>  
        </tr>
        <tr><td id="LabelDescription"><b>Description :</td><td colspan="6"> <textarea name="description"></textarea></b></td></tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="AddSchedule" value="Add">
            </td>
            <td id="UselessTd"></td>
            <td colspan="3">
            </td>
        </tr>
    </table>
</form>

