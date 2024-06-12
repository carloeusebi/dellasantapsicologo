<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CutoffSeeder extends Seeder
{
    public function run(): void
    {
        $cutoffs = array(
            array(
                'id' => '1', 'variable_id' => '1', 'name' => 'Controllo Emotivo', 'from' => '8', 'to' => '0',
                'type' => 'lesser_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '2', 'variable_id' => '2', 'name' => 'Controllo della minaccia', 'from' => '13', 'to' => '0',
                'type' => 'lesser_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '3', 'variable_id' => '3', 'name' => 'Controllo dei livelli di stress', 'from' => '9',
                'to' => '0', 'type' => 'lesser_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '4', 'variable_id' => '4', 'name' => 'Ruminazione eccessiva con contenuti rabbiosi',
                'from' => '24', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '5', 'variable_id' => '5', 'name' => 'Bassa fiducia', 'from' => '30', 'to' => '0',
                'type' => 'lesser_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '6', 'variable_id' => '5', 'name' => 'Fiducia elevata', 'from' => '38', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '7', 'variable_id' => '6', 'name' => 'Assenza di disagio nelle relazioni intime',
                'from' => '23', 'to' => '0', 'type' => 'lesser_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '8', 'variable_id' => '6', 'name' => 'Disagio nelle relazioni', 'from' => '46', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '9', 'variable_id' => '7', 'name' => 'Relazioni considerate come importanti', 'from' => '9',
                'to' => '0', 'type' => 'lesser_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '10', 'variable_id' => '7', 'name' => 'Scarsa importanza alle relazioni', 'from' => '20',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '11', 'variable_id' => '8', 'name' => 'Nessuna preoccupazione per le relazioni intime',
                'from' => '21', 'to' => '0', 'type' => 'lesser_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '12', 'variable_id' => '8', 'name' => 'Preoccupazioni per le relazioni intime', 'from' => '32',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '13', 'variable_id' => '9', 'name' => 'Nessun bisogno di approvazione', 'from' => '11',
                'to' => '0', 'type' => 'lesser_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '14', 'variable_id' => '9', 'name' => 'Bisogno di approvazione', 'from' => '36', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:44', 'updated_at' => '2024-06-10 21:33:44'
            ),
            array(
                'id' => '19', 'variable_id' => '11', 'name' => 'Assenza difficoltà regolazione emotiva', 'from' => '0',
                'to' => '90', 'type' => 'range', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:45', 'updated_at' => '2024-06-10 21:33:45'
            ),
            array(
                'id' => '20', 'variable_id' => '11', 'name' => 'Moderata difficoltà di regolazione emotiva',
                'from' => '90', 'to' => '105', 'type' => 'range', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:45', 'updated_at' => '2024-06-10 21:33:45'
            ),
            array(
                'id' => '21', 'variable_id' => '11', 'name' => 'Forte difficoltà nella regolazione emotiva',
                'from' => '105', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:45', 'updated_at' => '2024-06-10 21:33:45'
            ),
            array(
                'id' => '22', 'variable_id' => '12', 'name' => 'Tendenza a dimagrire', 'from' => '5', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => '11', 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:45', 'updated_at' => '2024-06-10 21:33:45'
            ),
            array(
                'id' => '23', 'variable_id' => '13', 'name' => 'Bulimia', 'from' => '3', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => '8', 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:45', 'updated_at' => '2024-06-10 21:33:45'
            ),
            array(
                'id' => '24', 'variable_id' => '14', 'name' => 'Insoddisfazione corporea', 'from' => '5', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => '15', 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:45', 'updated_at' => '2024-06-10 21:33:45'
            ),
            array(
                'id' => '25', 'variable_id' => '15', 'name' => 'Lieve tendenza a non tollerare l\'incertezza',
                'from' => '65', 'to' => '80', 'type' => 'range', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:45', 'updated_at' => '2024-06-10 21:33:45'
            ),
            array(
                'id' => '26', 'variable_id' => '15', 'name' => 'Moderata tendenza a non tollerare l\'incertezza',
                'from' => '81', 'to' => '108', 'type' => 'range', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:45', 'updated_at' => '2024-06-10 21:33:45'
            ),
            array(
                'id' => '27', 'variable_id' => '15', 'name' => 'Forte tendenza a non tollerare l\'incertezza',
                'from' => '108', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:45', 'updated_at' => '2024-06-10 21:33:45'
            ),
            array(
                'id' => '28', 'variable_id' => '16', 'name' => 'Criticismo verso sé stessi', 'from' => '42',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '29', 'variable_id' => '17', 'name' => 'Criticismo verso sé stessi in relazione agli altri',
                'from' => '41', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '30', 'variable_id' => '18', 'name' => 'Perfezionismo negli obiettivi personali',
                'from' => '28', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '31', 'variable_id' => '19', 'name' => 'Timore di poter compiere errori', 'from' => '22',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '32', 'variable_id' => '20', 'name' => 'Critiche subite dai genitori', 'from' => '13',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '33', 'variable_id' => '21', 'name' => 'Aspettative da parte dei genitori avvertite su di sè',
                'from' => '18', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '34', 'variable_id' => '22', 'name' => 'Presenza di dubbi sulle proprie azioni', 'from' => '11',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '35', 'variable_id' => '23', 'name' => 'Eccessiva attenzione verso l\'organizzazione',
                'from' => '27', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '36', 'variable_id' => '24', 'name' => 'Credenze sui vantaggi del pensiero rimuginativo',
                'from' => '12', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '37', 'variable_id' => '25',
                'name' => 'Credenze di minaccia e incontrollabilità del pensiero rimuginativo', 'from' => '13',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '38', 'variable_id' => '26',
                'name' => 'Bassa fiducia nella propria capacità di gestione dei pensieri', 'from' => '13', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '39', 'variable_id' => '27', 'name' => 'Bisogno di controllare i pensieri', 'from' => '10',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '40', 'variable_id' => '28', 'name' => 'Tendenza a monitorare i propri pensieri',
                'from' => '15', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:46', 'updated_at' => '2024-06-10 21:33:46'
            ),
            array(
                'id' => '41', 'variable_id' => '29', 'name' => 'Sopra soglia', 'from' => '61', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:47', 'updated_at' => '2024-06-10 21:33:47'
            ),
            array(
                'id' => '42', 'variable_id' => '30', 'name' => 'Valore clinico', 'from' => '64', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:47', 'updated_at' => '2024-06-10 21:33:47'
            ),
            array(
                'id' => '43', 'variable_id' => '31', 'name' => 'Sintomi che influiscono sul funzionamento globale',
                'from' => '36', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:47', 'updated_at' => '2024-06-10 21:33:47'
            ),
            array(
                'id' => '44', 'variable_id' => '32',
                'name' => 'Difficoltà nelle relazioni interpersonali che compromettono il funzionamento globale',
                'from' => '15', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:47', 'updated_at' => '2024-06-10 21:33:47'
            ),
            array(
                'id' => '45', 'variable_id' => '33',
                'name' => 'Compromissione della definizione di sé nel funzionamento sociale', 'from' => '12',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '46', 'variable_id' => '34', 'name' => 'Assenza di sintomi Ossessivo Compulsivi', 'from' => '0',
                'to' => '38', 'type' => 'range', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '47', 'variable_id' => '34', 'name' => 'Presenza di sintomi Ossessivo Compulsivi',
                'from' => '39', 'to' => '54', 'type' => 'range', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '48', 'variable_id' => '34', 'name' => 'Sintomi Ossessivo Compulsivi moderati', 'from' => '55',
                'to' => '72', 'type' => 'range', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '49', 'variable_id' => '34', 'name' => 'Sintomi Ossessivo Compulsivi gravi', 'from' => '72',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '50', 'variable_id' => '35', 'name' => 'Assenza di tendenza al pensiero rimuginativo',
                'from' => '0', 'to' => '55', 'type' => 'range', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '51', 'variable_id' => '35', 'name' => 'Moderata tendenza al rimuginio', 'from' => '56',
                'to' => '66', 'type' => 'range', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '52', 'variable_id' => '35', 'name' => 'Forte tendenza al rimuginio', 'from' => '66',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '53', 'variable_id' => '36', 'name' => 'Valore patologico di stress percepito', 'from' => '22',
                'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '54', 'variable_id' => '37', 'name' => 'Assenza di tendenza alla responsabilità patologica',
                'from' => '0', 'to' => '99', 'type' => 'range', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '55', 'variable_id' => '37', 'name' => 'Moderata tendenza alla responsabilità patologica',
                'from' => '100', 'to' => '120', 'type' => 'range', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '56', 'variable_id' => '37', 'name' => 'Forte tendenza alla responsabilità patologica',
                'from' => '120', 'to' => '0', 'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:48', 'updated_at' => '2024-06-10 21:33:48'
            ),
            array(
                'id' => '57', 'variable_id' => '38', 'name' => 'Ruminazione eccessiva', 'from' => '52', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '58', 'variable_id' => '39', 'name' => 'Range di normalità', 'from' => '10', 'to' => '0',
                'type' => 'lesser_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '59', 'variable_id' => '39', 'name' => 'Lievi sintomi depressivi', 'from' => '11', 'to' => '16',
                'type' => 'range', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '60', 'variable_id' => '39', 'name' => 'Sintomi depressivi clinicamente non invalidanti',
                'from' => '17', 'to' => '20', 'type' => 'range', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '61', 'variable_id' => '39', 'name' => 'Depressione moderata', 'from' => '21', 'to' => '30',
                'type' => 'range', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '62', 'variable_id' => '39', 'name' => 'Depressione severa', 'from' => '31', 'to' => '40',
                'type' => 'range', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '63', 'variable_id' => '39', 'name' => 'Depressione estrema', 'from' => '41', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '64', 'variable_id' => '40', 'name' => 'Sintomatologia ansiosa assente/sottosoglia',
                'from' => '0', 'to' => '7', 'type' => 'range', 'fem_from' => null, 'fem_to' => null,
                'deleted_at' => null, 'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '65', 'variable_id' => '40', 'name' => 'Ansia Lieve', 'from' => '8', 'to' => '15',
                'type' => 'range', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '66', 'variable_id' => '40', 'name' => 'Ansia Moderata', 'from' => '16', 'to' => '25',
                'type' => 'range', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            ),
            array(
                'id' => '67', 'variable_id' => '40', 'name' => 'Ansia Grave', 'from' => '25', 'to' => '0',
                'type' => 'greater_than', 'fem_from' => null, 'fem_to' => null, 'deleted_at' => null,
                'created_at' => '2024-06-10 21:33:49', 'updated_at' => '2024-06-10 21:33:49'
            )
        );


        foreach ($cutoffs as $cutoff) {
            DB::table('cutoffs')->insert($cutoff);
        }
    }
}
