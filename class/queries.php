<?php
require_once 'class/transmition.php';

class Queries {
    public static function show() {
        return <<<SQL
        SELECT
        pk_pilkarz as 'id', imie, nazwisko, wzrost, data_urodzenia, wiodaca_noga, wartosc_rynkowa, ilosc_strzelonych_goli, krajpilkarza.nazwa as 'kraj', numernakoszulce.numer as 'numer_na_koszulce', pozycja.nazwa as 'pozycja'
        FROM pilkarz
        join krajpilkarza on FK_kraj=PK_kraj
        join numernakoszulce on FK_numernakoszulce=PK_numernakoszulce
        join pozycja on FK_pozycja=PK_pozycja
        order by id
        SQL;

    }

    public static function disableKey() {
        return <<<SQL
        SET FOREIGN_KEY_CHECKS=0
        SQL;
    }

    public static function enableKey() {
        return <<<SQL
        SET FOREIGN_KEY_CHECKS=1
        SQL;
    }

    public static function deletePilkarz() {
        $id = Transmition::fetchGET();
        return <<<SQL
        DELETE FROM Pilkarz where pk_pilkarz = $id
        SQL;
    }

    public static function editPilkarz(string $id): string {
        return <<<SQL
        SELECT
        pk_pilkarz as 'id', imie, nazwisko, wzrost, data_urodzenia, wiodaca_noga, wartosc_rynkowa, ilosc_strzelonych_goli, fk_kraj, krajpilkarza.nazwa as 'kraj', numernakoszulce.numer as 'numer_na_koszulce', pozycja.nazwa as 'pozycja'
        FROM pilkarz
        join krajpilkarza on FK_kraj=PK_kraj
        join numernakoszulce on FK_numernakoszulce=PK_numernakoszulce
        join pozycja on FK_pozycja=PK_pozycja
        where `pk_pilkarz` = $id
        order by id
        SQL;
    }

    public static function select_Edytuj(string $id): string
    {
        return <<<SQL
        SELECT PK_pilkarz as 'id', imie, nazwisko, wzrost, data_urodzenia, wiodaca_noga, wartosc_rynkowa, ilosc_strzelonych_goli, krajpilkarza.nazwa as 'fk_kraj', numernakoszulce.numer as 'fk_numernakoszulce', pozycja.nazwa as 'fk_pozycja'
        FROM pilkarz
        join krajpilkarza on FK_kraj=PK_kraj
        join numernakoszulce on FK_numernakoszulce=PK_numernakoszulce
        join pozycja on FK_pozycja=PK_pozycja
        where `pk_pilkarz` = $id
        SQL;
    }
}

?>