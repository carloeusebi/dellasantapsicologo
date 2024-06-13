<?php

namespace App\Models;

use App\Mail\LinkToTestMail;
use App\Mail\SurveyCompletedNotificationMail;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * @property bool $completed
 */
class Survey extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'completed',
        'token',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Survey $survey): void {
            $survey->token = md5(rand(0, 1000000));
        });
    }

    /**
     * @throws Exception if the email is not sent
     */
    public function sendEmailWithLink(
        ?string $subject = 'Questionario per la valutazione',
        ?string $email = null,
        ?string $body = null,
        bool $shouldQueue = false
    ): bool {

        $mail = Mail::to($email ?? $this->patient->email);

        $mailable = new LinkToTestMail(
            $subject,
            $body ?? config('mail.default_link_to_test_message'),
            $this->getLink()
        );

        if ($shouldQueue) {
            $mail->queue($mailable);
        } else {
            $mail->send($mailable);
        }

        return true;
    }

    public function getLink(): string
    {
        return route('evaluation.home', $this->token);
    }

    public function updateCompletedStatus(): void
    {
        $this->loadCount('completedQuestionnaireSurvey');

        $this->completed = $this->questionnaireSurveys->count() === $this->completed_questionnaire_survey_count;

        if ($this->completed) {
            $this->sendCompletedEmail();
        }

        $this->update(['completed' => $this->completed]);
    }

    public function sendCompletedEmail(): void
    {
        $this->patient->load('user:id,name,email');

        Mail::to($this->patient->user->email)
            ->queue(new SurveyCompletedNotificationMail(
                $this->patient->full_name,
                $this->title,
                now(),
                $this->id
            ));

    }

    public function scopeUserScope(Builder $query): void
    {
        if (Auth::user()->isNotAdmin()) {
            $query->whereRelation('patient.user', 'id', Auth::id());
        }
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class)
            ->withArchived();
    }

    public function questionnaires(): BelongsToMany
    {
        return $this->belongsToMany(Questionnaire::class)
            ->using(QuestionnaireSurvey::class);
    }

    public function questionnaireSurveys(): HasMany
    {
        return $this->hasMany(QuestionnaireSurvey::class);
    }

    public function completedQuestionnaireSurvey(): HasMany
    {
        return $this->hasMany(QuestionnaireSurvey::class)
            ->whereCompleted(true);
    }

    public function lastAnswer(): HasOneThrough
    {
        return $this->hasOneThrough(
            Answer::class,
            QuestionnaireSurvey::class,
            'survey_id',
            'questionnaire_survey_id',
            'id',
            'id'
        )->latest();
    }

    public function answers(): HasManyThrough
    {
        return $this->hasManyThrough(
            Answer::class,
            QuestionnaireSurvey::class,
            'survey_id',
            'questionnaire_survey_id',
            'id',
            'id'
        );
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(
            Answer::class,
            QuestionnaireSurvey::class,
            'survey_id',
            'questionnaire_survey_id',
            'id',
            'id',
        )->whereNotNull('comment');
    }

    public function skippedQuestions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Answer::class,
            QuestionnaireSurvey::class,
            'survey_id',
            'questionnaire_survey_id',
            'id',
            'id',
        )->whereSkipped(true);
    }
}
