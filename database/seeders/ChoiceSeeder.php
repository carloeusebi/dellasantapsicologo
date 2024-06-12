<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoiceSeeder extends Seeder
{
    public function run(): void
    {
        $choices = array(
            array(
                'id' => '1', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'FORTEMENTE NON D\'ACCORDO'
            ),
            array(
                'id' => '2', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'MODERATAMENTE NON D\'ACCORDO'
            ),
            array(
                'id' => '3', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'LEGGERMENTE NON D\'ACCORDO'
            ),
            array(
                'id' => '4', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'LEGGERMENTE D\'ACCORDO'
            ),
            array(
                'id' => '5', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'MODERATAMENTE D\'ACCORDO'
            ),
            array(
                'id' => '6', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'FORTEMENTE D\'ACCORDO'
            ),
            array(
                'id' => '7', 'questionable_id' => '2', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'QUASI MAI'
            ),
            array(
                'id' => '8', 'questionable_id' => '2', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'QUALCHE VOLTA'
            ),
            array(
                'id' => '9', 'questionable_id' => '2', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'SPESSO'
            ),
            array(
                'id' => '10', 'questionable_id' => '2', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'QUASI SEMPRE'
            ),
            array(
                'id' => '11', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'TOTALMENTE IN DISACCORDO'
            ),
            array(
                'id' => '12', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'MOLTO IN DISACCORDO'
            ),
            array(
                'id' => '13', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'ABBASTANZA IN DISACCORDO'
            ),
            array(
                'id' => '14', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'ABBASTANZA D\'ACCORDO'
            ),
            array(
                'id' => '15', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'MOLTO D\'ACCORDO'
            ),
            array(
                'id' => '16', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '6', 'text' => 'TOTALMENTE D\'ACCORDO'
            ),
            array(
                'id' => '17', 'questionable_id' => '4', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Per niente'
            ),
            array(
                'id' => '18', 'questionable_id' => '4', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Un po\', non mi ha infastidito molto'
            ),
            array(
                'id' => '19', 'questionable_id' => '4', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Abbastanza, era spiacevole ma potevo sopportarlo'
            ),
            array(
                'id' => '20', 'questionable_id' => '4', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Molto, potevo appena sopportarlo'
            ),
            array(
                'id' => '21', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'MAI (0-10% delle volte)'
            ),
            array(
                'id' => '22', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'QUALCHE VOLTA ( 11-35% delle volte)'
            ),
            array(
                'id' => '23', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'CIRCA LA META\' DELLE VOLTE(36-65% delle volte)'
            ),
            array(
                'id' => '24', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'LA MAGGIOR PARTE DELLE VOLTE (66-90% delle volte)'
            ),
            array(
                'id' => '25', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'SEMPRE (91-100% delle volte)'
            ),
            array(
                'id' => '26', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Mai'
            ),
            array(
                'id' => '27', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Raramente'
            ),
            array(
                'id' => '28', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Talvolta'
            ),
            array(
                'id' => '29', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Spesso'
            ),
            array(
                'id' => '30', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Di solito'
            ),
            array(
                'id' => '31', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Sempre'
            ),
            array(
                'id' => '32', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Non mi riconosco mai'
            ),
            array(
                'id' => '33', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Mi riconosco raramente'
            ),
            array(
                'id' => '34', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Mi riconosco qualche volta'
            ),
            array(
                'id' => '35', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Mi riconosco molto spesso'
            ),
            array(
                'id' => '36', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Mi riconosco completamente'
            ),
            array(
                'id' => '37', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Per niente'
            ),
            array(
                'id' => '38', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Molto poco'
            ),
            array(
                'id' => '39', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Poco'
            ),
            array(
                'id' => '40', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Un po\' e un po\''
            ),
            array(
                'id' => '41', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Abbastanza'
            ),
            array(
                'id' => '42', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '6', 'text' => 'Molto'
            ),
            array(
                'id' => '43', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '7', 'text' => 'Perfettamente'
            ),
            array(
                'id' => '44', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Mai'
            ),
            array(
                'id' => '45', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Raramente'
            ),
            array(
                'id' => '46', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Qualche volta'
            ),
            array(
                'id' => '47', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Spesso'
            ),
            array(
                'id' => '48', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Sempre'
            ),
            array(
                'id' => '49', 'questionable_id' => '10', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Non sono d\'accordo'
            ),
            array(
                'id' => '50', 'questionable_id' => '10', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Sono d\'accordo in parte'
            ),
            array(
                'id' => '51', 'questionable_id' => '10', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Sono abbastanza d\'accordo'
            ),
            array(
                'id' => '52', 'questionable_id' => '10', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Sono completamente d\'accordo'
            ),
            array(
                'id' => '53', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Mai'
            ),
            array(
                'id' => '54', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Raramente'
            ),
            array(
                'id' => '55', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'A volte'
            ),
            array(
                'id' => '56', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Spesso'
            ),
            array(
                'id' => '57', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Quasi sempre'
            ),
            array(
                'id' => '58', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Per niente'
            ),
            array(
                'id' => '59', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Poco'
            ),
            array(
                'id' => '60', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Abbastanza'
            ),
            array(
                'id' => '61', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Molto'
            ),
            array(
                'id' => '62', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Moltissimo'
            ),
            array(
                'id' => '63', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Per niente tipica'
            ),
            array(
                'id' => '64', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Poco tipica'
            ),
            array(
                'id' => '65', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Abbastanza tipica'
            ),
            array(
                'id' => '66', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Discretamente tipica'
            ),
            array(
                'id' => '67', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Molto tipica'
            ),
            array(
                'id' => '68', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Mai'
            ),
            array(
                'id' => '69', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Raramente'
            ),
            array(
                'id' => '70', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Qualche volta'
            ),
            array(
                'id' => '71', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Spesso'
            ),
            array(
                'id' => '72', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Sempre'
            ),
            array(
                'id' => '73', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Totale disaccordo'
            ),
            array(
                'id' => '74', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Molto disaccordo'
            ),
            array(
                'id' => '75', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Poco disaccordo'
            ),
            array(
                'id' => '76', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Neutrale'
            ),
            array(
                'id' => '77', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Poco accordo'
            ),
            array(
                'id' => '78', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '6', 'text' => 'Molto accordo'
            ),
            array(
                'id' => '79', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '7', 'text' => 'Totale accordo'
            ),
            array(
                'id' => '80', 'questionable_id' => '16', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Quasi mai'
            ),
            array(
                'id' => '81', 'questionable_id' => '16', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Qualche volta'
            ),
            array(
                'id' => '82', 'questionable_id' => '16', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Spesso'
            ),
            array(
                'id' => '83', 'questionable_id' => '16', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Quasi sempre'
            ),
            array(
                'id' => '84', 'questionable_id' => '23', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Per niente'
            ),
            array(
                'id' => '85', 'questionable_id' => '23', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Un po\', non mi ha infastidito molto'
            ),
            array(
                'id' => '86', 'questionable_id' => '23', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Abbastanza, era spiacevole ma potevo sopportarlo'
            ),
            array(
                'id' => '87', 'questionable_id' => '23', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Molto, potevo appena sopportarlo'
            ),
            array(
                'id' => '88', 'questionable_id' => '420', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento triste'
            ),
            array(
                'id' => '89', 'questionable_id' => '420', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi sento triste per la maggior parte del tempo'
            ),
            array(
                'id' => '90', 'questionable_id' => '420', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi sento sempre triste'
            ),
            array(
                'id' => '91', 'questionable_id' => '420', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi sento così triste o infelice da non poterlo sopportare'
            ),
            array(
                'id' => '92', 'questionable_id' => '421', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento scoraggiato/a riguardo al mio futuro'
            ),
            array(
                'id' => '93', 'questionable_id' => '421', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi sento più scoraggiato/a riguardo al mio futuro rispetto al solito'
            ),
            array(
                'id' => '94', 'questionable_id' => '421', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Non mi aspetto nulla di buono per me'
            ),
            array(
                'id' => '95', 'questionable_id' => '421', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sento che il futuro è senza speranza e che continuerà a peggiorare'
            ),
            array(
                'id' => '96', 'questionable_id' => '422', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento un/a fallito/a'
            ),
            array(
                'id' => '97', 'questionable_id' => '422', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Ho fallito più di quanto avrei dovuto'
            ),
            array(
                'id' => '98', 'questionable_id' => '422', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Se guardo indietro alla mia vita non vedo altro che una serie di fallimenti'
            ),
            array(
                'id' => '99', 'questionable_id' => '422', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi sento un completo fallimento come persona'
            ),
            array(
                'id' => '100', 'questionable_id' => '423', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Traggo soddisfazione o piacere dalle cose come al solito'
            ),
            array(
                'id' => '101', 'questionable_id' => '423', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Traggo meno soddisfazione o piacere dalle cose rispetto al passato'
            ),
            array(
                'id' => '102', 'questionable_id' => '423', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Non traggo soddisfazione o piacere alcuno dalle cose'
            ),
            array(
                'id' => '103', 'questionable_id' => '423', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sono insoddisfatto/a o annoiato/a da tutto'
            ),
            array(
                'id' => '104', 'questionable_id' => '424', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento particolarmente in colpa'
            ),
            array(
                'id' => '105', 'questionable_id' => '424', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi sento in colpa per molte cose che ho fatto o che avrei dovuto fare'
            ),
            array(
                'id' => '106', 'questionable_id' => '424', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi sento molto spesso in colpa'
            ),
            array(
                'id' => '107', 'questionable_id' => '424', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi sento sempre in colpa'
            ),
            array(
                'id' => '108', 'questionable_id' => '425', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non sento come se stessi subendo una punizione'
            ),
            array(
                'id' => '109', 'questionable_id' => '425', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Sento che potrei essere punito'
            ),
            array(
                'id' => '110', 'questionable_id' => '425', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi aspetto di ricevere una punizione'
            ),
            array(
                'id' => '111', 'questionable_id' => '425', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sento come se stessi subendo una punizione'
            ),
            array(
                'id' => '112', 'questionable_id' => '426', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Considero me stesso come ho sempre fatto'
            ),
            array(
                'id' => '113', 'questionable_id' => '426', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Credo meno in me stesso'
            ),
            array(
                'id' => '114', 'questionable_id' => '426', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Sono deluso di me stesso'
            ),
            array(
                'id' => '115', 'questionable_id' => '426', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi detesto'
            ),
            array(
                'id' => '116', 'questionable_id' => '427', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non sento di essere peggiore di qualsiasi altra persona'
            ),
            array(
                'id' => '117', 'questionable_id' => '427', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi critico più spesso del solito'
            ),
            array(
                'id' => '118', 'questionable_id' => '427', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi critico per tutte le mie colpe'
            ),
            array(
                'id' => '119', 'questionable_id' => '427', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi rimprovero per qualunque cosa negativa mi accada'
            ),
            array(
                'id' => '120', 'questionable_id' => '428', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non ho pensieri suicidi'
            ),
            array(
                'id' => '121', 'questionable_id' => '428', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Ho pensieri suicidi ma non li realizzerei'
            ),
            array(
                'id' => '122', 'questionable_id' => '428', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Sento che starei meglio se morissi'
            ),
            array(
                'id' => '123', 'questionable_id' => '428', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Se mi si presentasse l\'occasione, non esiterei ad uccidermi'
            ),
            array(
                'id' => '124', 'questionable_id' => '429', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non piango più del solito'
            ),
            array(
                'id' => '125', 'questionable_id' => '429', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Piango più di quanto facessi prima'
            ),
            array(
                'id' => '126', 'questionable_id' => '429', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Piango per ogni minima cosa'
            ),
            array(
                'id' => '127', 'questionable_id' => '429', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Ho spesso voglia di piangere ma non ci riesco'
            ),
            array(
                'id' => '128', 'questionable_id' => '430', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento più agitato o teso del solito'
            ),
            array(
                'id' => '129', 'questionable_id' => '430', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi sento più agitato o teso del solito'
            ),
            array(
                'id' => '130', 'questionable_id' => '430', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Sono così nervoso o agitato al punto che mi è difficile rimanere fermo'
            ),
            array(
                'id' => '131', 'questionable_id' => '430', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sono così nervoso o agitato che devo continuare a muovermi o fare qualcosa'
            ),
            array(
                'id' => '132', 'questionable_id' => '431', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non ho perso interesse verso le altre persone o verso le attività'
            ),
            array(
                'id' => '133', 'questionable_id' => '431', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Sono meno interessato agli altri o alle cose rispetto a prima'
            ),
            array(
                'id' => '134', 'questionable_id' => '431', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ho perso la maggior parte dell\'interesse verso le altre persone o cose'
            ),
            array(
                'id' => '135', 'questionable_id' => '431', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi risulta difficile interessarmi a qualsiasi cosa'
            ),
            array(
                'id' => '136', 'questionable_id' => '432', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Prendo decisioni quasi come al solito'
            ),
            array(
                'id' => '137', 'questionable_id' => '432', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Trovo più difficoltà del solito nel prendere decisioni'
            ),
            array(
                'id' => '138', 'questionable_id' => '432', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ho molte più difficoltà nel prendere decisioni rispetto al solito'
            ),
            array(
                'id' => '139', 'questionable_id' => '432', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Non riesco a prendere nessuna decisione'
            ),
            array(
                'id' => '140', 'questionable_id' => '433', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento di avere un aspetto peggiore del solito'
            ),
            array(
                'id' => '141', 'questionable_id' => '433', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Temo di avere un aspetto invecchiato o non attraente'
            ),
            array(
                'id' => '142', 'questionable_id' => '433', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2',
                'text' => 'Temo che ci siano stati cambiamenti definitivi nel mio aspetto che mi rendono non attraente'
            ),
            array(
                'id' => '143', 'questionable_id' => '433', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Ho la sensazione di essere brutto/a'
            ),
            array(
                'id' => '144', 'questionable_id' => '434', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Riesco a lavorare quasi altrettanto bene che nel passato'
            ),
            array(
                'id' => '145', 'questionable_id' => '434', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Devo fare uno sforzo in più per cominciare a fare qualcosa'
            ),
            array(
                'id' => '146', 'questionable_id' => '434', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi devo scuotere con forza per fare qualsiasi cosa'
            ),
            array(
                'id' => '147', 'questionable_id' => '434', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Non riesco a lavorare per niente'
            ),
            array(
                'id' => '148', 'questionable_id' => '435', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Dormo bene come al solito'
            ),
            array(
                'id' => '149', 'questionable_id' => '435', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Non riesco a dormire bene come in passato'
            ),
            array(
                'id' => '150', 'questionable_id' => '435', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2',
                'text' => 'Rispetto al passato, mi sveglio 1-2 ore prima e non riesco a riaddormentarmi'
            ),
            array(
                'id' => '151', 'questionable_id' => '435', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3',
                'text' => 'Rispetto al passato, mi sveglio parecchie ore prima e non riesco più ad addormentarmi'
            ),
            array(
                'id' => '152', 'questionable_id' => '436', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi stanco più del solito'
            ),
            array(
                'id' => '153', 'questionable_id' => '436', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi stanco più facilmente di un tempo'
            ),
            array(
                'id' => '154', 'questionable_id' => '436', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi stanco facendo qualsiasi cosa'
            ),
            array(
                'id' => '155', 'questionable_id' => '436', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sono troppo stanco/a per fare alcunché'
            ),
            array(
                'id' => '156', 'questionable_id' => '437', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Il mio appetito non è peggiorato'
            ),
            array(
                'id' => '157', 'questionable_id' => '437', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Il mio appetito non è più così buono come una volta'
            ),
            array(
                'id' => '158', 'questionable_id' => '437', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ora ho molto meno appetito'
            ),
            array(
                'id' => '159', 'questionable_id' => '437', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Non ho più appetito'
            ),
            array(
                'id' => '160', 'questionable_id' => '438', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non ho perso molto peso ultimamente'
            ),
            array(
                'id' => '161', 'questionable_id' => '438', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Ho perso più di 2kg'
            ),
            array(
                'id' => '162', 'questionable_id' => '438', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ho perso più di 4kg'
            ),
            array(
                'id' => '163', 'questionable_id' => '438', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Ho perso più di 6kg'
            ),
            array(
                'id' => '164', 'questionable_id' => '439', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non sono più preoccupato della mia salute rispetto al solito'
            ),
            array(
                'id' => '165', 'questionable_id' => '439', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1',
                'text' => 'Sono preoccupato/a per problemi fisici come malori, dolori, problemi di stomaco o costipazioni'
            ),
            array(
                'id' => '166', 'questionable_id' => '439', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2',
                'text' => 'Mi preoccupo totalmente di come mi sento che mi è difficile pensare ad altre cose'
            ),
            array(
                'id' => '167', 'questionable_id' => '439', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3',
                'text' => 'Sono talmente preoccupato/a per problemi fisici che non riesco a pensare ad altro'
            ),
            array(
                'id' => '168', 'questionable_id' => '440', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non ho notato cambiamenti nel mio interesse per il sesso'
            ),
            array(
                'id' => '169', 'questionable_id' => '440', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Ho meno interesse nel sesso rispetto a prima'
            ),
            array(
                'id' => '170', 'questionable_id' => '440', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ora sono molto meno interessato al sesso'
            ),
            array(
                'id' => '171', 'questionable_id' => '440', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Ho perso tutto l\'interesse nel sesso'
            ),
            array(
                'id' => '172', 'questionable_id' => '441', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '173', 'questionable_id' => '441', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '174', 'questionable_id' => '442', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '175', 'questionable_id' => '442', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '176', 'questionable_id' => '443', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '177', 'questionable_id' => '443', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '178', 'questionable_id' => '444', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '179', 'questionable_id' => '444', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '180', 'questionable_id' => '445', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '181', 'questionable_id' => '445', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '182', 'questionable_id' => '446', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '183', 'questionable_id' => '446', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '184', 'questionable_id' => '447', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '185', 'questionable_id' => '447', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '186', 'questionable_id' => '448', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '187', 'questionable_id' => '448', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '188', 'questionable_id' => '449', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '189', 'questionable_id' => '449', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '190', 'questionable_id' => '450', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '191', 'questionable_id' => '450', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '192', 'questionable_id' => '451', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '193', 'questionable_id' => '451', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '194', 'questionable_id' => '452', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '195', 'questionable_id' => '452', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '196', 'questionable_id' => '453', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Per niente'
            ),
            array(
                'id' => '197', 'questionable_id' => '453', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Poco'
            ),
            array(
                'id' => '198', 'questionable_id' => '453', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Abbastanza'
            ),
            array(
                'id' => '199', 'questionable_id' => '453', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Molto'
            ),
            array(
                'id' => '200', 'questionable_id' => '455', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '201', 'questionable_id' => '455', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '202', 'questionable_id' => '456', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '203', 'questionable_id' => '456', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '204', 'questionable_id' => '457', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '205', 'questionable_id' => '457', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '206', 'questionable_id' => '458', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '207', 'questionable_id' => '458', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '208', 'questionable_id' => '459', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '209', 'questionable_id' => '459', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '210', 'questionable_id' => '460', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '211', 'questionable_id' => '460', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '212', 'questionable_id' => '461', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '213', 'questionable_id' => '461', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '214', 'questionable_id' => '462', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '215', 'questionable_id' => '462', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '216', 'questionable_id' => '463', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '217', 'questionable_id' => '463', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '218', 'questionable_id' => '464', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '219', 'questionable_id' => '464', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '220', 'questionable_id' => '465', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '221', 'questionable_id' => '465', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '222', 'questionable_id' => '466', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì'
            ),
            array(
                'id' => '223', 'questionable_id' => '466', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No'
            ),
            array(
                'id' => '224', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Per niente'
            ),
            array(
                'id' => '225', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Poco'
            ),
            array(
                'id' => '226', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Abbastanza'
            ),
            array(
                'id' => '227', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Molto'
            ),
            array(
                'id' => '228', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '4', 'text' => 'Completamente soddisfatta/o'
            ),
            array(
                'id' => '229', 'questionable_id' => '468', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Termina'
            ),
            array(
                'id' => '230', 'questionable_id' => '469', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '231', 'questionable_id' => '470', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '232', 'questionable_id' => '471', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '233', 'questionable_id' => '472', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '234', 'questionable_id' => '474', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '235', 'questionable_id' => '475', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '236', 'questionable_id' => '476', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '237', 'questionable_id' => '477', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '238', 'questionable_id' => '478', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '239', 'questionable_id' => '479', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '240', 'questionable_id' => '480', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '241', 'questionable_id' => '481', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '242', 'questionable_id' => '482', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '243', 'questionable_id' => '483', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '244', 'questionable_id' => '484', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '245', 'questionable_id' => '485', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '246', 'questionable_id' => '486', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '247', 'questionable_id' => '487', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '248', 'questionable_id' => '488', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '249', 'questionable_id' => '489', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '250', 'questionable_id' => '490', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '251', 'questionable_id' => '491', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '252', 'questionable_id' => '492', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '253', 'questionable_id' => '493', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '254', 'questionable_id' => '494', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '255', 'questionable_id' => '495', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '256', 'questionable_id' => '496', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '257', 'questionable_id' => '497', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '258', 'questionable_id' => '498', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '259', 'questionable_id' => '499', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '260', 'questionable_id' => '500', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '261', 'questionable_id' => '501', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '262', 'questionable_id' => '502', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '263', 'questionable_id' => '503', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '264', 'questionable_id' => '504', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '265', 'questionable_id' => '505', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Termina'
            ),
            array(
                'id' => '266', 'questionable_id' => '507', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '267', 'questionable_id' => '508', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '268', 'questionable_id' => '509', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '269', 'questionable_id' => '511', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '270', 'questionable_id' => '512', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '271', 'questionable_id' => '513', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '272', 'questionable_id' => '514', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '273', 'questionable_id' => '515', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '274', 'questionable_id' => '516', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '275', 'questionable_id' => '517', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '276', 'questionable_id' => '518', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '277', 'questionable_id' => '519', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '278', 'questionable_id' => '520', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '279', 'questionable_id' => '521', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '280', 'questionable_id' => '522', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '281', 'questionable_id' => '523', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '282', 'questionable_id' => '524', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '283', 'questionable_id' => '525', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '284', 'questionable_id' => '526', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '285', 'questionable_id' => '527', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '286', 'questionable_id' => '528', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '287', 'questionable_id' => '529', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '288', 'questionable_id' => '530', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '289', 'questionable_id' => '531', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '290', 'questionable_id' => '532', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '291', 'questionable_id' => '533', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '292', 'questionable_id' => '534', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '293', 'questionable_id' => '535', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '294', 'questionable_id' => '536', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '295', 'questionable_id' => '537', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '296', 'questionable_id' => '538', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '297', 'questionable_id' => '539', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '298', 'questionable_id' => '540', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '299', 'questionable_id' => '541', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '300', 'questionable_id' => '542', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Termina'
            ),
            array(
                'id' => '301', 'questionable_id' => '543', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '302', 'questionable_id' => '544', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '303', 'questionable_id' => '545', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '304', 'questionable_id' => '546', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '305', 'questionable_id' => '547', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '306', 'questionable_id' => '548', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '307', 'questionable_id' => '549', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '308', 'questionable_id' => '550', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '309', 'questionable_id' => '551', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '310', 'questionable_id' => '552', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '311', 'questionable_id' => '553', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '312', 'questionable_id' => '554', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '313', 'questionable_id' => '555', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '314', 'questionable_id' => '556', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '315', 'questionable_id' => '557', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '316', 'questionable_id' => '558', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '317', 'questionable_id' => '559', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '318', 'questionable_id' => '560', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '319', 'questionable_id' => '561', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '320', 'questionable_id' => '562', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '321', 'questionable_id' => '563', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '322', 'questionable_id' => '564', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '323', 'questionable_id' => '565', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '324', 'questionable_id' => '566', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '325', 'questionable_id' => '567', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '326', 'questionable_id' => '568', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '327', 'questionable_id' => '569', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '328', 'questionable_id' => '570', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '329', 'questionable_id' => '571', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '330', 'questionable_id' => '572', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '331', 'questionable_id' => '573', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '332', 'questionable_id' => '574', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '333', 'questionable_id' => '575', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '334', 'questionable_id' => '576', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '335', 'questionable_id' => '577', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '336', 'questionable_id' => '578', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti'
            ),
            array(
                'id' => '337', 'questionable_id' => '579', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Termina'
            ),
            array(
                'id' => '426', 'questionable_id' => '24', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'No'
            ),
            array(
                'id' => '427', 'questionable_id' => '24', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Sì'
            ),
            array(
                'id' => '428', 'questionable_id' => '25', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Avanti'
            )
        );

        foreach ($choices as $choice) {
            DB::table('choices')->insert($choice);
        }
    }
}
