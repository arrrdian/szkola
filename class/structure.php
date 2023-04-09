<link rel="stylesheet" href="style/index.css">
<?php
require_once 'connection.php';
require_once 'queries.php';

class Structure {
    public function selectOption(array $row) {
        $query = $this->db_query(
            Queries::editPilkarz()    
        );
        
        while($row = (array) $query->fetch_assoc()) {
        echo <<<HTML
        nigga
        <option value="{$row['fk_kraj']}">{$row['kraj']}</option>
        HTML;
        }
    }

    public static function showform(array $row): void {
        $id = $row['id'];

        echo <<<HTML
        <ul>
            <a href="?action=delete&id=$id">Usuń</a>
            <a href="?action=update&id=$id">Edytuj</a>
        <li>Imie - {$row['imie']}</li> <!-- sprawdz to pozniej -->
        <li>Nazwisko - $row[nazwisko]</li> <!-- sprawdz to pozniej -->
        <li>Wzrost - {$row['wzrost']}</li>
        <li>Data urodzenia - {$row['data_urodzenia']}</li>
        <li>Wiodąca noga - {$row['wiodaca_noga']}</li>
        <li>Wartość rynkowa - {$row['wartosc_rynkowa']}</li>
        <li>Ilość strzelonych goli - {$row['ilosc_strzelonych_goli']}</li>
        <li>Kraj - {$row['kraj']}</li>
        
        <li>Numer na koszulce - {$row['numer_na_koszulce']}</li>
        <li>Pozycja - {$row['pozycja']}</li>
        </ul>
        HTML;
    }

    public static function editform(array $row, string $choice): void {
        $id = $row['id'];
        echo 
        <<<HTML
        <form action="index.php$choice">
            <table>
            <tr hidden>
                <td><label>Id</label></td>
                <td><input type="text" value="{$row['id']}"></td>
            </tr>
            <tr>
                <td><label>Imie</label></td>
                <td><input type="text" value="{$row['imie']}"></td>
            </tr>
            <tr>
                <td><label>Nazwisko</label></td>
                <td><input type="text" value="{$row['nazwisko']}"></td>
            </tr>
            <tr>
                <td><label>Wzrost</label></td>
                <td><input type="text" value="{$row['wzrost']}"></td>
            </tr>
            <tr>
                <td><label>Data urodzenia</label></td>
                <td><input type="text" value="{$row['data_urodzenia']}"></td>
            </tr>
            <tr>
                <td><label>Wiodąca noga</label></td>
                <td><input type="text" value="{$row['wiodaca_noga']}"></td>
            </tr>
            <tr>
                <td><label>Wartość rynkowa</label></td>
                <td><input type="text" value="{$row['wartosc_rynkowa']}"></td>
            </tr>
            <tr>
                <td><label>Ilość strzelonych goli</label></td>
                <td><input type="text" value="{$row['ilosc_strzelonych_goli']}"></td>
            </tr>
            <tr>
                <td><label>Kraj piłkarza</label></td>
                <td><select>
        
                </select></td>
            </tr>
            </table>
            </form>
        HTML;
        
        <<<HTML
        HTML;
    }
}
?>