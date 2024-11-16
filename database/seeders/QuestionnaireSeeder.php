<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnaireSeeder extends Seeder
{
    public function run(): void
    {
        $questionnaires = [
            [
                'id' => '1', 'user_id' => '1', 'title' => 'ANXIETY CONTROL QUESTIONNAIRE -  SC (ACQ)',
                'description' => 'Qui troverà  una serie di affermazioni che descrivono delle convinzioni. Per favore, legga ogni frase attentamente e risponda quanto ogni convinzione sia adatta a descriverLa.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '2', 'user_id' => '1', 'title' => 'ANGER RUMINATION SCALE (ARS)',
                'description' => 'Tutti si arrabbiano e si sentono frustrati di tanto in tanto, ma le persone differiscono nel modo in cui esse pensano ai loro episodi di rabbia. Le affermazioni seguenti descrivono differenti modi in cui le persone richiamano alla mente o pensano alle loro esperienze di rabbia. Per favore, legga ciascuna affermazione e poi risponda indicando quanto per Lei è frequente ciascuna affermazione. Non ci sono risposte giuste o sbagliate in questo questionario, ed è molto importante le sue risposte siano più sincere possibile.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '3', 'user_id' => '1', 'title' => 'ATTACHMENT STYLE QUESTIONNAIRE (ASQ)',
                'description' => 'Esprima il Suo grado di accordo con le seguenti affermazioni.', 'visible' => '1',
                'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55', 'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '5', 'user_id' => '1', 'title' => 'DIFFICULTIES IN EMOTION REGULATION SCALE (DERS)',
                'description' => 'Le verranno ora presentate delle affermazioni che riguardano alcuni aspetti del suo modo di vivere le emozioni e i sentimenti. Prendendo come riferimento gli ultimi mesi, segnali, per ciascuna, la frequenza con la quale l\'affermazione si adatta alla sua condizione.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-28 10:26:04',
            ],
            [
                'id' => '6', 'user_id' => '1', 'title' => 'EATING DISORDER INVENTORY - 3 (EDI-3)',
                'description' => 'Valuti la frequenza con la quale le capita di sperimentare le situazioni indicate nelle seguenti affermazioni, utilizzando la scala proposta.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '7', 'user_id' => '1', 'title' => 'INTOLERANCE OF UNCERTAINTY SCALE',
                'description' => 'Di seguito troverà  una serie di frasi che descrivono come le persone reagiscono di fronte a situazioni di incertezza che si presentano nella vita. Le chiediamo di selezionare la risposta che meglio descrive a quale livello si riconosce in ogni affermazione.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '8', 'user_id' => '1', 'title' => 'LEVEL OF SELF-CRITICISM SCALE',
                'description' => 'Legga attentamente ogni affermazione e valuti quanto bene La descrive su una scala da 1 a 7 (0 = per niente e 7 = perfettamente)',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '9', 'user_id' => '1', 'title' => 'MULTIDIMENSIONAL PERFECTIONISM SCALE',
                'description' => 'Per favore, legga attentamente e poi riporti la risposta che si avvicina maggiormente a quello che lei pensa o sente.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '10', 'user_id' => '1', 'title' => 'METACOGNITION QUESTIONNAIRE  30 ( MCQ-30)',
                'description' => 'Questo questionario riguarda le credenze che le persone hanno circa i loro pensieri. Di seguito troverà  una serie di credenze che gli individui solitamente esprimono. Legga attentamente ogni affermazione e indichi quanto in generale si trova d\'accordo con essa, non esistono risposte giuste o sbagliate.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '11', 'user_id' => '1', 'title' => 'OUTCOME QUESTIONNAIRE 45',
                'description' => 'Pensando all\'ultima settimana, oggi compreso, ci aiuti a comprendere come si  sentito. Legga attentamente ciascuna asserzione e selezioni la categoria che meglio descrive la sua situazione corrente. Ai fini di questo questionario per lavoro si intende un impiego, la frequenza scolastica, i lavori domestici, il volontariato.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '12', 'user_id' => '1', 'title' => 'PADUA INVENTORY  WUREV',
                'description' => 'Valuti il grado con cui ogni frase si avvicina alla sua condizione.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '13', 'user_id' => '1', 'title' => 'PENN STATE WORRY QUESTIONNAIRE',
                'description' => 'Indichi, per ciascuna affermazione riportata, quanto questa sia tipica o caratteristica del suo modo di vivere gli eventi preoccupanti.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '14', 'user_id' => '1', 'title' => 'PERCEIVED STRESS SCALE',
                'description' => 'Le frasi che troverà  di seguito indicano una serie di pensieri ed emozioni che potrebbe aver provato nell\'ultimo mese. Indichi quale frequenza ritiene più adeguata. Nell\'ultimo mese:',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '15', 'user_id' => '1', 'title' => 'RESPONSABILITY ATTITUDE SCALE',
                'description' => 'Di seguito verranno elencati alcuni atteggiamenti o convinzioni. Siete pregati di leggerli con attenzione e indicare la frase che meglio descrive il vostro pensiero abituale.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '16', 'user_id' => '1', 'title' => 'RUMINATIVE RESPONSE SCALE',
                'description' => 'Quando si sentono tristi, le persone pensano e fanno diverse cose. Legga attentamente ogni affermazione e selezioni l\'opzione che meglio indica quanto spesso le capita di avere quel pensiero o di fare quella cosa quando si sente giù, triste o depresso. Risponda indicando cià² che fa e NON cià² che dovrebbe fare secondo il suo parere. Non esistono risposte giuste o sbagliate.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '17', 'user_id' => '1', 'title' => 'BECK DEPRESSION INVENTORY (BDI)',
                'description' => 'Per favore, legga attentamente le affermazioni seguenti e, per ogni gruppo, scelga quella che più si avvicina alla sua condizione tenendo come riferimento il periodo delle ultime due settimane compresa la giornata di oggi.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-07 05:31:55',
                'updated_at' => '2023-09-07 05:31:55',
            ],
            [
                'id' => '19', 'user_id' => '1', 'title' => 'Feedback questionari', 'description' => 'Per terminare le chiediamo di segnalarci come ha vissuto la compilazione di questa batteria di test,
rispondendo alle domande seguenti cliccando SÌ, se condivide l’affermazione, oppure
NO.
I questionari di questa batteria....', 'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-12 12:33:23',
                'updated_at' => '2023-09-12 12:33:23',
            ],
            [
                'id' => '22', 'user_id' => '1', 'title' => 'Experimental Generation of Interpersonal Closeness',
                'description' => 'I partecipanti si siedano uno di fronte all’altro e comincino a rispondere alle domande seguenti. La durata dell’incontro non deve superare i 45 minuti. Alcune domande richiedono l\'utilizzo di un timer, tenerne uno a portata di mano.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-13 12:31:30',
                'updated_at' => '2023-09-13 12:31:30',
            ],
            [
                'id' => '23', 'user_id' => '1', 'title' => 'BECK ANXIETY INVENTORY (BAI)',
                'description' => 'Di seguito troverà  una lista dei più comuni sintomi legati all\'ansia. Per favore legga attentamente ogni frase e indichi quanto fastidio ciascun sintomo le ha causato nella scorsa settimana (incluso oggi).',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2023-09-19 10:03:27',
                'updated_at' => '2023-09-19 10:03:27',
            ],
            [
                'id' => '24', 'user_id' => '1', 'title' => 'SCID 5-PD Questionario',
                'description' => 'Queste domande riguardano il tipo di persona che è solita essere; ossia, il modo in cui si è solitamente sentito/a o comportato/a durante la maggior parte degli ultimi anni. Segni con un cerchio “SÌ” se la domanda è completamente o quasi del tutto valida per lei, oppure “NO” se la domanda non è valida per lei. Se non capisce una domanda non risponda.',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2024-06-09 19:05:42',
                'updated_at' => '2024-06-09 19:45:49',
            ],
            [
                'id' => '25', 'user_id' => '2', 'title' => 'Questionario per tests', 'description' => 'Tests',
                'visible' => '1', 'deleted_at' => null, 'created_at' => '2024-06-12 09:20:14',
                'updated_at' => '2024-06-12 09:20:35',
            ],
        ];

        $questionnaire_tag = [
            ['id' => '1', 'questionnaire_id' => '1', 'tag_id' => '2'],
            ['id' => '3', 'questionnaire_id' => '2', 'tag_id' => '3'],
            ['id' => '4', 'questionnaire_id' => '1', 'tag_id' => '4'],
            ['id' => '5', 'questionnaire_id' => '2', 'tag_id' => '4'],
            ['id' => '6', 'questionnaire_id' => '3', 'tag_id' => '4'],
            ['id' => '8', 'questionnaire_id' => '5', 'tag_id' => '4'],
            ['id' => '9', 'questionnaire_id' => '9', 'tag_id' => '4'],
            ['id' => '10', 'questionnaire_id' => '10', 'tag_id' => '4'],
            ['id' => '11', 'questionnaire_id' => '17', 'tag_id' => '4'],
            ['id' => '12', 'questionnaire_id' => '6', 'tag_id' => '5'],
            ['id' => '13', 'questionnaire_id' => '2', 'tag_id' => '6'],
            ['id' => '14', 'questionnaire_id' => '10', 'tag_id' => '6'],
            ['id' => '15', 'questionnaire_id' => '13', 'tag_id' => '6'],
            ['id' => '16', 'questionnaire_id' => '16', 'tag_id' => '6'],
            ['id' => '17', 'questionnaire_id' => '9', 'tag_id' => '7'],
            ['id' => '18', 'questionnaire_id' => '17', 'tag_id' => '8'],
            ['id' => '19', 'questionnaire_id' => '12', 'tag_id' => '9'],
            ['id' => '20', 'questionnaire_id' => '3', 'tag_id' => '10'],
            ['id' => '21', 'questionnaire_id' => '7', 'tag_id' => '4'],
            ['id' => '22', 'questionnaire_id' => '8', 'tag_id' => '4'],
            ['id' => '23', 'questionnaire_id' => '23', 'tag_id' => '2'],
            ['id' => '24', 'questionnaire_id' => '23', 'tag_id' => '4'],
        ];

        foreach ($questionnaires as $questionnaire) {
            DB::table('questionnaires')->insert($questionnaire);
        }

        foreach ($questionnaire_tag as $relation) {
            DB::table('questionnaire_tag')->insert($relation);
        }
    }
}
