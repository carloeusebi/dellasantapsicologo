<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'id' => '1', 'questionnaire_id' => '1',
                'text' => 'La mia capacità di affrontare le situazioni dipende dall\'aiuto che ricevo',
                'reversed' => '1', 'order' => '1',

            ],
            [
                'id' => '2', 'questionnaire_id' => '1',
                'text' => 'Quando sono sotto stress, potrei perdere il controllo', 'reversed' => '1', 'order' => '2',

            ],
            [
                'id' => '3', 'questionnaire_id' => '1',
                'text' => 'Se qualcosa mi intimorisce, non c\'è nulla che io possa fare', 'reversed' => '1',
                'order' => '3',

            ],
            [
                'id' => '4', 'questionnaire_id' => '1',
                'text' => 'Riesco a sfuggire a situazioni preoccupanti soltanto per caso o per fortuna',
                'reversed' => '1', 'order' => '4',

            ],
            [
                'id' => '5', 'questionnaire_id' => '1', 'text' => 'Posso facilmente eliminare i pensieri ansiosi',
                'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '6', 'questionnaire_id' => '1',
                'text' => 'Sono in grado di controllare il mio livello di ansia', 'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '7', 'questionnaire_id' => '1',
                'text' => 'C\'è poco che possa fare per modificare gli eventi che mi preoccupano', 'reversed' => '1',
                'order' => '7',

            ],
            [
                'id' => '8', 'questionnaire_id' => '1',
                'text' => 'Non c\'è alcun rapporto tra le mie azioni e la soluzione di una situazione difficile',
                'reversed' => '1', 'order' => '8',

            ],
            [
                'id' => '9', 'questionnaire_id' => '1',
                'text' => 'Quando qualcosa sta per danneggiarmi, quello che faccio avrà poco effetto',
                'reversed' => '1', 'order' => '9',

            ],
            [
                'id' => '10', 'questionnaire_id' => '1', 'text' => 'Di solito, posso rilassarmi quando voglio',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '11', 'questionnaire_id' => '1',
                'text' => 'Quando sono sotto stress, non so come potrei reagire', 'reversed' => '1', 'order' => '11',

            ],
            [
                'id' => '12', 'questionnaire_id' => '1',
                'text' => 'Molti eventi che mi danno ansia sono al di fuori del mio controllo', 'reversed' => '1',
                'order' => '12',

            ],
            [
                'id' => '13', 'questionnaire_id' => '1',
                'text' => 'Non mi preoccupa il fatto che potrei avere ansia in una situazione difficile, perchè ho fiducia nella mia capacità di gestirei miei stati d\'animo',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '14', 'questionnaire_id' => '1',
                'text' => 'Di solito trovo difficile gestire le situazioni difficili', 'reversed' => '1',
                'order' => '14',

            ],
            [
                'id' => '15', 'questionnaire_id' => '1',
                'text' => 'Quando sono ansioso, trovo difficile concentrarmi su qualcosa che non sia l\'ansia stessa',
                'reversed' => '1', 'order' => '15',

            ],
            [
                'id' => '16', 'questionnaire_id' => '2', 'text' => 'Rumino sulle mia passate esperienze di rabbia',
                'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '17', 'questionnaire_id' => '2', 'text' => 'Rifletto sulle ingiustizie che mi sono state fatte',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '18', 'questionnaire_id' => '2',
                'text' => 'Continuo a pensare per lungo tempo alle situazioni che mi hanno fatto arrabbiare',
                'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '19', 'questionnaire_id' => '2',
                'text' => 'Penso a certi avvenimenti di tanto tempo fa e ancora mi fanno arrabbiare', 'reversed' => '0',
                'order' => '4',

            ],
            [
                'id' => '20', 'questionnaire_id' => '2',
                'text' => 'Ho difficoltà a perdonare le persone che mi hanno ferito', 'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '21', 'questionnaire_id' => '2',
                'text' => 'Dopo che una discussione è terminata, continuo a litigare con questa persona nella mia immaginazione',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '22', 'questionnaire_id' => '2',
                'text' => 'I ricordi di essere stato innervosito affiorano nella mia mente prima di addormentarmi',
                'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '23', 'questionnaire_id' => '2',
                'text' => 'Ogni volta che provo rabbia, continuo a pensarci per un po\'', 'reversed' => '0',
                'order' => '8',

            ],
            [
                'id' => '24', 'questionnaire_id' => '2',
                'text' => 'Mi sento arrabbiato riguardo a certe cose della mia vita', 'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '25', 'questionnaire_id' => '2',
                'text' => 'Quando qualcuno mi provoca, continuo a domandarmi perchè questo debba essere capitato a me',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '26', 'questionnaire_id' => '2',
                'text' => 'I ricordi di seccature anche di poco conto mi disturbano per un po\'', 'reversed' => '0',
                'order' => '11',

            ],
            [
                'id' => '27', 'questionnaire_id' => '2',
                'text' => 'Quando qualche cosa mi fa arrabbiare, ci torno sopra con la mente più e più volte',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '28', 'questionnaire_id' => '2',
                'text' => 'Ricostruisco nella mia mente l\'episodio di rabbia dopo che si è verificato',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '29', 'questionnaire_id' => '3', 'text' => 'Nel complesso sono una persona valida',
                'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '30', 'questionnaire_id' => '3',
                'text' => 'È più facile arrivare a conoscere me che la maggior parte delle altre persone',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '31', 'questionnaire_id' => '3',
                'text' => 'Sono fiducioso che gli altri ci saranno quando avrò bisogno di loro', 'reversed' => '0',
                'order' => '3',

            ],
            [
                'id' => '32', 'questionnaire_id' => '3',
                'text' => 'Preferisco dipendere da me stesso invece che dagli altri', 'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '33', 'questionnaire_id' => '3', 'text' => 'Prefresisco stare sulle mie', 'reversed' => '0',
                'order' => '5',

            ],
            [
                'id' => '34', 'questionnaire_id' => '3',
                'text' => 'Chiedere aiuto equivale ad ammettere di essere un fallimento', 'reversed' => '0',
                'order' => '6',

            ],
            [
                'id' => '35', 'questionnaire_id' => '3',
                'text' => 'Il valore di una persona andrebbe valutato in base ai suoi successi', 'reversed' => '0',
                'order' => '7',

            ],
            [
                'id' => '36', 'questionnaire_id' => '3',
                'text' => 'Raggiungere degli obiettivi è più importante che costruire delle relazioni',
                'reversed' => '0', 'order' => '8',

            ],
            [
                'id' => '37', 'questionnaire_id' => '3',
                'text' => 'Dare il massimo è più importante che andare d\'accordo con gli atltri', 'reversed' => '0',
                'order' => '9',

            ],
            [
                'id' => '38', 'questionnaire_id' => '3',
                'text' => 'Se hai un lavoro da fare, non dovrebbe importanti di chi ne avrà un danno',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '39', 'questionnaire_id' => '3', 'text' => 'Per me è importante piacere agli altri',
                'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '40', 'questionnaire_id' => '3',
                'text' => 'Per me è importante evitare di fare delle cose che agli altri non piacciono',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '41', 'questionnaire_id' => '3',
                'text' => 'Trovo difficile prendere una decisione a meno che non sappia ciò che pensano gli altri',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '42', 'questionnaire_id' => '3',
                'text' => 'Le mie relazioni con gli altri sono solitamente superficiali', 'reversed' => '0',
                'order' => '14',

            ],
            [
                'id' => '43', 'questionnaire_id' => '3', 'text' => 'A volte penso di non valere nulla',
                'reversed' => '0', 'order' => '15',

            ],
            [
                'id' => '44', 'questionnaire_id' => '3', 'text' => 'Ho difficoltà a fidarmi degli altri',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '45', 'questionnaire_id' => '3', 'text' => 'Ho difficoltà a dipendere dagli altri',
                'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '46', 'questionnaire_id' => '3',
                'text' => 'Trovo che gli altri siano riluttanti ad entrare in confidenza quanto io vorrei',
                'reversed' => '0', 'order' => '18',

            ],
            [
                'id' => '47', 'questionnaire_id' => '3',
                'text' => 'Trovo relativamente facile entrare in confidenza con gli altri', 'reversed' => '0',
                'order' => '19',

            ],
            [
                'id' => '48', 'questionnaire_id' => '3', 'text' => 'Mi fido facilmente degli altri', 'reversed' => '1',
                'order' => '20',

            ],
            [
                'id' => '49', 'questionnaire_id' => '3', 'text' => 'Mi trovo a mio agio nel dipendere dagli altri',
                'reversed' => '1', 'order' => '21',

            ],
            [
                'id' => '50', 'questionnaire_id' => '3',
                'text' => 'Mi preoccupo che agli altri non importerà di me quanto a me importa di loro',
                'reversed' => '0', 'order' => '22',

            ],
            [
                'id' => '51', 'questionnaire_id' => '3',
                'text' => 'Mi preoccupo quando la gente entra troppo in confidenza', 'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '52', 'questionnaire_id' => '3', 'text' => 'Mi preoccupo di non essere all’altezza degli altri',
                'reversed' => '0', 'order' => '24',

            ],
            [
                'id' => '53', 'questionnaire_id' => '3',
                'text' => 'Ho sentimenti constrastanti circa l\'essere in confidenza con gli altri', 'reversed' => '0',
                'order' => '25',

            ],
            [
                'id' => '54', 'questionnaire_id' => '3',
                'text' => 'Se da un lato voglio entrare in confidenza con gli altri, dall\'altro mi sento a disagio',
                'reversed' => '0', 'order' => '26',

            ],
            [
                'id' => '55', 'questionnaire_id' => '3',
                'text' => 'Mi chiedo perchè la gente voglia avere a che fare con me', 'reversed' => '0',
                'order' => '27',

            ],
            [
                'id' => '56', 'questionnaire_id' => '3',
                'text' => 'Per me è veramente importante avere una relazioni stretta', 'reversed' => '0',
                'order' => '28',

            ],
            [
                'id' => '57', 'questionnaire_id' => '3', 'text' => 'Mi preoccupo molto delle mie relazioni',
                'reversed' => '0', 'order' => '29',

            ],
            [
                'id' => '58', 'questionnaire_id' => '3',
                'text' => 'Mi chiedo come me la caverei senza qualcuno che mi ami', 'reversed' => '0', 'order' => '30',

            ],
            [
                'id' => '59', 'questionnaire_id' => '3', 'text' => 'Mi sento fiducioso nelle relazioni con gli altri',
                'reversed' => '0', 'order' => '31',

            ],
            [
                'id' => '60', 'questionnaire_id' => '3', 'text' => 'Spesso mi sento lasciato in disparte o solo',
                'reversed' => '0', 'order' => '32',

            ],
            [
                'id' => '61', 'questionnaire_id' => '3',
                'text' => 'Spesso mi preoccupo di non riuscire ad entrare in sintonia con gli altri', 'reversed' => '1',
                'order' => '33',

            ],
            [
                'id' => '62', 'questionnaire_id' => '3',
                'text' => 'Gli altri hanno i loro problemi, per cui non li infastidisco con i miei', 'reversed' => '0',
                'order' => '34',

            ],
            [
                'id' => '63', 'questionnaire_id' => '3',
                'text' => 'Quando discuto dei miei problemi con gli altri, di solito mi vergogno o mi sento stupido',
                'reversed' => '0', 'order' => '35',

            ],
            [
                'id' => '64', 'questionnaire_id' => '3',
                'text' => 'Sono troppo impegnato in altre attività per dedicare molto tempo alle relazioni',
                'reversed' => '0', 'order' => '36',

            ],
            [
                'id' => '65', 'questionnaire_id' => '3',
                'text' => 'Se qualcosa mi disturba, gli altri solitamente ne sono consapevoli e preoccupati',
                'reversed' => '0', 'order' => '37',

            ],
            [
                'id' => '66', 'questionnaire_id' => '3',
                'text' => 'Sono fiducioso di essere gradito e rispettato dagli altri', 'reversed' => '0',
                'order' => '38',

            ],
            [
                'id' => '67', 'questionnaire_id' => '3',
                'text' => 'Mi sento frustato quando gli altri non sono disponibili nel momento in cui ne ho bisogno',
                'reversed' => '0', 'order' => '39',

            ],
            [
                'id' => '68', 'questionnaire_id' => '3', 'text' => 'Gli altri spesso mancano alle mie aspettative',
                'reversed' => '0', 'order' => '40',

            ],
            [
                'id' => '89', 'questionnaire_id' => '5', 'text' => 'Sono sereno riguardo ciò che provo',
                'reversed' => '1', 'order' => '1',

            ],
            [
                'id' => '90', 'questionnaire_id' => '5', 'text' => 'Presto attenzione a come mi sento',
                'reversed' => '1', 'order' => '2',

            ],
            [
                'id' => '91', 'questionnaire_id' => '5',
                'text' => 'Vivo le emozioni come travolgenti fuori dal controllo', 'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '92', 'questionnaire_id' => '5', 'text' => 'Non ho idea di come mi sento', 'reversed' => '0',
                'order' => '4',

            ],
            [
                'id' => '93', 'questionnaire_id' => '5', 'text' => 'Ho difficoltà a dare un senso a ciò che provo',
                'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '94', 'questionnaire_id' => '5', 'text' => 'Presto attenzioni alle mie emozioni',
                'reversed' => '1', 'order' => '6',

            ],
            [
                'id' => '95', 'questionnaire_id' => '5', 'text' => 'So esattamente come mi sento', 'reversed' => '1',
                'order' => '7',

            ],
            [
                'id' => '96', 'questionnaire_id' => '5', 'text' => 'Mi interessa come mi sento', 'reversed' => '1',
                'order' => '8',

            ],
            [
                'id' => '97', 'questionnaire_id' => '5', 'text' => 'Sono confuso riguardo a ciò che provo',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '98', 'questionnaire_id' => '5', 'text' => 'Quando sono turbato, riconosco le mie emozioni',
                'reversed' => '1', 'order' => '10',

            ],
            [
                'id' => '99', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, mi arrabbio con me stesso perché mi sento in quel modo',
                'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '100', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, mi imbarazza sentirmi in quel modo', 'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '101', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, ho difficoltà a completare il mio lavoro', 'reversed' => '0',
                'order' => '13',

            ],
            [
                'id' => '102', 'questionnaire_id' => '5', 'text' => 'Quando sono turbato, perdo il controllo',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '103', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, credo che rimarrò in quello stato per molto tempo', 'reversed' => '0',
                'order' => '15',

            ],
            [
                'id' => '104', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, credo che finirò col sentirmi depresso', 'reversed' => '0',
                'order' => '16',

            ],
            [
                'id' => '105', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, credo che i miei sentimenti siano validi e importanti',
                'reversed' => '1', 'order' => '17',

            ],
            [
                'id' => '106', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, faccio fatica a focalizzarmi su altre cose', 'reversed' => '0',
                'order' => '18',

            ],
            [
                'id' => '107', 'questionnaire_id' => '5', 'text' => 'Quando sono turbato, mi sento fuori controllo',
                'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '108', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, posso comunque finire le cose che devo fare', 'reversed' => '1',
                'order' => '20',

            ],
            [
                'id' => '109', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, mi vergogno di me stesso perché mi sento in quel modo',
                'reversed' => '0', 'order' => '21',

            ],
            [
                'id' => '110', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, so che alla fine riesco a trovare un modo per sentirmi meglio',
                'reversed' => '1', 'order' => '22',

            ],
            [
                'id' => '111', 'questionnaire_id' => '5', 'text' => 'Quando sono turbato, mi sento debole',
                'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '112', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, sento di potere avere ancora il controllo dei miei comportamenti',
                'reversed' => '1', 'order' => '24',

            ],
            [
                'id' => '113', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, mi sento in colpa perché mi sento in quel modo', 'reversed' => '0',
                'order' => '25',

            ],
            [
                'id' => '114', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, ho delle difficoltà a concentrarmi', 'reversed' => '0', 'order' => '26',

            ],
            [
                'id' => '115', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, ho delle difficoltà a controllare i miei comportamenti',
                'reversed' => '0', 'order' => '27',

            ],
            [
                'id' => '116', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, credo che non ci sia niente che possa fare per sentirmi meglio',
                'reversed' => '0', 'order' => '28',

            ],
            [
                'id' => '117', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, mi irrito con me stesso perché mi sento in quel modo',
                'reversed' => '0', 'order' => '29',

            ],
            [
                'id' => '118', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, inizio a sentirmi molto male con me stesso', 'reversed' => '0',
                'order' => '30',

            ],
            [
                'id' => '119', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, credo che crogiolarmi in quello stato sia l\'unica cosa che possa fare',
                'reversed' => '0', 'order' => '31',

            ],
            [
                'id' => '120', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, perdo il controllo sui miei comportamenti', 'reversed' => '0',
                'order' => '32',

            ],
            [
                'id' => '121', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, faccio fatica a pensare a qualcosa di diverso', 'reversed' => '0',
                'order' => '33',

            ],
            [
                'id' => '122', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, mi prendo del tempo per riflettere su quello che sto provando veramente',
                'reversed' => '1', 'order' => '34',

            ],
            [
                'id' => '123', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, mi ci vuole molto tempo per sentirmi meglio', 'reversed' => '0',
                'order' => '35',

            ],
            [
                'id' => '124', 'questionnaire_id' => '5',
                'text' => 'Quando sono turbato, sembra che le mie emozioni siano travolgenti', 'reversed' => '0',
                'order' => '36',

            ],
            [
                'id' => '125', 'questionnaire_id' => '6',
                'text' => 'Mangio dolci e carboidrati senza sentirmi nervosa/o.', 'reversed' => '1', 'order' => '1',

            ],
            [
                'id' => '126', 'questionnaire_id' => '6', 'text' => 'Penso che la mia pancia sia troppo grossa.',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '127', 'questionnaire_id' => '6', 'text' => 'Mangio quando sono turbata.', 'reversed' => '0',
                'order' => '3',

            ],
            [
                'id' => '128', 'questionnaire_id' => '6', 'text' => 'Mi rimpinzo di cibo.', 'reversed' => '0',
                'order' => '4',

            ],
            [
                'id' => '129', 'questionnaire_id' => '6', 'text' => 'Penso alla dieta.', 'reversed' => '0',
                'order' => '5',

            ],
            [
                'id' => '130', 'questionnaire_id' => '6', 'text' => 'Penso che le mie cosce siano troppo grosse.',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '131', 'questionnaire_id' => '6',
                'text' => 'Mi sento estremamente colpevole dopo aver mangiato eccessivamente.', 'reversed' => '0',
                'order' => '7',

            ],
            [
                'id' => '132', 'questionnaire_id' => '6',
                'text' => 'Penso che la mia pancia sia proprio delle giuste dimensioni.', 'reversed' => '1',
                'order' => '8',

            ],
            [
                'id' => '133', 'questionnaire_id' => '6', 'text' => 'Sono terrorizzato/a dall’aumentare di peso.',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '134', 'questionnaire_id' => '6', 'text' => 'Mi sento soddisfatto/a della forma del mio corpo.',
                'reversed' => '1', 'order' => '10',

            ],
            [
                'id' => '135', 'questionnaire_id' => '6',
                'text' => 'Esagero o ingigantisco l’importanza del peso corporeo.', 'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '136', 'questionnaire_id' => '6',
                'text' => 'Ho fatto delle abbuffate durante le quali sentivo di non potermi fermare.',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '137', 'questionnaire_id' => '6', 'text' => 'Mi piace la forma del mio sedere.',
                'reversed' => '1', 'order' => '13',

            ],
            [
                'id' => '138', 'questionnaire_id' => '6', 'text' => 'Mi tormenta il desiderio di essere più magra/o.',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '139', 'questionnaire_id' => '6', 'text' => 'Penso alle abbuffate.', 'reversed' => '0',
                'order' => '15',

            ],
            [
                'id' => '140', 'questionnaire_id' => '6', 'text' => 'Penso che i miei fianchi siano troppo grossi.',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '141', 'questionnaire_id' => '6',
                'text' => 'Mangio moderatamente davanti agli altri e poi mi rimpinzo quando sono andati via.',
                'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '142', 'questionnaire_id' => '6',
                'text' => 'Se aumento di mezzo chilo, ho paura che continuerò ad aumentare.', 'reversed' => '0',
                'order' => '18',

            ],
            [
                'id' => '143', 'questionnaire_id' => '6',
                'text' => 'Penso che provo a vomitare allo scopo di perdere peso.', 'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '144', 'questionnaire_id' => '6',
                'text' => 'Penso che le mie cosce siano proprio delle giuste dimensioni.', 'reversed' => '1',
                'order' => '20',

            ],
            [
                'id' => '145', 'questionnaire_id' => '6', 'text' => 'Penso di avere un sedere troppo grande.',
                'reversed' => '0', 'order' => '21',

            ],
            [
                'id' => '146', 'questionnaire_id' => '6', 'text' => 'Mangio e bevo di nascosto.', 'reversed' => '0',
                'order' => '22',

            ],
            [
                'id' => '147', 'questionnaire_id' => '6',
                'text' => 'Penso che i miei fianchi siano proprio delle giuste dimensioni.', 'reversed' => '1',
                'order' => '23',

            ],
            [
                'id' => '148', 'questionnaire_id' => '7',
                'text' => 'L’incertezza non mi permette di avere un’opinione stabile su qualcosa', 'reversed' => '0',
                'order' => '1',

            ],
            [
                'id' => '149', 'questionnaire_id' => '7', 'text' => 'Una persona indecisa è una persona disorganizzata',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '150', 'questionnaire_id' => '7', 'text' => 'L’incertezza rende la vita intollerabile',
                'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '151', 'questionnaire_id' => '7', 'text' => 'Non è giusto che nella vita non ci siano garanzie',
                'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '152', 'questionnaire_id' => '7',
                'text' => 'Non ho pensieri tranquilli se non so che cosa succederà domani', 'reversed' => '0',
                'order' => '5',

            ],
            [
                'id' => '153', 'questionnaire_id' => '7',
                'text' => 'L’incertezza mi mette a disagio, mi rende ansioso/a o stressato/a', 'reversed' => '0',
                'order' => '6',

            ],
            [
                'id' => '154', 'questionnaire_id' => '7', 'text' => 'Gli eventi imprevisti mi turbano fortemente',
                'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '155', 'questionnaire_id' => '7',
                'text' => 'Non avere tutte le informazioni di cui ho bisogno mi rende frustrato/a', 'reversed' => '0',
                'order' => '8',

            ],
            [
                'id' => '156', 'questionnaire_id' => '7',
                'text' => 'Essere incerto/a mi dà la possibilità di prevedere le conseguenze prima che si verifichi un evento prepararmi',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '157', 'questionnaire_id' => '7',
                'text' => 'Bisogna sempre prevedere gli eventi per evitare sorprese', 'reversed' => '0',
                'order' => '10',

            ],
            [
                'id' => '158', 'questionnaire_id' => '7',
                'text' => 'Un piccolo evento non previsto può rovinare tutto, anche se tutto era stato pianificato al meglio',
                'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '159', 'questionnaire_id' => '7', 'text' => 'Al momento di agire, l’incertezza mi paralizza',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '160', 'questionnaire_id' => '7', 'text' => 'Se sono incerto/a non agisco al meglio',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '161', 'questionnaire_id' => '7', 'text' => 'Se sono incerto/a non riesco ad andare avanti',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '162', 'questionnaire_id' => '7',
                'text' => 'Se sono incerto/a non riesco a funzionare molto bene', 'reversed' => '0', 'order' => '15',

            ],
            [
                'id' => '163', 'questionnaire_id' => '7',
                'text' => 'Al contrario di me, sembra che gli altri sappiano sempre a che punto sono nella loro vita',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '164', 'questionnaire_id' => '7',
                'text' => 'L’incertezza mi rende vulnerabile, infelice, o triste', 'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '165', 'questionnaire_id' => '7',
                'text' => 'Voglio sempre sapere che cosa mi riserverà il futuro', 'reversed' => '0', 'order' => '18',

            ],
            [
                'id' => '166', 'questionnaire_id' => '7', 'text' => 'Odio essere colto/a di sorpresa',
                'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '167', 'questionnaire_id' => '7', 'text' => 'Il più piccolo dubbio blocca ogni mia azione',
                'reversed' => '0', 'order' => '20',

            ],
            [
                'id' => '168', 'questionnaire_id' => '7',
                'text' => 'Vorrei essere in grado di pianificare ogni cosa in anticipo', 'reversed' => '0',
                'order' => '21',

            ],
            [
                'id' => '169', 'questionnaire_id' => '7', 'text' => 'Essere incerto/a vuol dire che mi manca sicurezza',
                'reversed' => '0', 'order' => '22',

            ],
            [
                'id' => '170', 'questionnaire_id' => '7',
                'text' => 'Penso che non sia giusto che gli altri sembrino sicuri circa il loro futuro',
                'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '171', 'questionnaire_id' => '7', 'text' => 'L’incertezza non mi permette di dormire bene',
                'reversed' => '0', 'order' => '24',

            ],
            [
                'id' => '172', 'questionnaire_id' => '7', 'text' => 'Mi devo allontanare da situazioni di incertezza',
                'reversed' => '0', 'order' => '25',

            ],
            [
                'id' => '173', 'questionnaire_id' => '7', 'text' => 'Le situazioni ambigue mi stressano',
                'reversed' => '0', 'order' => '26',

            ],
            [
                'id' => '174', 'questionnaire_id' => '7',
                'text' => 'Non riesco a tollerare di essere indeciso/a sul mio futuro', 'reversed' => '0',
                'order' => '27',

            ],
            [
                'id' => '175', 'questionnaire_id' => '8', 'text' => 'Quando fallisco divento molto irritabile',
                'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '176', 'questionnaire_id' => '8', 'text' => 'Avverto un continuo senso di inferiorità',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '177', 'questionnaire_id' => '8',
                'text' => 'Mi sento molto frustrato quando non raggiungo gli obiettivi che ho stabilito per me stesso',
                'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '178', 'questionnaire_id' => '8',
                'text' => 'Sono solitamente a disagio in situazioni sociali nelle quali non so cosa aspettarmi',
                'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '179', 'questionnaire_id' => '8',
                'text' => 'Spesso mi arrabbio molto con me stesso quando fallisco', 'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '180', 'questionnaire_id' => '8',
                'text' => 'Non trascorro molto tempo a preoccuparmi di quello che gli altri potrebbero pensare di me',
                'reversed' => '1', 'order' => '6',

            ],
            [
                'id' => '181', 'questionnaire_id' => '8', 'text' => 'Quando fallisco divento molto turbato',
                'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '182', 'questionnaire_id' => '8',
                'text' => 'Se ti apri co gli altri riguardo alle tue debolezze è probabile che continuino a rispettarti',
                'reversed' => '1', 'order' => '8',

            ],
            [
                'id' => '183', 'questionnaire_id' => '8',
                'text' => 'Il fallimento per me è un\'esperienza molto dolorosa', 'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '184', 'questionnaire_id' => '8',
                'text' => 'Spesso temo che gli altri possano scoprire come sono realmente ed arrabbiarsi con me',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '185', 'questionnaire_id' => '8',
                'text' => 'Non mi preoccupo troppo spesso della possibilità del fallimento', 'reversed' => '1',
                'order' => '11',

            ],
            [
                'id' => '186', 'questionnaire_id' => '8',
                'text' => 'Sono fiducioso del fatto che la maggior parte delle persone a cui tengo mi accetteranno per quello che sono',
                'reversed' => '1', 'order' => '12',

            ],
            [
                'id' => '187', 'questionnaire_id' => '8',
                'text' => 'Quando non riesco in qualcosa inizio a pensare al mio valore come persona',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '188', 'questionnaire_id' => '8',
                'text' => 'Se dai agli altri il beneficio del dubbio probabilmente se ne approfitteranno',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '189', 'questionnaire_id' => '8',
                'text' => 'Mi sento un fallimento quando non faccio le cose bene come vorrei', 'reversed' => '0',
                'order' => '15',

            ],
            [
                'id' => '190', 'questionnaire_id' => '8',
                'text' => 'Solitamente sono a mio agio con le persone che mi chiedono qualcosa su di me',
                'reversed' => '1', 'order' => '16',

            ],
            [
                'id' => '191', 'questionnaire_id' => '8',
                'text' => 'Se fallisco in un\'area ciò riflette quanto io sia scarso come persona', 'reversed' => '0',
                'order' => '17',

            ],
            [
                'id' => '192', 'questionnaire_id' => '8',
                'text' => 'Ho paura che se le persone arrivassero a conoscermi troppo bene potrebbero non rispettarmi',
                'reversed' => '0', 'order' => '18',

            ],
            [
                'id' => '193', 'questionnaire_id' => '8',
                'text' => 'Frequentemente paragono me stesso agli obiettivi e agli ideali che mi sono prefissato',
                'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '194', 'questionnaire_id' => '8', 'text' => 'Raramente mi vergogno di me stesso',
                'reversed' => '1', 'order' => '20',

            ],
            [
                'id' => '195', 'questionnaire_id' => '8',
                'text' => 'Solitamente essere aperti ed onesti è l’unico modo per ottenere il rispetto degli altri',
                'reversed' => '1', 'order' => '21',

            ],
            [
                'id' => '196', 'questionnaire_id' => '8',
                'text' => 'Ci sono volte in cui è necessario essere alquanto disonesti per ottenere quello che si vuole',
                'reversed' => '0', 'order' => '22',

            ],
            [
                'id' => '197', 'questionnaire_id' => '9',
                'text' => 'I miei genitori hanno/avevano aspettative molto alte su di me', 'reversed' => '0',
                'order' => '1',

            ],
            [
                'id' => '198', 'questionnaire_id' => '9', 'text' => 'L’organizzazione è molto importante per me',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '199', 'questionnaire_id' => '9',
                'text' => 'Da bambina/o venivo punito/a se non facevo le cose', 'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '200', 'questionnaire_id' => '9',
                'text' => 'Se non raggiungo il mio massimo livello, è come se finissi per essere una persona di secondo ordine.',
                'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '201', 'questionnaire_id' => '9',
                'text' => 'I miei genitori non hanno mai provato a capire i miei errori', 'reversed' => '0',
                'order' => '5',

            ],
            [
                'id' => '202', 'questionnaire_id' => '9',
                'text' => 'È importante per me essere totalmente competente in ogni cosa che faccio.',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '203', 'questionnaire_id' => '9', 'text' => 'Sono una persona ordinata', 'reversed' => '0',
                'order' => '7',

            ],
            [
                'id' => '204', 'questionnaire_id' => '9', 'text' => 'Cerco di essere una persona organizzata',
                'reversed' => '0', 'order' => '8',

            ],
            [
                'id' => '205', 'questionnaire_id' => '9',
                'text' => 'Se non vado bene a scuola o non riesco nel lavoro, sono una persona fallita.',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '206', 'questionnaire_id' => '9', 'text' => 'Se facessi un errore, ci rimarrei male.',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '207', 'questionnaire_id' => '9',
                'text' => 'I miei genitori desiderano/avano che io fossi il/la migliore in ogni cosa',
                'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '208', 'questionnaire_id' => '9',
                'text' => 'Mi pongo obiettivi più alti della maggior parte delle persone.', 'reversed' => '0',
                'order' => '12',

            ],
            [
                'id' => '209', 'questionnaire_id' => '9',
                'text' => 'Se qualcuno svolge un compito a scuola o al lavoro meglio di me mi sento come se avessi sbagliato completamente il mio compito.',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '210', 'questionnaire_id' => '9',
                'text' => 'Se faccio in parte male una cosa, mi sento a disagio come se l\'avessi sbagliata del tutto.',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '211', 'questionnaire_id' => '9',
                'text' => 'Solo risultati eccezionali vengono/venivano considerati sufficienti dalla mia famiglia',
                'reversed' => '0', 'order' => '15',

            ],
            [
                'id' => '212', 'questionnaire_id' => '9',
                'text' => 'Sono molto brava/o a focalizzare i miei sforzi nel raggiungimento di un obiettivo.',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '213', 'questionnaire_id' => '9',
                'text' => 'Anche quando faccio qualcosa con molta attenzione, ho spesso la sensazione che non sia del tutto fatta bene',
                'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '214', 'questionnaire_id' => '9',
                'text' => 'Non sopporto di non essere il/la migliore in ogni cosa.', 'reversed' => '0', 'order' => '18',

            ],
            [
                'id' => '215', 'questionnaire_id' => '9', 'text' => 'Ho obiettivi estremamente elevati.',
                'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '216', 'questionnaire_id' => '9',
                'text' => 'I miei genitori si aspettano/avano l’eccellenza da me', 'reversed' => '0', 'order' => '20',

            ],
            [
                'id' => '217', 'questionnaire_id' => '9',
                'text' => 'Se facessi un errore, probabilmente gli altri penserebbero che io valgo meno.',
                'reversed' => '0', 'order' => '21',

            ],
            [
                'id' => '218', 'questionnaire_id' => '9',
                'text' => 'Non ho mai sentito che avrei potuto soddisfare le aspettative dei miei genitori',
                'reversed' => '0', 'order' => '22',

            ],
            [
                'id' => '219', 'questionnaire_id' => '9',
                'text' => 'Se non faccio le cose bene come gli altri, allora vuol dire che sono inferiore agli altri.',
                'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '220', 'questionnaire_id' => '9',
                'text' => 'Mi sembra che gli altri accettino per se stessi obiettivi più bassi dei miei.',
                'reversed' => '0', 'order' => '24',

            ],
            [
                'id' => '221', 'questionnaire_id' => '9',
                'text' => 'Se non facessi sempre tutto bene, gli altri non mi rispetterebbero.', 'reversed' => '0',
                'order' => '25',

            ],
            [
                'id' => '222', 'questionnaire_id' => '9',
                'text' => 'I miei genitori hanno sempre avuto sul mio futuro aspettative più elevate delle mie',
                'reversed' => '0', 'order' => '26',

            ],
            [
                'id' => '223', 'questionnaire_id' => '9', 'text' => 'Cerco di essere una persona ordinata',
                'reversed' => '0', 'order' => '27',

            ],
            [
                'id' => '224', 'questionnaire_id' => '9',
                'text' => 'Di solito ho dei dubbi sulle cose semplici che faccio ogni giorno', 'reversed' => '0',
                'order' => '28',

            ],
            [
                'id' => '225', 'questionnaire_id' => '9', 'text' => 'L’ordine per me è molto importante',
                'reversed' => '0', 'order' => '29',

            ],
            [
                'id' => '226', 'questionnaire_id' => '9',
                'text' => 'Nelle situazioni quotidiane pretendo da me stessa/o risultati più elevati rispetto alla maggior parte delle persone.',
                'reversed' => '0', 'order' => '30',

            ],
            [
                'id' => '227', 'questionnaire_id' => '9', 'text' => 'Sono una persona organizzata', 'reversed' => '0',
                'order' => '31',

            ],
            [
                'id' => '228', 'questionnaire_id' => '9',
                'text' => 'Tendo a rimanere indietro nel mio lavoro perché ripeto le cose molte, molte volte',
                'reversed' => '0', 'order' => '32',

            ],
            [
                'id' => '229', 'questionnaire_id' => '9',
                'text' => 'Impiego molto tempo per fare qualcosa nella maniera giusta', 'reversed' => '0',
                'order' => '33',

            ],
            [
                'id' => '230', 'questionnaire_id' => '9', 'text' => 'Meno errori faccio, più piacerò agli altri.',
                'reversed' => '0', 'order' => '34',

            ],
            [
                'id' => '231', 'questionnaire_id' => '9',
                'text' => 'Non ho mai sentito di poter raggiungere i livelli pretesi dai miei genitori',
                'reversed' => '0', 'order' => '35',

            ],
            [
                'id' => '232', 'questionnaire_id' => '10', 'text' => 'Preoccuparmi aiuta a evitare problemi in futuro.',
                'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '233', 'questionnaire_id' => '10', 'text' => 'Preoccuparsi troppo è dannoso.',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '234', 'questionnaire_id' => '10', 'text' => 'Mi soffermo molto sui miei pensieri.',
                'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '235', 'questionnaire_id' => '10', 'text' => 'Rischio di ammalarmi perché mi preoccupo troppo.',
                'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '236', 'questionnaire_id' => '10',
                'text' => 'Sono consapevole di come lavora la mia mente quando rifletto su un problema.',
                'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '237', 'questionnaire_id' => '10',
                'text' => 'Se ho un pensiero negativo sul futuro, non faccio nulla per evitarlo e questo pensiero si realizza, mi attribuisco la colpa.',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '238', 'questionnaire_id' => '10', 'text' => 'Ho bisogno di preoccuparmi per organizzarmi.',
                'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '239', 'questionnaire_id' => '10',
                'text' => 'Ho poca fiducia nella mia capacità di ricordare parole e nomi.', 'reversed' => '0',
                'order' => '8',

            ],
            [
                'id' => '240', 'questionnaire_id' => '10',
                'text' => 'I miei pensieri negativi rimangono anche se cerco di liberarmene.', 'reversed' => '0',
                'order' => '9',

            ],
            [
                'id' => '241', 'questionnaire_id' => '10', 'text' => 'Preoccuparmi è utile per trovare soluzioni.',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '242', 'questionnaire_id' => '10', 'text' => 'Non posso ignorare le mie preoccupazioni.',
                'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '243', 'questionnaire_id' => '10', 'text' => 'Controllo attentamente i miei pensieri.',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '244', 'questionnaire_id' => '10',
                'text' => 'Devo avere sempre il controllo dei miei pensieri.', 'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '245', 'questionnaire_id' => '10', 'text' => 'Talvolta la mia memoria mi inganna.',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '246', 'questionnaire_id' => '10', 'text' => 'Preoccuparsi può farmi diventare pazzo.',
                'reversed' => '0', 'order' => '15',

            ],
            [
                'id' => '247', 'questionnaire_id' => '10', 'text' => 'Sono sempre attento a cosa sto pensando.',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '248', 'questionnaire_id' => '10', 'text' => 'Ho poca memoria.', 'reversed' => '0',
                'order' => '17',

            ],
            [
                'id' => '249', 'questionnaire_id' => '10',
                'text' => 'Dedico molta attenzione al modo in cui la mia mente lavora.', 'reversed' => '0',
                'order' => '18',

            ],
            [
                'id' => '250', 'questionnaire_id' => '10', 'text' => 'Preoccuparmi aiuta ad affrontare le difficoltà.',
                'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '251', 'questionnaire_id' => '10',
                'text' => 'Non riuscire a controllare i propri pensieri è segno di debolezza.', 'reversed' => '0',
                'order' => '20',

            ],
            [
                'id' => '252', 'questionnaire_id' => '10',
                'text' => 'Quando comincio a preoccuparmi di qualcosa non riesco più a smettere.', 'reversed' => '0',
                'order' => '21',

            ],
            [
                'id' => '253', 'questionnaire_id' => '10',
                'text' => 'Verrò punito se non riuscirò a eliminare certi pensieri.', 'reversed' => '0',
                'order' => '22',

            ],
            [
                'id' => '254', 'questionnaire_id' => '10', 'text' => 'Preoccuparmi aiuta a risolvere i problemi.',
                'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '255', 'questionnaire_id' => '10',
                'text' => 'Non ho molta fiducia nella mia capacità di ricordare luoghi.', 'reversed' => '0',
                'order' => '24',

            ],
            [
                'id' => '256', 'questionnaire_id' => '10', 'text' => 'È male avere certi pensieri.', 'reversed' => '0',
                'order' => '25',

            ],
            [
                'id' => '257', 'questionnaire_id' => '10', 'text' => 'Non ho fiducia nella mia memoria.',
                'reversed' => '0', 'order' => '26',

            ],
            [
                'id' => '258', 'questionnaire_id' => '10',
                'text' => 'Se non controllo i pensieri, non riesco a controllare il mio comportamento',
                'reversed' => '0', 'order' => '27',

            ],
            [
                'id' => '259', 'questionnaire_id' => '10', 'text' => 'Ho bisogno di preoccuparmi per lavorare meglio.',
                'reversed' => '0', 'order' => '28',

            ],
            [
                'id' => '260', 'questionnaire_id' => '10',
                'text' => 'Ho poca fiducia nella mia capacità di ricordare cosa ho fatto.', 'reversed' => '0',
                'order' => '29',

            ],
            [
                'id' => '261', 'questionnaire_id' => '10', 'text' => 'Rifletto per capire come mai ho certi pensieri.',
                'reversed' => '0', 'order' => '30',

            ],
            [
                'id' => '262', 'questionnaire_id' => '11', 'text' => 'Vado d’accordo con gli altri.', 'reversed' => '1',
                'order' => '1',

            ],
            [
                'id' => '263', 'questionnaire_id' => '11', 'text' => 'Mi stanco subito.', 'reversed' => '0',
                'order' => '2',

            ],
            [
                'id' => '264', 'questionnaire_id' => '11', 'text' => 'Nulla mi interessa.', 'reversed' => '0',
                'order' => '3',

            ],
            [
                'id' => '265', 'questionnaire_id' => '11', 'text' => 'Mi sento stressata/o sul lavoro o a scuola.',
                'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '266', 'questionnaire_id' => '11', 'text' => 'Mi do la colpa di quello che succede.',
                'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '267', 'questionnaire_id' => '11', 'text' => 'Sono irritata/o.', 'reversed' => '0',
                'order' => '6',

            ],
            [
                'id' => '268', 'questionnaire_id' => '11',
                'text' => 'Sono scontenta/o del mio matrimonio o rapporto di coppia. (se non ha rapporti scelga MAI).',
                'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '269', 'questionnaire_id' => '11', 'text' => 'Ho pensato di farla finita.', 'reversed' => '0',
                'order' => '8',

            ],
            [
                'id' => '270', 'questionnaire_id' => '11', 'text' => 'Mi sento debole.', 'reversed' => '0',
                'order' => '9',

            ],
            [
                'id' => '271', 'questionnaire_id' => '11', 'text' => 'Sono impaurita/o.', 'reversed' => '0',
                'order' => '10',

            ],
            [
                'id' => '272', 'questionnaire_id' => '11',
                'text' => 'Quando bevo troppo, la mattina dopo devo bermi un bicchiere solo per mettermi in moto. (se non beve scelga MAI)',
                'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '273', 'questionnaire_id' => '11', 'text' => 'Sono soddisfatta/o del lavoro o della scuola.',
                'reversed' => '1', 'order' => '12',

            ],
            [
                'id' => '274', 'questionnaire_id' => '11', 'text' => 'Sono felice.', 'reversed' => '1', 'order' => '13',

            ],
            [
                'id' => '275', 'questionnaire_id' => '11', 'text' => 'Lavoro o studio troppo.', 'reversed' => '0',
                'order' => '14',

            ],
            [
                'id' => '276', 'questionnaire_id' => '11', 'text' => 'Non valgo nulla.', 'reversed' => '0',
                'order' => '15',

            ],
            [
                'id' => '277', 'questionnaire_id' => '11', 'text' => 'La mia famiglia mi dà preoccupazione.',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '278', 'questionnaire_id' => '11', 'text' => 'Ho una vita sessuale insoddisfacente.',
                'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '279', 'questionnaire_id' => '11', 'text' => 'Mi sento sola/o.', 'reversed' => '0',
                'order' => '18',

            ],
            [
                'id' => '280', 'questionnaire_id' => '11', 'text' => 'Litigo spesso.', 'reversed' => '0',
                'order' => '19',

            ],
            [
                'id' => '281', 'questionnaire_id' => '11', 'text' => 'Sono amata/o e ben accolta/o.', 'reversed' => '1',
                'order' => '20',

            ],
            [
                'id' => '282', 'questionnaire_id' => '11', 'text' => 'Mi godo il tempo libero.', 'reversed' => '1',
                'order' => '21',

            ],
            [
                'id' => '283', 'questionnaire_id' => '11', 'text' => 'Faccio fatica a concentrarmi.', 'reversed' => '0',
                'order' => '22',

            ],
            [
                'id' => '284', 'questionnaire_id' => '11', 'text' => 'Non nutro speranze per il futuro.',
                'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '285', 'questionnaire_id' => '11', 'text' => 'Mi piaccio.', 'reversed' => '1', 'order' => '24',

            ],
            [
                'id' => '286', 'questionnaire_id' => '11',
                'text' => 'Non riesco a scacciare i pensieri che mi turbano.', 'reversed' => '0', 'order' => '25',

            ],
            [
                'id' => '287', 'questionnaire_id' => '11',
                'text' => 'Sono stufo della gente che mi critica perché bevo o prendo droghe (se non applicabile scelga MAI).',
                'reversed' => '0', 'order' => '26',

            ],
            [
                'id' => '288', 'questionnaire_id' => '11', 'text' => 'Digerisco male.', 'reversed' => '0',
                'order' => '27',

            ],
            [
                'id' => '289', 'questionnaire_id' => '11', 'text' => 'Non lavoro o studio come ero abituato prima.',
                'reversed' => '0', 'order' => '28',

            ],
            [
                'id' => '290', 'questionnaire_id' => '11', 'text' => 'Ho il cuore in gola.', 'reversed' => '0',
                'order' => '29',

            ],
            [
                'id' => '291', 'questionnaire_id' => '11',
                'text' => 'Faccio fatica ad andare d\'accordo con amici e conoscenti.', 'reversed' => '0',
                'order' => '30',

            ],
            [
                'id' => '292', 'questionnaire_id' => '11', 'text' => 'Sono contenta della vita.', 'reversed' => '1',
                'order' => '31',

            ],
            [
                'id' => '293', 'questionnaire_id' => '11',
                'text' => 'Sono finito nei guai a scuola o sul lavoro perché bevo (o prendo droghe). (se non è applicabile scelga MAI).',
                'reversed' => '0', 'order' => '32',

            ],
            [
                'id' => '294', 'questionnaire_id' => '11', 'text' => 'Sta per succedermi qualcosa di brutto.',
                'reversed' => '0', 'order' => '33',

            ],
            [
                'id' => '295', 'questionnaire_id' => '11', 'text' => 'Mi fanno male i muscoli.', 'reversed' => '0',
                'order' => '34',

            ],
            [
                'id' => '296', 'questionnaire_id' => '11',
                'text' => 'Ho paura degli spazi aperti, di guidare, di andare in autobus, in metropolitana, etc.',
                'reversed' => '0', 'order' => '35',

            ],
            [
                'id' => '297', 'questionnaire_id' => '11', 'text' => 'Sono nervoso.', 'reversed' => '0',
                'order' => '36',

            ],
            [
                'id' => '298', 'questionnaire_id' => '11',
                'text' => 'I miei rapporti amorosi sono del tutto soddisfacenti.', 'reversed' => '1', 'order' => '37',

            ],
            [
                'id' => '299', 'questionnaire_id' => '11', 'text' => 'Non mi pare di fare bene a scuola o sul lavoro.',
                'reversed' => '0', 'order' => '38',

            ],
            [
                'id' => '300', 'questionnaire_id' => '11', 'text' => 'Sono troppo in disaccordo sul lavoro o a scuola.',
                'reversed' => '0', 'order' => '39',

            ],
            [
                'id' => '301', 'questionnaire_id' => '11', 'text' => 'C\'è qualcosa di sbagliato con la mia testa.',
                'reversed' => '0', 'order' => '40',

            ],
            [
                'id' => '302', 'questionnaire_id' => '11',
                'text' => 'Faccio fatica ad addormentarmi o a restare addormentato.', 'reversed' => '0',
                'order' => '41',

            ],
            [
                'id' => '303', 'questionnaire_id' => '11', 'text' => 'Sono triste.', 'reversed' => '0', 'order' => '42',

            ],
            [
                'id' => '304', 'questionnaire_id' => '11',
                'text' => 'Sono soddisfatto dei miei rapporti con gli altri.', 'reversed' => '1', 'order' => '43',

            ],
            [
                'id' => '305', 'questionnaire_id' => '11',
                'text' => 'Sono così furioso a scuola o sul lavoro da commettere atti irreparabili.', 'reversed' => '0',
                'order' => '44',

            ],
            [
                'id' => '306', 'questionnaire_id' => '11', 'text' => 'Ho mal di testa.', 'reversed' => '0',
                'order' => '45',

            ],
            [
                'id' => '307', 'questionnaire_id' => '12',
                'text' => 'Mi pare che le mie mani siano sporche quando tocco il denaro.', 'reversed' => '0',
                'order' => '1',

            ],
            [
                'id' => '308', 'questionnaire_id' => '12',
                'text' => 'Penso che anche il contatto più leggero con secrezioni corporee (saliva, urina, fiato, ecc.) possa contaminare i miei vestiti e farmi del male.',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '309', 'questionnaire_id' => '12',
                'text' => 'Trovo difficile toccare un oggetto quando so che è stato toccato da uno straniero o da particolari persone.',
                'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '310', 'questionnaire_id' => '12',
                'text' => 'Trovo difficile toccare dei rifiuti o oggetti sporchi.', 'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '311', 'questionnaire_id' => '12',
                'text' => 'Evito di usare i bagni pubblici perché temo le malattie o la contaminazione.',
                'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '312', 'questionnaire_id' => '12',
                'text' => 'Evito di usare telefoni pubblici perché temo il contagio o le malattie.', 'reversed' => '0',
                'order' => '6',

            ],
            [
                'id' => '313', 'questionnaire_id' => '12',
                'text' => 'Lavo le mani più spesso e più a lungo del necessario.', 'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '314', 'questionnaire_id' => '12',
                'text' => 'Qualche volta mi devo lavare o pulire semplicemente perché penso che potrei essere sporco o “contaminato”.',
                'reversed' => '0', 'order' => '8',

            ],
            [
                'id' => '315', 'questionnaire_id' => '12',
                'text' => 'Quando tocco qualcosa che penso che sia “contaminato” devo immediatamente lavarmi o pulirmi.',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '316', 'questionnaire_id' => '12',
                'text' => 'Se un animale mi tocca, mi sento sporco e devo immediatamente lavarmi o cambiare i vestiti.',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '317', 'questionnaire_id' => '12',
                'text' => 'Mi sento costretto a seguire un particolare ordine quando mi vesto, mi svesto e mi lavo.',
                'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '318', 'questionnaire_id' => '12',
                'text' => 'Prima di andare a dormire, devo pensare a determinate cose in un certo ordine.',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '319', 'questionnaire_id' => '12',
                'text' => 'Prima di entrare nel letto, devo appendere o mettere in ordine i miei vestiti in un modo particolare.',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '320', 'questionnaire_id' => '12',
                'text' => 'Devo fare le stesse cose più volte prima di pensare che siano fatte correttamente.',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '321', 'questionnaire_id' => '12',
                'text' => 'Tendo a continuare a controllare le cose più del necessario.', 'reversed' => '0',
                'order' => '15',

            ],
            [
                'id' => '322', 'questionnaire_id' => '12',
                'text' => 'Controllo e ricontrollo i rubinetti/interruttori del gas, dell’acqua e della luce dopo averli chiusi.',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '323', 'questionnaire_id' => '12',
                'text' => 'Torno a casa a controllare porte, finestre, armadi, ecc. per assicurarmi che siano chiusi correttamente.',
                'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '324', 'questionnaire_id' => '12',
                'text' => 'Continuo a controllare dettagliatamente schede, documenti, assegni, ecc. per essere sicuro di averli compilati correttamente.',
                'reversed' => '0', 'order' => '18',

            ],
            [
                'id' => '325', 'questionnaire_id' => '12',
                'text' => 'Continuo ad andare a controllare che fiammiferi, sigarette, ecc. siano spenti.',
                'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '326', 'questionnaire_id' => '12',
                'text' => 'Quando maneggio denaro lo conto e riconto più volte.', 'reversed' => '0', 'order' => '20',

            ],
            [
                'id' => '327', 'questionnaire_id' => '12',
                'text' => 'Controllo più volte e attentamente le lettere prima di inviarle.', 'reversed' => '0',
                'order' => '21',

            ],
            [
                'id' => '328', 'questionnaire_id' => '12',
                'text' => 'A volte non sono sicuro di aver fatto certe cose, quando in realtà so di averle fatte.',
                'reversed' => '0', 'order' => '22',

            ],
            [
                'id' => '329', 'questionnaire_id' => '12',
                'text' => 'Quando leggo, ho l’impressione di aver saltato qualcosa di importante e devo tornare indietro e rileggermi il passaggio almeno due o tre volte.',
                'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '330', 'questionnaire_id' => '12',
                'text' => 'Mi immagino conseguenze catastrofiche come risultato di momenti di distrazione e piccoli errori che commetto.',
                'reversed' => '0', 'order' => '24',

            ],
            [
                'id' => '331', 'questionnaire_id' => '12',
                'text' => 'Penso o rimugino a lungo riguardo l\'aver fatto male a qualcuno senza saperlo.',
                'reversed' => '0', 'order' => '25',

            ],
            [
                'id' => '332', 'questionnaire_id' => '12',
                'text' => 'Quando sento parlare di un disastro, penso che in qualche modo sia colpa mia.',
                'reversed' => '0', 'order' => '26',

            ],
            [
                'id' => '333', 'questionnaire_id' => '12',
                'text' => 'Qualche volta mi preoccupo a lungo e senza alcuna ragione di essermi fatto del male o di avere una malattia.',
                'reversed' => '0', 'order' => '27',

            ],
            [
                'id' => '334', 'questionnaire_id' => '12',
                'text' => 'Divento agitato e preoccupato alla vista di coltelli, pugnali, e altri oggetti appuntiti.',
                'reversed' => '0', 'order' => '28',

            ],
            [
                'id' => '335', 'questionnaire_id' => '12',
                'text' => 'Quando sento parlare di un suicidio o di un crimine mi agito per un lungo periodo e trovo difficile smettere di pensarci.',
                'reversed' => '0', 'order' => '29',

            ],
            [
                'id' => '336', 'questionnaire_id' => '12',
                'text' => 'Mi invento inutili preoccupazioni riguardanti germi e malattie.', 'reversed' => '0',
                'order' => '30',

            ],
            [
                'id' => '337', 'questionnaire_id' => '12',
                'text' => 'Quando guardo in basso da un ponte o una finestra molto elevata sento l’impulso di lanciarmi nel vuoto.',
                'reversed' => '0', 'order' => '31',

            ],
            [
                'id' => '338', 'questionnaire_id' => '12',
                'text' => 'Quando vedo arrivare un treno a volte penso che potrei gettarmi sotto le ruote.',
                'reversed' => '0', 'order' => '32',

            ],
            [
                'id' => '339', 'questionnaire_id' => '12',
                'text' => 'In certi momenti mi viene la tentazione di spogliarmi in pubblico.', 'reversed' => '0',
                'order' => '33',

            ],
            [
                'id' => '340', 'questionnaire_id' => '12',
                'text' => 'Mentre guido, a volte sento l’impulso di dirigere l’auto contro qualcuno o qualcosa.',
                'reversed' => '0', 'order' => '34',

            ],
            [
                'id' => '341', 'questionnaire_id' => '12',
                'text' => 'Vedere delle armi mi eccita e mi fa venire in mente pensieri violenti.', 'reversed' => '0',
                'order' => '35',

            ],
            [
                'id' => '342', 'questionnaire_id' => '12',
                'text' => 'A volte sento il bisogno di rompere o danneggiare oggetti senza alcuna ragione.',
                'reversed' => '0', 'order' => '36',

            ],
            [
                'id' => '343', 'questionnaire_id' => '12',
                'text' => 'A volte ho l’impulso di rubare le cose degli altri perfino se non mi sono di alcuna utilità.',
                'reversed' => '0', 'order' => '37',

            ],
            [
                'id' => '344', 'questionnaire_id' => '12',
                'text' => 'A volte provo una tentazione quasi irresistibile di rubare qualcosa al supermercato.',
                'reversed' => '0', 'order' => '38',

            ],
            [
                'id' => '345', 'questionnaire_id' => '12',
                'text' => 'A volte ho l’impulso di far del male a bambini e animali indifesi.', 'reversed' => '0',
                'order' => '39',

            ],
            [
                'id' => '346', 'questionnaire_id' => '13',
                'text' => 'Se non ho tempo di fare tutto, non me ne preoccupo', 'reversed' => '1', 'order' => '1',

            ],
            [
                'id' => '347', 'questionnaire_id' => '13', 'text' => 'Le mie preoccupazioni mi opprimono',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '348', 'questionnaire_id' => '13', 'text' => 'Non tendo a preoccuparmi delle cose',
                'reversed' => '1', 'order' => '3',

            ],
            [
                'id' => '349', 'questionnaire_id' => '13', 'text' => 'Molte situazioni mi preoccupano',
                'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '350', 'questionnaire_id' => '13',
                'text' => 'So che non dovrei preoccuparmi delle cose, ma non posso proprio farci niente',
                'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '351', 'questionnaire_id' => '13',
                'text' => 'Quando sono sotto pressione, mi preoccupo parecchio', 'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '352', 'questionnaire_id' => '13', 'text' => 'Sono sempre preoccupato per qualcosa',
                'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '353', 'questionnaire_id' => '13',
                'text' => 'Riesco facilmente ad allontanare le preoccupazioni dalla testa', 'reversed' => '1',
                'order' => '8',

            ],
            [
                'id' => '354', 'questionnaire_id' => '13',
                'text' => 'Non appena ho terminato un compito, incomincio a preoccuparmi per tutte le altre cose che ho da fare',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '355', 'questionnaire_id' => '13', 'text' => 'Non mi preoccupo mai di alcunché',
                'reversed' => '1', 'order' => '10',

            ],
            [
                'id' => '356', 'questionnaire_id' => '13',
                'text' => 'Quando non posso fare più nulla per risolvere un problema, smetto di preoccuparmi',
                'reversed' => '1', 'order' => '11',

            ],
            [
                'id' => '357', 'questionnaire_id' => '13',
                'text' => 'Per tutta la vita sono stata/o una persona preoccupata', 'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '358', 'questionnaire_id' => '13',
                'text' => 'Mi rendo conto che mi sto preoccupando per le cose', 'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '359', 'questionnaire_id' => '13',
                'text' => 'Una volta che ho iniziato a preoccuparmi, non riesco a smettere', 'reversed' => '0',
                'order' => '14',

            ],
            [
                'id' => '360', 'questionnaire_id' => '13', 'text' => 'Sono continuamente preoccupato/a',
                'reversed' => '0', 'order' => '15',

            ],
            [
                'id' => '361', 'questionnaire_id' => '13',
                'text' => 'Mi preoccupo dei progetti finché non sono completamente realizzati', 'reversed' => '0',
                'order' => '16',

            ],
            [
                'id' => '362', 'questionnaire_id' => '14', 'text' => 'Eventi inaspettati mi hanno sconvolto',
                'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '363', 'questionnaire_id' => '14',
                'text' => 'Non sono stato capace di controllare cose importanti verificatesi durante il corso della giornata',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '364', 'questionnaire_id' => '14',
                'text' => 'Mi sono sentito particolarmente nervoso e “stressato”', 'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '365', 'questionnaire_id' => '14', 'text' => 'Sono stato capace di gestire un problema',
                'reversed' => '1', 'order' => '4',

            ],
            [
                'id' => '366', 'questionnaire_id' => '14', 'text' => 'Sapevo di fare la cosa giusta', 'reversed' => '1',
                'order' => '5',

            ],
            [
                'id' => '367', 'questionnaire_id' => '14',
                'text' => 'Ho avuto la sensazione di non riuscire a star dietro a tutte le cose che dovevo fare',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '368', 'questionnaire_id' => '14', 'text' => 'Ero in grado di controllare la mia irritabilità',
                'reversed' => '1', 'order' => '7',

            ],
            [
                'id' => '369', 'questionnaire_id' => '14', 'text' => 'Mi controllavo in tutte le situazioni',
                'reversed' => '1', 'order' => '8',

            ],
            [
                'id' => '370', 'questionnaire_id' => '14',
                'text' => 'Mi sono arrabbiato perché non riuscivo a controllare le cose', 'reversed' => '0',
                'order' => '9',

            ],
            [
                'id' => '371', 'questionnaire_id' => '14',
                'text' => 'Mi sono sentito in difficoltà nell’affrontare cose difficili', 'reversed' => '0',
                'order' => '10',

            ],
            [
                'id' => '372', 'questionnaire_id' => '15',
                'text' => 'Spesso mi sento responsabile delle cose che vanno male.', 'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '373', 'questionnaire_id' => '15',
                'text' => 'Se non agisco quando credo di essere in pericolo, mi biasimo per tutte le conseguenze che potrebbero verificarsi.',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '374', 'questionnaire_id' => '15',
                'text' => 'Sono così sensibile che mi sento responsabile delle cose che vanno male.', 'reversed' => '0',
                'order' => '3',

            ],
            [
                'id' => '375', 'questionnaire_id' => '15',
                'text' => 'Se penso cose cattive è un male come se facessi cose cattive.', 'reversed' => '0',
                'order' => '4',

            ],
            [
                'id' => '376', 'questionnaire_id' => '15',
                'text' => 'Mi preoccupo molto delle conseguenze di ciò che faccio o non faccio.', 'reversed' => '0',
                'order' => '5',

            ],
            [
                'id' => '377', 'questionnaire_id' => '15',
                'text' => 'Secondo me non agire per prevenire un disastro è un male come causare il disastro stesso.',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '378', 'questionnaire_id' => '15',
                'text' => 'Se so che è possibile che si verifichi un danno cerco sempre di prevenirlo, per quanto impossibile possa sembrare.',
                'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '379', 'questionnaire_id' => '15',
                'text' => 'Devo sempre pensare alle conseguenze delle azioni, anche le più piccole.', 'reversed' => '0',
                'order' => '8',

            ],
            [
                'id' => '380', 'questionnaire_id' => '15',
                'text' => 'Spesso mi prendo la responsabilità di colpe che gli altri non mi attribuiscono.',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '381', 'questionnaire_id' => '15', 'text' => 'Ogni cosa che faccio può causare gravi problemi.',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '382', 'questionnaire_id' => '15', 'text' => 'Sono spesso vicino a chi fa danni.',
                'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '383', 'questionnaire_id' => '15', 'text' => 'Devo proteggere gli altri dai torti.',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '384', 'questionnaire_id' => '15',
                'text' => 'Non devo mai fare agli altri neanche il più piccolo torto.', 'reversed' => '0',
                'order' => '13',

            ],
            [
                'id' => '385', 'questionnaire_id' => '15', 'text' => 'Verrò condannato per le mie azioni.',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '386', 'questionnaire_id' => '15',
                'text' => 'Se posso avere anche una minima influenza sulle cose che vanno male, allora devo agire per prevenirle.',
                'reversed' => '0', 'order' => '15',

            ],
            [
                'id' => '387', 'questionnaire_id' => '15',
                'text' => 'Secondo me non agire quando vi è la minima possibilità che un disastro avvenga è male come causare il disastro stesso.',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '388', 'questionnaire_id' => '15',
                'text' => 'Per me, anche una minima trascuratezza è imperdonabile quando può danneggiare gli altri.',
                'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '389', 'questionnaire_id' => '15',
                'text' => 'In ogni tipo di situazione quotidiana la mia inerzia può causare tanti danni come una deliberata cattiva azione.',
                'reversed' => '0', 'order' => '18',

            ],
            [
                'id' => '390', 'questionnaire_id' => '15',
                'text' => 'Anche se il danno è davvero l’unica possibilità cerco sempre di evitarlo a tutti i costi.',
                'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '391', 'questionnaire_id' => '15',
                'text' => 'Quando credo di aver procurato un danno non posso perdonarmelo.', 'reversed' => '0',
                'order' => '20',

            ],
            [
                'id' => '392', 'questionnaire_id' => '15',
                'text' => 'Molte delle mie azioni passate hanno avuto lo scopo di prevenire danni verso gli altri.',
                'reversed' => '0', 'order' => '21',

            ],
            [
                'id' => '393', 'questionnaire_id' => '15',
                'text' => 'Devo essere sicuro che gli altri siano protetti da tutte le conseguenze delle cose che faccio.',
                'reversed' => '0', 'order' => '22',

            ],
            [
                'id' => '394', 'questionnaire_id' => '15', 'text' => 'Gli altri non devono fidarsi del mio giudizio.',
                'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '395', 'questionnaire_id' => '15',
                'text' => 'Se non posso essere infallibile sono degno di rimprovero, sento che devo essere rimproverato.',
                'reversed' => '0', 'order' => '24',

            ],
            [
                'id' => '396', 'questionnaire_id' => '15',
                'text' => 'Se sto sufficientemente attento posso prevenire qualche incidente dannoso.',
                'reversed' => '0', 'order' => '25',

            ],
            [
                'id' => '397', 'questionnaire_id' => '15',
                'text' => 'Spesso penso che accadranno cose negative se non starò abbastanza attento.',
                'reversed' => '0', 'order' => '26',

            ],
            [
                'id' => '398', 'questionnaire_id' => '16', 'text' => 'Pensi a quanto ti senti solo', 'reversed' => '0',
                'order' => '1',

            ],
            [
                'id' => '399', 'questionnaire_id' => '16',
                'text' => 'Pensi: “Non riuscirò a fare il mio lavoro se non mi libero di questo malessere”.',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '400', 'questionnaire_id' => '16',
                'text' => 'Pensi al tuo dolore e alle tue sensazioni di stanchezza e malessere.', 'reversed' => '0',
                'order' => '3',

            ],
            [
                'id' => '401', 'questionnaire_id' => '16', 'text' => 'Pensi a quanto sia difficile concentrarsi.',
                'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '402', 'questionnaire_id' => '16', 'text' => 'Pensi “cosa ho fatto per meritarmi questo?”',
                'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '403', 'questionnaire_id' => '16',
                'text' => 'Pensi a quanto ti senti passivo e privo di motivazione.', 'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '404', 'questionnaire_id' => '16',
                'text' => 'Analizzi gli eventi recenti per provare a capire perché sei depresso.', 'reversed' => '0',
                'order' => '7',

            ],
            [
                'id' => '405', 'questionnaire_id' => '16',
                'text' => 'Pensi al fatto che non ti sembra di sentire più niente.', 'reversed' => '0', 'order' => '8',

            ],
            [
                'id' => '406', 'questionnaire_id' => '16', 'text' => 'Pensi: “Perché non riesco a mettermi in moto?”',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '407', 'questionnaire_id' => '16', 'text' => 'Pensi: “Perché reagisco sempre in questo modo?”',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '408', 'questionnaire_id' => '16',
                'text' => 'Vai via solo/a e pensi al perché ti senti in questo modo.', 'reversed' => '0',
                'order' => '11',

            ],
            [
                'id' => '409', 'questionnaire_id' => '16', 'text' => 'Scrivi cosa stai pensando e lo analizzi.',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '410', 'questionnaire_id' => '16',
                'text' => 'Pensi a una situazione recente, desiderando che fosse andata meglio.', 'reversed' => '0',
                'order' => '13',

            ],
            [
                'id' => '411', 'questionnaire_id' => '16',
                'text' => 'Pensi: “non riuscirò a concentrarmi se continuo a sentirmi in questo modo”.',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '412', 'questionnaire_id' => '16',
                'text' => 'Pensi: “perché io ho problemi che le altre persone non hanno?”.', 'reversed' => '0',
                'order' => '15',

            ],
            [
                'id' => '413', 'questionnaire_id' => '16',
                'text' => 'Pensi “perché non riesco a gestire meglio ciò che mi accade?”.', 'reversed' => '0',
                'order' => '16',

            ],
            [
                'id' => '414', 'questionnaire_id' => '16', 'text' => 'Pensi a quanto ti senti triste.',
                'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '415', 'questionnaire_id' => '16',
                'text' => 'Pensi a tutte le tue manchevolezze, difetti, colpe ed errori.', 'reversed' => '0',
                'order' => '18',

            ],
            [
                'id' => '416', 'questionnaire_id' => '16',
                'text' => 'Pensi al fatto che non ti senti più di fare nulla.', 'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '417', 'questionnaire_id' => '16',
                'text' => 'Analizzi la tua personalità per cercare di capire perché sei depresso/a.', 'reversed' => '0',
                'order' => '20',

            ],
            [
                'id' => '418', 'questionnaire_id' => '16',
                'text' => 'Girovaghi solo in qualche posto per pensare alle tue emozioni.', 'reversed' => '0',
                'order' => '21',

            ],
            [
                'id' => '419', 'questionnaire_id' => '16', 'text' => 'Pensi a quanto sei arrabbiato con te stesso/a.',
                'reversed' => '0', 'order' => '22',

            ],
            [
                'id' => '420', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '421', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '422', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '423', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '424', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '425', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '426', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '427', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '8',

            ],
            [
                'id' => '428', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '429', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '430', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '431', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '432', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '433', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '434', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '15',

            ],
            [
                'id' => '435', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '436', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '437', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '18',

            ],
            [
                'id' => '438', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '439', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '20',

            ],
            [
                'id' => '440', 'questionnaire_id' => '17', 'text' => '', 'reversed' => '0', 'order' => '21',

            ],
            [
                'id' => '455', 'questionnaire_id' => '19', 'text' => 'Mi hanno fatto riflettere', 'reversed' => '0',
                'order' => '1',

            ],
            [
                'id' => '456', 'questionnaire_id' => '19', 'text' => 'Mi hanno Irritata/o', 'reversed' => '0',
                'order' => '2',

            ],
            [
                'id' => '457', 'questionnaire_id' => '19', 'text' => 'Mi hanno stancata/o molto', 'reversed' => '0',
                'order' => '3',

            ],
            [
                'id' => '458', 'questionnaire_id' => '19',
                'text' => 'Credo abbiano individuato degli aspetti importanti di me', 'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '459', 'questionnaire_id' => '19', 'text' => 'Sono troppi', 'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '460', 'questionnaire_id' => '19', 'text' => 'Sono stati nel loro complesso utili',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '461', 'questionnaire_id' => '19', 'text' => 'Mi hanno messo in ansia', 'reversed' => '0',
                'order' => '7',

            ],
            [
                'id' => '462', 'questionnaire_id' => '19', 'text' => 'Non ne ho capito il senso', 'reversed' => '0',
                'order' => '8',

            ],
            [
                'id' => '463', 'questionnaire_id' => '19', 'text' => 'Mi sono sembrati una perdita di tempo',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '464', 'questionnaire_id' => '19', 'text' => 'Sono scritti con un linguaggio comprensibile',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '465', 'questionnaire_id' => '19',
                'text' => 'Compilarli mi ha richiesto un grande sforzo mentale', 'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '466', 'questionnaire_id' => '19', 'text' => 'Mi hanno annoiata/o', 'reversed' => '0',
                'order' => '12',

            ],
            [
                'id' => '467', 'questionnaire_id' => '19',
                'text' => 'Nel complesso quanto è soddisfatta/o del servizio ricevuto fino ad ora in questa struttura?',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '468', 'questionnaire_id' => '19',
                'text' => 'Commenti: inserisca, cliccando sul tasto sottostante eventuali commenti e selezioni poi "Termina"',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '543', 'questionnaire_id' => '22',
                'text' => 'Se potessi scegliere tra qualsiasi persona al mondo, chi inviteresti a cena?',
                'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '544', 'questionnaire_id' => '22', 'text' => 'Vorresti essere famoso? Come?', 'reversed' => '0',
                'order' => '2',

            ],
            [
                'id' => '545', 'questionnaire_id' => '22',
                'text' => 'Prima di fare una telefonata, fai le prove di quello che dirai?', 'reversed' => '0',
                'order' => '3',

            ],
            [
                'id' => '546', 'questionnaire_id' => '22', 'text' => 'Definisci qual è «Il giorno perfetto» per te',
                'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '547', 'questionnaire_id' => '22',
                'text' => 'Qual è l’ultima volta che hai cantato da solo? E per qualcun altro?', 'reversed' => '0',
                'order' => '5',

            ],
            [
                'id' => '548', 'questionnaire_id' => '22',
                'text' => 'Se potessi vivere fino a 90 anni e per gli ultimi 60 anni avere o il corpo o la mente di un trentenne, quale dei due sceglieresti?',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '549', 'questionnaire_id' => '22', 'text' => 'Pensi mai al modo in cui morirai?',
                'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '550', 'questionnaire_id' => '22',
                'text' => 'Tre cose che tu e il tuo partner avete in comune.', 'reversed' => '0', 'order' => '8',

            ],
            [
                'id' => '551', 'questionnaire_id' => '22',
                'text' => 'Qual è la cosa nella tua vita di cui sei più grato?', 'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '552', 'questionnaire_id' => '22',
                'text' => 'Se potessi cambiare qualcosa nel modo in cui sei stato allevato, quale sarebbe?',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '553', 'questionnaire_id' => '22',
                'text' => 'Racconta la storia della tua vita al tuo partner in 4 minuti nel modo più dettagliato possibile.',
                'reversed' => '0', 'order' => '11',

            ],
            [
                'id' => '554', 'questionnaire_id' => '22',
                'text' => 'Se potessi svegliarti domani con una particolare qualità, quale sceglieresti?',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '555', 'questionnaire_id' => '22',
                'text' => 'Se una palla di cristallo potesse dirti la verità su te stesso, sulla tua vita o sul futuro o su qualsiasi altra cosa, che sceglieresti?',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '556', 'questionnaire_id' => '22',
                'text' => 'C’è qualcosa che hai a lungo sognato di fare? Perché non l’hai fatta?', 'reversed' => '0',
                'order' => '14',

            ],
            [
                'id' => '557', 'questionnaire_id' => '22', 'text' => 'Qual è il più gran risultato della tua vita?',
                'reversed' => '0', 'order' => '15',

            ],
            [
                'id' => '558', 'questionnaire_id' => '22', 'text' => 'Per te cosa conta di più in un’amicizia?',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '559', 'questionnaire_id' => '22', 'text' => 'Qual è il tuo ricordo più caro?',
                'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '560', 'questionnaire_id' => '22', 'text' => 'E il più terribile?', 'reversed' => '0',
                'order' => '18',

            ],
            [
                'id' => '561', 'questionnaire_id' => '22',
                'text' => 'Se sapessi che nel giro di un anno morirai cosa cambieresti nella tua vita?',
                'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '562', 'questionnaire_id' => '22', 'text' => 'Cosa significa l’amicizia per te?',
                'reversed' => '0', 'order' => '20',

            ],
            [
                'id' => '563', 'questionnaire_id' => '22', 'text' => 'Che ruolo gioca l’amore nella tua vita?',
                'reversed' => '0', 'order' => '21',

            ],
            [
                'id' => '564', 'questionnaire_id' => '22',
                'text' => 'Condividi con il tuo partner almeno cinque qualità positive reciproche.', 'reversed' => '0',
                'order' => '22',

            ],
            [
                'id' => '565', 'questionnaire_id' => '22',
                'text' => 'Quanto è stata affettuosa la tua famiglia? Ritieni che la tua infanzia sia stata in media più felice delle altre?',
                'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '566', 'questionnaire_id' => '22', 'text' => 'Che rapporto hai con tua madre?',
                'reversed' => '0', 'order' => '24',

            ],
            [
                'id' => '567', 'questionnaire_id' => '22',
                'text' => 'Tu e il tuo partner fate tre affermazioni vere con il «noi». Per esempio: «Siamo entrambi in questa stanza e sentiamo...»',
                'reversed' => '0', 'order' => '25',

            ],
            [
                'id' => '568', 'questionnaire_id' => '22',
                'text' => 'Completa questa frase: «Vorrei aver avuto qualcuno con cui condividere…»', 'reversed' => '0',
                'order' => '26',

            ],
            [
                'id' => '569', 'questionnaire_id' => '22',
                'text' => 'Se tu diventassi amico del tuo partner quale segreto dovrebbe sapere di te?',
                'reversed' => '0', 'order' => '27',

            ],
            [
                'id' => '570', 'questionnaire_id' => '22', 'text' => 'Dì al partner cosa ti piace di lui.',
                'reversed' => '0', 'order' => '28',

            ],
            [
                'id' => '571', 'questionnaire_id' => '22',
                'text' => 'Dividi con il partner un momento imbarazzante nella tua vita.', 'reversed' => '0',
                'order' => '29',

            ],
            [
                'id' => '572', 'questionnaire_id' => '22',
                'text' => 'Quand’è stata l’ultima volta che hai pianto davanti a qualcuno? E da solo?',
                'reversed' => '0', 'order' => '30',

            ],
            [
                'id' => '573', 'questionnaire_id' => '22',
                'text' => 'Sottolinea al tuo partner qualcosa che ti piace particolarmente di lui.', 'reversed' => '0',
                'order' => '31',

            ],
            [
                'id' => '574', 'questionnaire_id' => '22', 'text' => 'Che cosa è troppo serio per scherzarci su?',
                'reversed' => '0', 'order' => '32',

            ],
            [
                'id' => '575', 'questionnaire_id' => '22',
                'text' => 'Se tu dovessi morire questa sera, qual è la cosa che rimpiangi di più di non aver detto a qualcuno?',
                'reversed' => '0', 'order' => '33',

            ],
            [
                'id' => '576', 'questionnaire_id' => '22',
                'text' => 'La tua casa brucia, hai tempo per salvare solo un oggetto, cosa sceglieresti e perché?',
                'reversed' => '0', 'order' => '34',

            ],
            [
                'id' => '577', 'questionnaire_id' => '22',
                'text' => 'Fra tutte le persone della tua famiglia, la morte di chi ti colpirebbe di più?',
                'reversed' => '0', 'order' => '35',

            ],
            [
                'id' => '578', 'questionnaire_id' => '22',
                'text' => 'Condividi un problema personale con il tuo partner e chiedigli aiuto per risolverlo.',
                'reversed' => '0', 'order' => '36',

            ],
            [
                'id' => '579', 'questionnaire_id' => '22', 'text' => 'Adesso, per 4 minuti, guardatevi negli occhi.',
                'reversed' => '0', 'order' => '37',

            ],
            [
                'id' => '580', 'questionnaire_id' => '23', 'text' => 'Intorpidimento o formicolio', 'reversed' => '0',
                'order' => '1',

            ],
            [
                'id' => '581', 'questionnaire_id' => '23', 'text' => 'Vampate di calore', 'reversed' => '0',
                'order' => '2',

            ],
            [
                'id' => '582', 'questionnaire_id' => '23', 'text' => 'Gambe vacillanti', 'reversed' => '0',
                'order' => '3',

            ],
            [
                'id' => '583', 'questionnaire_id' => '23', 'text' => 'Incapacità a rilassarsi', 'reversed' => '0',
                'order' => '4',

            ],
            [
                'id' => '584', 'questionnaire_id' => '23',
                'text' => 'Paura che qualcosa di molto brutto possa accadere', 'reversed' => '0', 'order' => '5',

            ],
            [
                'id' => '585', 'questionnaire_id' => '23', 'text' => 'Vertigini o sensazione di stordimento',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '586', 'questionnaire_id' => '23', 'text' => 'Batticuore', 'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '587', 'questionnaire_id' => '23', 'text' => 'Umore instabile', 'reversed' => '0',
                'order' => '8',

            ],
            [
                'id' => '588', 'questionnaire_id' => '23', 'text' => 'Essere terrorizzati', 'reversed' => '0',
                'order' => '9',

            ],
            [
                'id' => '589', 'questionnaire_id' => '23', 'text' => 'Sentirsi Agitati', 'reversed' => '0',
                'order' => '10',

            ],
            [
                'id' => '590', 'questionnaire_id' => '23', 'text' => 'Sensazione di Soffocamento', 'reversed' => '0',
                'order' => '11',

            ],
            [
                'id' => '591', 'questionnaire_id' => '23', 'text' => 'Mani che tremano', 'reversed' => '0',
                'order' => '12',

            ],
            [
                'id' => '592', 'questionnaire_id' => '23', 'text' => 'Agitazione in tutto il corpo', 'reversed' => '0',
                'order' => '13',

            ],
            [
                'id' => '593', 'questionnaire_id' => '23', 'text' => 'Paura di perdere il controllo', 'reversed' => '0',
                'order' => '14',

            ],
            [
                'id' => '594', 'questionnaire_id' => '23', 'text' => 'Respiro affannoso', 'reversed' => '0',
                'order' => '15',

            ],
            [
                'id' => '595', 'questionnaire_id' => '23', 'text' => 'Paura di morire', 'reversed' => '0',
                'order' => '16',

            ],
            [
                'id' => '596', 'questionnaire_id' => '23', 'text' => 'Sentirsi impauriti', 'reversed' => '0',
                'order' => '17',

            ],
            [
                'id' => '597', 'questionnaire_id' => '23', 'text' => 'Dolori intestinali o di stomaco',
                'reversed' => '0', 'order' => '18',

            ],
            [
                'id' => '598', 'questionnaire_id' => '23', 'text' => 'Sentirsi svenire', 'reversed' => '0',
                'order' => '19',

            ],
            [
                'id' => '599', 'questionnaire_id' => '23', 'text' => 'Sentirsi arrossire', 'reversed' => '0',
                'order' => '20',

            ],
            [
                'id' => '600', 'questionnaire_id' => '23', 'text' => 'Sentirsi sudati (non a causa del calore)',
                'reversed' => '0', 'order' => '21',

            ],
            [
                'id' => '601', 'questionnaire_id' => '24',
                'text' => 'Ha evitato dei lavori o dei compiti che prevedevano che lei avesse a che fare con numerose persone?',
                'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '602', 'questionnaire_id' => '24',
                'text' => 'Evita di fare amicizia con le persone, a meno di non essere sicuro/a di piacere a loro?',
                'reversed' => '0', 'order' => '2',

            ],
            [
                'id' => '603', 'questionnaire_id' => '24',
                'text' => 'Trova difficile essere “aperto/a” anche con le persone con cui è in confidenza?',
                'reversed' => '0', 'order' => '3',

            ],
            [
                'id' => '604', 'questionnaire_id' => '24',
                'text' => 'Si preoccupa spesso di venire criticato/a o rifiutato/a nelle situazioni sociali?',
                'reversed' => '0', 'order' => '4',

            ],
            [
                'id' => '605', 'questionnaire_id' => '24',
                'text' => 'Di solito sta in silenzio quando incontra persone che non conosce?', 'reversed' => '0',
                'order' => '5',

            ],
            [
                'id' => '606', 'questionnaire_id' => '24',
                'text' => 'Pensa di non essere abile, brillante o attraente come la maggior parte delle persone?',
                'reversed' => '0', 'order' => '6',

            ],
            [
                'id' => '607', 'questionnaire_id' => '24',
                'text' => 'Ha paura di provare cose che potrebbero rappresentare una sfida o di provare qualsiasi cosa nuova?',
                'reversed' => '0', 'order' => '7',

            ],
            [
                'id' => '608', 'questionnaire_id' => '24',
                'text' => 'È difficile per lei prendere decisioni quotidiane, per esempio, come vestirsi o cosa ordinare al ristorante, senza i consigli o le rassicurazioni degli altri?',
                'reversed' => '0', 'order' => '8',

            ],
            [
                'id' => '609', 'questionnaire_id' => '24',
                'text' => 'Dipende dalle altre persone per gestire aree importanti della sua vita, come finanze, cura dei figli, o progetti di vita?',
                'reversed' => '0', 'order' => '9',

            ],
            [
                'id' => '610', 'questionnaire_id' => '24',
                'text' => 'Trova difficile esprimere il suo disaccordo alle persone, anche quando pensa che stiano sbagliando?',
                'reversed' => '0', 'order' => '10',

            ],
            [
                'id' => '611', 'questionnaire_id' => '24',
                'text' => 'Trova difficile iniziare dei progetti o fare le cose da solo/a?', 'reversed' => '0',
                'order' => '11',

            ],
            [
                'id' => '612', 'questionnaire_id' => '24',
                'text' => 'Per lei è così importante che gli altri si prendano cura di lei da essere disposto/a a fare delle cose sgradevoli o irrazionali per loro?',
                'reversed' => '0', 'order' => '12',

            ],
            [
                'id' => '613', 'questionnaire_id' => '24', 'text' => 'Di solito si sente a disagio quando è da solo/a',
                'reversed' => '0', 'order' => '13',

            ],
            [
                'id' => '614', 'questionnaire_id' => '24',
                'text' => 'Quando una relazione stretta finisce, sente subito il bisogno di trovare qualcun altro che si prenda cura di lei?',
                'reversed' => '0', 'order' => '14',

            ],
            [
                'id' => '615', 'questionnaire_id' => '24',
                'text' => 'Si preoccupa molto di essere lasciato/a da solo/a a badare a se stesso/a?',
                'reversed' => '0', 'order' => '15',

            ],
            [
                'id' => '616', 'questionnaire_id' => '24',
                'text' => 'È il tipo di persona che si fissa sui dettagli, sull’ordine, e sull’organizzazione e che ama fare elenchi e programmi dettagliati?',
                'reversed' => '0', 'order' => '16',

            ],
            [
                'id' => '617', 'questionnaire_id' => '24',
                'text' => 'Ha problemi a terminare le cose perché impiega troppo tempo nel cercare di farle perfettamente?',
                'reversed' => '0', 'order' => '17',

            ],
            [
                'id' => '618', 'questionnaire_id' => '24',
                'text' => 'È molto dedito/a al suo lavoro o all’essere produttivo/a?', 'reversed' => '0',
                'order' => '18',

            ],
            [
                'id' => '619', 'questionnaire_id' => '24',
                'text' => 'Ha dei parametri molto alti riguardo a ciò che è giusto e ciò che è sbagliato?',
                'reversed' => '0', 'order' => '19',

            ],
            [
                'id' => '620', 'questionnaire_id' => '24',
                'text' => 'Ha dei problemi a buttar via le cose, perché, un giorno potrebbero tornare utili?',
                'reversed' => '0', 'order' => '20',

            ],
            [
                'id' => '621', 'questionnaire_id' => '24',
                'text' => 'È difficile per lavorare con altre persone, o chiedere agli altri di fare delle cose, a meno che non accettino di fare cose esattamente nel modo in cui vuole lei?',
                'reversed' => '0', 'order' => '21',

            ],
            [
                'id' => '622', 'questionnaire_id' => '24',
                'text' => 'È difficile per lei spendere del denaro per sé o per altre persone?', 'reversed' => '0',
                'order' => '22',

            ],
            [
                'id' => '623', 'questionnaire_id' => '24',
                'text' => 'Una volta che ha fatto dei progetti, per lei è difficile apportare dei cambiamenti?',
                'reversed' => '0', 'order' => '23',

            ],
            [
                'id' => '624', 'questionnaire_id' => '24', 'text' => 'Altre persone le hanno detto che è testardo/a?',
                'reversed' => '0', 'order' => '24',

            ],
            [
                'id' => '625', 'questionnaire_id' => '24',
                'text' => 'Ha spesso la sensazione che le persone la stiano usando, danneggiando o che le stiano mentendo?',
                'reversed' => '0', 'order' => '25',

            ],
            [
                'id' => '626', 'questionnaire_id' => '24',
                'text' => 'È una persona molto riservata, che raramente si confida con le altre persone?',
                'reversed' => '0', 'order' => '26',

            ],
            [
                'id' => '627', 'questionnaire_id' => '24',
                'text' => 'Pensa che sia meglio fare in modo che le persone non sappiano troppo di lei perché potrebbero usarlo contro di lei?',
                'reversed' => '0', 'order' => '27',

            ],
            [
                'id' => '628', 'questionnaire_id' => '24',
                'text' => 'Ha spesso la sensazione che le altre persone la stiano minacciando o insultando per via delle cose che dicono o fanno?',
                'reversed' => '0', 'order' => '28',

            ],
            [
                'id' => '629', 'questionnaire_id' => '24',
                'text' => 'Lei è qul tipo di persona che porta rancore o impiega molto tempo per perdonare le persone che l’hanno insultata o offesa?',
                'reversed' => '0', 'order' => '29',

            ],
            [
                'id' => '630', 'questionnaire_id' => '24',
                'text' => 'Ci sono molte persone che lei non può perdonare perché le hanno fatto o detto qualcosa molto tempo fa?',
                'reversed' => '0', 'order' => '30',

            ],
            [
                'id' => '631', 'questionnaire_id' => '24',
                'text' => 'Spesso si arrabbia o attacca violentemente chi la critica o la offende in qualche modo?',
                'reversed' => '0', 'order' => '31',

            ],
            [
                'id' => '632', 'questionnaire_id' => '24',
                'text' => 'Ha sospettato spesso che il suo coniuge o partner le sia stato infedele?', 'reversed' => '0',
                'order' => '32',

            ],
            [
                'id' => '633', 'questionnaire_id' => '24',
                'text' => 'Quando si trova in pubblico e vede delle persone che parlano, spesso pensa che stiano parlando di lei?',
                'reversed' => '0', 'order' => '33',

            ],
            [
                'id' => '634', 'questionnaire_id' => '24',
                'text' => 'Quando è in mezzo alla gente, ha spesso la sensazione che la stiano osservando o fissando?',
                'reversed' => '0', 'order' => '34',

            ],
            [
                'id' => '635', 'questionnaire_id' => '24',
                'text' => 'Ha spesso la sensazione che le parole di una canzone o qualcosa in un film p in TV abbiano un significato speciale rivolto a lei in particolare?',
                'reversed' => '0', 'order' => '35',

            ],
            [
                'id' => '636', 'questionnaire_id' => '24', 'text' => 'È una persona superstiziosa?', 'reversed' => '0',
                'order' => '36',

            ],
            [
                'id' => '637', 'questionnaire_id' => '24',
                'text' => 'Ha mai ritenuto di poter fare avvenire delle cose semplicemente esprimendo un desiderio o pensandoci?',
                'reversed' => '0', 'order' => '37',

            ],
            [
                'id' => '638', 'questionnaire_id' => '24',
                'text' => 'Ha avuto esperienze personali con il soprannaturale?', 'reversed' => '0', 'order' => '38',

            ],
            [
                'id' => '639', 'questionnaire_id' => '24',
                'text' => 'Ha un “sesto senso” che le consente di conoscere e predire gli eventi?', 'reversed' => '0',
                'order' => '39',

            ],
            [
                'id' => '640', 'questionnaire_id' => '24',
                'text' => 'Ha spesso la sensazione che ogni cosa sia irreale, di essere staccato/a dal suo corpo o dalla sua mente, o di essere un osservatore/trice esterno/a sei suoi pensieri o movimenti?',
                'reversed' => '0', 'order' => '40',

            ],
            [
                'id' => '641', 'questionnaire_id' => '24',
                'text' => 'Vede spesso delle cose che altre persone non vedono?', 'reversed' => '0', 'order' => '41',

            ],
            [
                'id' => '642', 'questionnaire_id' => '24',
                'text' => 'Sente spesso una voce pronunciare piano il suo nome?', 'reversed' => '0', 'order' => '42',

            ],
            [
                'id' => '643', 'questionnaire_id' => '24',
                'text' => 'Ha avuto la sensazione che una qualche persona o forza fosse vicino a lei, anche se non poteva vedere nessuno?',
                'reversed' => '0', 'order' => '43',

            ],
            [
                'id' => '644', 'questionnaire_id' => '24',
                'text' => 'Ci sono pochissime persone con cui lei si sente in intimità all’esterno della cerchia dei suoi familiari più stretti?',
                'reversed' => '0', 'order' => '44',

            ],
            [
                'id' => '645', 'questionnaire_id' => '24',
                'text' => 'Si sente spesso in apprensione quando è circondato da persone che non conosce bene?',
                'reversed' => '0', 'order' => '45',

            ],
            [
                'id' => '647', 'questionnaire_id' => '25', 'text' => 'Domanda 1', 'reversed' => '0', 'order' => '1',

            ],
            [
                'id' => '648', 'questionnaire_id' => '25', 'text' => 'Domanda 2', 'reversed' => '0', 'order' => '2',

            ],
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert($question);
        }
    }
}
