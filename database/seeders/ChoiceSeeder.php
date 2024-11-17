<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoiceSeeder extends Seeder
{
    public function run(): void
    {
        $choices = [
            [
                'id' => '1', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'FORTEMENTE NON D\'ACCORDO',
            ],
            [
                'id' => '2', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'MODERATAMENTE NON D\'ACCORDO',
            ],
            [
                'id' => '3', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'LEGGERMENTE NON D\'ACCORDO',
            ],
            [
                'id' => '4', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'LEGGERMENTE D\'ACCORDO',
            ],
            [
                'id' => '5', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'MODERATAMENTE D\'ACCORDO',
            ],
            [
                'id' => '6', 'questionable_id' => '1', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'FORTEMENTE D\'ACCORDO',
            ],
            [
                'id' => '7', 'questionable_id' => '2', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'QUASI MAI',
            ],
            [
                'id' => '8', 'questionable_id' => '2', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'QUALCHE VOLTA',
            ],
            [
                'id' => '9', 'questionable_id' => '2', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'SPESSO',
            ],
            [
                'id' => '10', 'questionable_id' => '2', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'QUASI SEMPRE',
            ],
            [
                'id' => '11', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'TOTALMENTE IN DISACCORDO',
            ],
            [
                'id' => '12', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'MOLTO IN DISACCORDO',
            ],
            [
                'id' => '13', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'ABBASTANZA IN DISACCORDO',
            ],
            [
                'id' => '14', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'ABBASTANZA D\'ACCORDO',
            ],
            [
                'id' => '15', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'MOLTO D\'ACCORDO',
            ],
            [
                'id' => '16', 'questionable_id' => '3', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '6', 'text' => 'TOTALMENTE D\'ACCORDO',
            ],
            [
                'id' => '17', 'questionable_id' => '4', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Per niente',
            ],
            [
                'id' => '18', 'questionable_id' => '4', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Un po\', non mi ha infastidito molto',
            ],
            [
                'id' => '19', 'questionable_id' => '4', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Abbastanza, era spiacevole ma potevo sopportarlo',
            ],
            [
                'id' => '20', 'questionable_id' => '4', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Molto, potevo appena sopportarlo',
            ],
            [
                'id' => '21', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'MAI (0-10% delle volte)',
            ],
            [
                'id' => '22', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'QUALCHE VOLTA ( 11-35% delle volte)',
            ],
            [
                'id' => '23', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'CIRCA LA META\' DELLE VOLTE(36-65% delle volte)',
            ],
            [
                'id' => '24', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'LA MAGGIOR PARTE DELLE VOLTE (66-90% delle volte)',
            ],
            [
                'id' => '25', 'questionable_id' => '5', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'SEMPRE (91-100% delle volte)',
            ],
            [
                'id' => '26', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Mai',
            ],
            [
                'id' => '27', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Raramente',
            ],
            [
                'id' => '28', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Talvolta',
            ],
            [
                'id' => '29', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Spesso',
            ],
            [
                'id' => '30', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Di solito',
            ],
            [
                'id' => '31', 'questionable_id' => '6', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Sempre',
            ],
            [
                'id' => '32', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Non mi riconosco mai',
            ],
            [
                'id' => '33', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Mi riconosco raramente',
            ],
            [
                'id' => '34', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Mi riconosco qualche volta',
            ],
            [
                'id' => '35', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Mi riconosco molto spesso',
            ],
            [
                'id' => '36', 'questionable_id' => '7', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Mi riconosco completamente',
            ],
            [
                'id' => '37', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Per niente',
            ],
            [
                'id' => '38', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Molto poco',
            ],
            [
                'id' => '39', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Poco',
            ],
            [
                'id' => '40', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Un po\' e un po\'',
            ],
            [
                'id' => '41', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Abbastanza',
            ],
            [
                'id' => '42', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '6', 'text' => 'Molto',
            ],
            [
                'id' => '43', 'questionable_id' => '8', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '7', 'text' => 'Perfettamente',
            ],
            [
                'id' => '44', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Mai',
            ],
            [
                'id' => '45', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Raramente',
            ],
            [
                'id' => '46', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Qualche volta',
            ],
            [
                'id' => '47', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Spesso',
            ],
            [
                'id' => '48', 'questionable_id' => '9', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Sempre',
            ],
            [
                'id' => '49', 'questionable_id' => '10', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Non sono d\'accordo',
            ],
            [
                'id' => '50', 'questionable_id' => '10', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Sono d\'accordo in parte',
            ],
            [
                'id' => '51', 'questionable_id' => '10', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Sono abbastanza d\'accordo',
            ],
            [
                'id' => '52', 'questionable_id' => '10', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Sono completamente d\'accordo',
            ],
            [
                'id' => '53', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Mai',
            ],
            [
                'id' => '54', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Raramente',
            ],
            [
                'id' => '55', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'A volte',
            ],
            [
                'id' => '56', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Spesso',
            ],
            [
                'id' => '57', 'questionable_id' => '11', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Quasi sempre',
            ],
            [
                'id' => '58', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Per niente',
            ],
            [
                'id' => '59', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Poco',
            ],
            [
                'id' => '60', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Abbastanza',
            ],
            [
                'id' => '61', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Molto',
            ],
            [
                'id' => '62', 'questionable_id' => '12', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Moltissimo',
            ],
            [
                'id' => '63', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Per niente tipica',
            ],
            [
                'id' => '64', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Poco tipica',
            ],
            [
                'id' => '65', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Abbastanza tipica',
            ],
            [
                'id' => '66', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Discretamente tipica',
            ],
            [
                'id' => '67', 'questionable_id' => '13', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Molto tipica',
            ],
            [
                'id' => '68', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Mai',
            ],
            [
                'id' => '69', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Raramente',
            ],
            [
                'id' => '70', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Qualche volta',
            ],
            [
                'id' => '71', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Spesso',
            ],
            [
                'id' => '72', 'questionable_id' => '14', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Sempre',
            ],
            [
                'id' => '73', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Totale disaccordo',
            ],
            [
                'id' => '74', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Molto disaccordo',
            ],
            [
                'id' => '75', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Poco disaccordo',
            ],
            [
                'id' => '76', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Neutrale',
            ],
            [
                'id' => '77', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '5', 'text' => 'Poco accordo',
            ],
            [
                'id' => '78', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '6', 'text' => 'Molto accordo',
            ],
            [
                'id' => '79', 'questionable_id' => '15', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '7', 'text' => 'Totale accordo',
            ],
            [
                'id' => '80', 'questionable_id' => '16', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Quasi mai',
            ],
            [
                'id' => '81', 'questionable_id' => '16', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Qualche volta',
            ],
            [
                'id' => '82', 'questionable_id' => '16', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Spesso',
            ],
            [
                'id' => '83', 'questionable_id' => '16', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '4', 'text' => 'Quasi sempre',
            ],
            [
                'id' => '84', 'questionable_id' => '23', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Per niente',
            ],
            [
                'id' => '85', 'questionable_id' => '23', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Un po\', non mi ha infastidito molto',
            ],
            [
                'id' => '86', 'questionable_id' => '23', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '2', 'text' => 'Abbastanza, era spiacevole ma potevo sopportarlo',
            ],
            [
                'id' => '87', 'questionable_id' => '23', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '3', 'text' => 'Molto, potevo appena sopportarlo',
            ],
            [
                'id' => '88', 'questionable_id' => '420', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento triste',
            ],
            [
                'id' => '89', 'questionable_id' => '420', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi sento triste per la maggior parte del tempo',
            ],
            [
                'id' => '90', 'questionable_id' => '420', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi sento sempre triste',
            ],
            [
                'id' => '91', 'questionable_id' => '420', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi sento così triste o infelice da non poterlo sopportare',
            ],
            [
                'id' => '92', 'questionable_id' => '421', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento scoraggiato/a riguardo al mio futuro',
            ],
            [
                'id' => '93', 'questionable_id' => '421', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi sento più scoraggiato/a riguardo al mio futuro rispetto al solito',
            ],
            [
                'id' => '94', 'questionable_id' => '421', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Non mi aspetto nulla di buono per me',
            ],
            [
                'id' => '95', 'questionable_id' => '421', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sento che il futuro è senza speranza e che continuerà a peggiorare',
            ],
            [
                'id' => '96', 'questionable_id' => '422', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento un/a fallito/a',
            ],
            [
                'id' => '97', 'questionable_id' => '422', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Ho fallito più di quanto avrei dovuto',
            ],
            [
                'id' => '98', 'questionable_id' => '422', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Se guardo indietro alla mia vita non vedo altro che una serie di fallimenti',
            ],
            [
                'id' => '99', 'questionable_id' => '422', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi sento un completo fallimento come persona',
            ],
            [
                'id' => '100', 'questionable_id' => '423', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Traggo soddisfazione o piacere dalle cose come al solito',
            ],
            [
                'id' => '101', 'questionable_id' => '423', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Traggo meno soddisfazione o piacere dalle cose rispetto al passato',
            ],
            [
                'id' => '102', 'questionable_id' => '423', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Non traggo soddisfazione o piacere alcuno dalle cose',
            ],
            [
                'id' => '103', 'questionable_id' => '423', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sono insoddisfatto/a o annoiato/a da tutto',
            ],
            [
                'id' => '104', 'questionable_id' => '424', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento particolarmente in colpa',
            ],
            [
                'id' => '105', 'questionable_id' => '424', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi sento in colpa per molte cose che ho fatto o che avrei dovuto fare',
            ],
            [
                'id' => '106', 'questionable_id' => '424', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi sento molto spesso in colpa',
            ],
            [
                'id' => '107', 'questionable_id' => '424', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi sento sempre in colpa',
            ],
            [
                'id' => '108', 'questionable_id' => '425', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non sento come se stessi subendo una punizione',
            ],
            [
                'id' => '109', 'questionable_id' => '425', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Sento che potrei essere punito',
            ],
            [
                'id' => '110', 'questionable_id' => '425', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi aspetto di ricevere una punizione',
            ],
            [
                'id' => '111', 'questionable_id' => '425', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sento come se stessi subendo una punizione',
            ],
            [
                'id' => '112', 'questionable_id' => '426', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Considero me stesso come ho sempre fatto',
            ],
            [
                'id' => '113', 'questionable_id' => '426', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Credo meno in me stesso',
            ],
            [
                'id' => '114', 'questionable_id' => '426', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Sono deluso di me stesso',
            ],
            [
                'id' => '115', 'questionable_id' => '426', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi detesto',
            ],
            [
                'id' => '116', 'questionable_id' => '427', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non sento di essere peggiore di qualsiasi altra persona',
            ],
            [
                'id' => '117', 'questionable_id' => '427', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi critico più spesso del solito',
            ],
            [
                'id' => '118', 'questionable_id' => '427', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi critico per tutte le mie colpe',
            ],
            [
                'id' => '119', 'questionable_id' => '427', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi rimprovero per qualunque cosa negativa mi accada',
            ],
            [
                'id' => '120', 'questionable_id' => '428', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non ho pensieri suicidi',
            ],
            [
                'id' => '121', 'questionable_id' => '428', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Ho pensieri suicidi ma non li realizzerei',
            ],
            [
                'id' => '122', 'questionable_id' => '428', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Sento che starei meglio se morissi',
            ],
            [
                'id' => '123', 'questionable_id' => '428', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Se mi si presentasse l\'occasione, non esiterei ad uccidermi',
            ],
            [
                'id' => '124', 'questionable_id' => '429', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non piango più del solito',
            ],
            [
                'id' => '125', 'questionable_id' => '429', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Piango più di quanto facessi prima',
            ],
            [
                'id' => '126', 'questionable_id' => '429', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Piango per ogni minima cosa',
            ],
            [
                'id' => '127', 'questionable_id' => '429', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Ho spesso voglia di piangere ma non ci riesco',
            ],
            [
                'id' => '128', 'questionable_id' => '430', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento più agitato o teso del solito',
            ],
            [
                'id' => '129', 'questionable_id' => '430', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi sento più agitato o teso del solito',
            ],
            [
                'id' => '130', 'questionable_id' => '430', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Sono così nervoso o agitato al punto che mi è difficile rimanere fermo',
            ],
            [
                'id' => '131', 'questionable_id' => '430', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sono così nervoso o agitato che devo continuare a muovermi o fare qualcosa',
            ],
            [
                'id' => '132', 'questionable_id' => '431', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non ho perso interesse verso le altre persone o verso le attività',
            ],
            [
                'id' => '133', 'questionable_id' => '431', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Sono meno interessato agli altri o alle cose rispetto a prima',
            ],
            [
                'id' => '134', 'questionable_id' => '431', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ho perso la maggior parte dell\'interesse verso le altre persone o cose',
            ],
            [
                'id' => '135', 'questionable_id' => '431', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Mi risulta difficile interessarmi a qualsiasi cosa',
            ],
            [
                'id' => '136', 'questionable_id' => '432', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Prendo decisioni quasi come al solito',
            ],
            [
                'id' => '137', 'questionable_id' => '432', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Trovo più difficoltà del solito nel prendere decisioni',
            ],
            [
                'id' => '138', 'questionable_id' => '432', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ho molte più difficoltà nel prendere decisioni rispetto al solito',
            ],
            [
                'id' => '139', 'questionable_id' => '432', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Non riesco a prendere nessuna decisione',
            ],
            [
                'id' => '140', 'questionable_id' => '433', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi sento di avere un aspetto peggiore del solito',
            ],
            [
                'id' => '141', 'questionable_id' => '433', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Temo di avere un aspetto invecchiato o non attraente',
            ],
            [
                'id' => '142', 'questionable_id' => '433', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2',
                'text' => 'Temo che ci siano stati cambiamenti definitivi nel mio aspetto che mi rendono non attraente',
            ],
            [
                'id' => '143', 'questionable_id' => '433', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Ho la sensazione di essere brutto/a',
            ],
            [
                'id' => '144', 'questionable_id' => '434', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Riesco a lavorare quasi altrettanto bene che nel passato',
            ],
            [
                'id' => '145', 'questionable_id' => '434', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Devo fare uno sforzo in più per cominciare a fare qualcosa',
            ],
            [
                'id' => '146', 'questionable_id' => '434', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi devo scuotere con forza per fare qualsiasi cosa',
            ],
            [
                'id' => '147', 'questionable_id' => '434', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Non riesco a lavorare per niente',
            ],
            [
                'id' => '148', 'questionable_id' => '435', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Dormo bene come al solito',
            ],
            [
                'id' => '149', 'questionable_id' => '435', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Non riesco a dormire bene come in passato',
            ],
            [
                'id' => '150', 'questionable_id' => '435', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2',
                'text' => 'Rispetto al passato, mi sveglio 1-2 ore prima e non riesco a riaddormentarmi',
            ],
            [
                'id' => '151', 'questionable_id' => '435', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3',
                'text' => 'Rispetto al passato, mi sveglio parecchie ore prima e non riesco più ad addormentarmi',
            ],
            [
                'id' => '152', 'questionable_id' => '436', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non mi stanco più del solito',
            ],
            [
                'id' => '153', 'questionable_id' => '436', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Mi stanco più facilmente di un tempo',
            ],
            [
                'id' => '154', 'questionable_id' => '436', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Mi stanco facendo qualsiasi cosa',
            ],
            [
                'id' => '155', 'questionable_id' => '436', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Sono troppo stanco/a per fare alcunché',
            ],
            [
                'id' => '156', 'questionable_id' => '437', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Il mio appetito non è peggiorato',
            ],
            [
                'id' => '157', 'questionable_id' => '437', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Il mio appetito non è più così buono come una volta',
            ],
            [
                'id' => '158', 'questionable_id' => '437', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ora ho molto meno appetito',
            ],
            [
                'id' => '159', 'questionable_id' => '437', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Non ho più appetito',
            ],
            [
                'id' => '160', 'questionable_id' => '438', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non ho perso molto peso ultimamente',
            ],
            [
                'id' => '161', 'questionable_id' => '438', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Ho perso più di 2kg',
            ],
            [
                'id' => '162', 'questionable_id' => '438', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ho perso più di 4kg',
            ],
            [
                'id' => '163', 'questionable_id' => '438', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Ho perso più di 6kg',
            ],
            [
                'id' => '164', 'questionable_id' => '439', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non sono più preoccupato della mia salute rispetto al solito',
            ],
            [
                'id' => '165', 'questionable_id' => '439', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1',
                'text' => 'Sono preoccupato/a per problemi fisici come malori, dolori, problemi di stomaco o costipazioni',
            ],
            [
                'id' => '166', 'questionable_id' => '439', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2',
                'text' => 'Mi preoccupo totalmente di come mi sento che mi è difficile pensare ad altre cose',
            ],
            [
                'id' => '167', 'questionable_id' => '439', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3',
                'text' => 'Sono talmente preoccupato/a per problemi fisici che non riesco a pensare ad altro',
            ],
            [
                'id' => '168', 'questionable_id' => '440', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Non ho notato cambiamenti nel mio interesse per il sesso',
            ],
            [
                'id' => '169', 'questionable_id' => '440', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Ho meno interesse nel sesso rispetto a prima',
            ],
            [
                'id' => '170', 'questionable_id' => '440', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Ora sono molto meno interessato al sesso',
            ],
            [
                'id' => '171', 'questionable_id' => '440', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Ho perso tutto l\'interesse nel sesso',
            ],
            [
                'id' => '172', 'questionable_id' => '441', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '173', 'questionable_id' => '441', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '174', 'questionable_id' => '442', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '175', 'questionable_id' => '442', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '176', 'questionable_id' => '443', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '177', 'questionable_id' => '443', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '178', 'questionable_id' => '444', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '179', 'questionable_id' => '444', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '180', 'questionable_id' => '445', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '181', 'questionable_id' => '445', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '182', 'questionable_id' => '446', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '183', 'questionable_id' => '446', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '184', 'questionable_id' => '447', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '185', 'questionable_id' => '447', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '186', 'questionable_id' => '448', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '187', 'questionable_id' => '448', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '188', 'questionable_id' => '449', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '189', 'questionable_id' => '449', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '190', 'questionable_id' => '450', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '191', 'questionable_id' => '450', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '192', 'questionable_id' => '451', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '193', 'questionable_id' => '451', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '194', 'questionable_id' => '452', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '195', 'questionable_id' => '452', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '196', 'questionable_id' => '453', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Per niente',
            ],
            [
                'id' => '197', 'questionable_id' => '453', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Poco',
            ],
            [
                'id' => '198', 'questionable_id' => '453', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Abbastanza',
            ],
            [
                'id' => '199', 'questionable_id' => '453', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Molto',
            ],
            [
                'id' => '200', 'questionable_id' => '455', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '201', 'questionable_id' => '455', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '202', 'questionable_id' => '456', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '203', 'questionable_id' => '456', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '204', 'questionable_id' => '457', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '205', 'questionable_id' => '457', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '206', 'questionable_id' => '458', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '207', 'questionable_id' => '458', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '208', 'questionable_id' => '459', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '209', 'questionable_id' => '459', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '210', 'questionable_id' => '460', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '211', 'questionable_id' => '460', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '212', 'questionable_id' => '461', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '213', 'questionable_id' => '461', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '214', 'questionable_id' => '462', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '215', 'questionable_id' => '462', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '216', 'questionable_id' => '463', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '217', 'questionable_id' => '463', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '218', 'questionable_id' => '464', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '219', 'questionable_id' => '464', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '220', 'questionable_id' => '465', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '221', 'questionable_id' => '465', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '222', 'questionable_id' => '466', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Sì',
            ],
            [
                'id' => '223', 'questionable_id' => '466', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'No',
            ],
            [
                'id' => '224', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Per niente',
            ],
            [
                'id' => '225', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '1', 'text' => 'Poco',
            ],
            [
                'id' => '226', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '2', 'text' => 'Abbastanza',
            ],
            [
                'id' => '227', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '3', 'text' => 'Molto',
            ],
            [
                'id' => '228', 'questionable_id' => '467', 'questionable_type' => 'App\\Models\\Question',
                'points' => '4', 'text' => 'Completamente soddisfatta/o',
            ],
            [
                'id' => '229', 'questionable_id' => '468', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Termina',
            ],
            [
                'id' => '230', 'questionable_id' => '469', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '231', 'questionable_id' => '470', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '232', 'questionable_id' => '471', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '233', 'questionable_id' => '472', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '234', 'questionable_id' => '474', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '235', 'questionable_id' => '475', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '236', 'questionable_id' => '476', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '237', 'questionable_id' => '477', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '238', 'questionable_id' => '478', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '239', 'questionable_id' => '479', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '240', 'questionable_id' => '480', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '241', 'questionable_id' => '481', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '242', 'questionable_id' => '482', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '243', 'questionable_id' => '483', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '244', 'questionable_id' => '484', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '245', 'questionable_id' => '485', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '246', 'questionable_id' => '486', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '247', 'questionable_id' => '487', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '248', 'questionable_id' => '488', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '249', 'questionable_id' => '489', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '250', 'questionable_id' => '490', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '251', 'questionable_id' => '491', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '252', 'questionable_id' => '492', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '253', 'questionable_id' => '493', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '254', 'questionable_id' => '494', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '255', 'questionable_id' => '495', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '256', 'questionable_id' => '496', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '257', 'questionable_id' => '497', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '258', 'questionable_id' => '498', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '259', 'questionable_id' => '499', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '260', 'questionable_id' => '500', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '261', 'questionable_id' => '501', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '262', 'questionable_id' => '502', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '263', 'questionable_id' => '503', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '264', 'questionable_id' => '504', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '265', 'questionable_id' => '505', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Termina',
            ],
            [
                'id' => '266', 'questionable_id' => '507', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '267', 'questionable_id' => '508', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '268', 'questionable_id' => '509', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '269', 'questionable_id' => '511', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '270', 'questionable_id' => '512', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '271', 'questionable_id' => '513', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '272', 'questionable_id' => '514', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '273', 'questionable_id' => '515', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '274', 'questionable_id' => '516', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '275', 'questionable_id' => '517', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '276', 'questionable_id' => '518', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '277', 'questionable_id' => '519', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '278', 'questionable_id' => '520', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '279', 'questionable_id' => '521', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '280', 'questionable_id' => '522', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '281', 'questionable_id' => '523', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '282', 'questionable_id' => '524', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '283', 'questionable_id' => '525', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '284', 'questionable_id' => '526', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '285', 'questionable_id' => '527', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '286', 'questionable_id' => '528', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '287', 'questionable_id' => '529', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '288', 'questionable_id' => '530', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '289', 'questionable_id' => '531', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '290', 'questionable_id' => '532', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '291', 'questionable_id' => '533', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '292', 'questionable_id' => '534', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '293', 'questionable_id' => '535', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '294', 'questionable_id' => '536', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '295', 'questionable_id' => '537', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '296', 'questionable_id' => '538', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '297', 'questionable_id' => '539', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '298', 'questionable_id' => '540', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '299', 'questionable_id' => '541', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '300', 'questionable_id' => '542', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Termina',
            ],
            [
                'id' => '301', 'questionable_id' => '543', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '302', 'questionable_id' => '544', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '303', 'questionable_id' => '545', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '304', 'questionable_id' => '546', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '305', 'questionable_id' => '547', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '306', 'questionable_id' => '548', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '307', 'questionable_id' => '549', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '308', 'questionable_id' => '550', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '309', 'questionable_id' => '551', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '310', 'questionable_id' => '552', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '311', 'questionable_id' => '553', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '312', 'questionable_id' => '554', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '313', 'questionable_id' => '555', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '314', 'questionable_id' => '556', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '315', 'questionable_id' => '557', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '316', 'questionable_id' => '558', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '317', 'questionable_id' => '559', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '318', 'questionable_id' => '560', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '319', 'questionable_id' => '561', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '320', 'questionable_id' => '562', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '321', 'questionable_id' => '563', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '322', 'questionable_id' => '564', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '323', 'questionable_id' => '565', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '324', 'questionable_id' => '566', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '325', 'questionable_id' => '567', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '326', 'questionable_id' => '568', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '327', 'questionable_id' => '569', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '328', 'questionable_id' => '570', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '329', 'questionable_id' => '571', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '330', 'questionable_id' => '572', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '331', 'questionable_id' => '573', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '332', 'questionable_id' => '574', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '333', 'questionable_id' => '575', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '334', 'questionable_id' => '576', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '335', 'questionable_id' => '577', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '336', 'questionable_id' => '578', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Avanti',
            ],
            [
                'id' => '337', 'questionable_id' => '579', 'questionable_type' => 'App\\Models\\Question',
                'points' => '0', 'text' => 'Termina',
            ],
            [
                'id' => '426', 'questionable_id' => '24', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'No',
            ],
            [
                'id' => '427', 'questionable_id' => '24', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '1', 'text' => 'Sì',
            ],
            [
                'id' => '428', 'questionable_id' => '25', 'questionable_type' => 'App\\Models\\Questionnaire',
                'points' => '0', 'text' => 'Avanti',
            ],
        ];

        foreach ($choices as $choice) {
            DB::table('choices')->insert($choice);
        }
    }
}
