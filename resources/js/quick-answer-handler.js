class QuickAnswerHandler {

  /**
   * @type {HTMLDivElement[]}
   * @private
   */
  questions = [];

  /**
   * @type {{
   *    question_id: string,
   *    questionnaire_survey_id: string,
   *    choice_id?: string,
   *    points?: string,
   * }[]}
   */
  updates = [];

  currentQuestion = 0;

  /**
   * @type {HTMLSpanElement}
   */
  htmlNumberOfUpdatesDisplay = null;

  /**
   * @type {HTMLSpanElement}
   */
  updatesStore = null;

  tap = new Audio(new URL('./assets/tap.mp3', import.meta.url).href);

  constructor() {
    this.questions = Array.from(document.querySelectorAll('[data-question]'));

    this.htmlNumberOfUpdatesDisplay = document.getElementById('updates-counter');

    this.updatesStore = document.getElementById('updates-store');

    document.querySelectorAll('[data-questionnaire]').forEach(q => {
      q.querySelector('input').checked = true;
    });

    this._setCurrentQuestion(0);

    this.questions.forEach(question => {
      question.addEventListener('click', () => {
        const index = this.questions.indexOf(question);
        this._setCurrentQuestion(index);
      });

      question.addEventListener('keydown', e => {
        const el = e.target;
        const choicesEl = Array.from(question.querySelectorAll('[data-choice]'));
        const choices = choicesEl.map(c => ({choice_id: c.dataset.id, points: c.dataset.points}));

        this._handleMovement(e);

        if (!e.key || !choices.map(({points}) => points).includes(e.key)) {
          return;
        }

        choicesEl.forEach(el => el.classList.remove('btn-primary'));
        const newChoice = choicesEl.find(el => el.dataset.points === e.key);
        newChoice.classList.add('btn-primary');

        this._addChoice(el.dataset.question, el.dataset.questionnaireSurvey, newChoice.dataset.id, newChoice.dataset.points);
      });
    });
  }

  /**
   *
   * @param {string} question_id
   * @param {string} questionnaire_survey_id
   * @param {string/null} choice_id
   * @param {string|null} points
   * @private
   */
  _addChoice(question_id, questionnaire_survey_id, choice_id, points) {
    this.updates = this.updates.filter(u => u.question_id !== question_id);
    this.updates.push({question_id, questionnaire_survey_id, choice_id, points});
    try {
      this.tap.play();
    } catch {
      console.error('Could not play sound');
    }
    this.htmlNumberOfUpdatesDisplay.innerText = this.updates.length.toString();
    this.updatesStore.setAttribute('data-store', JSON.stringify(this.updates));
    this._focusNextQuestion();
  }

  /**
   * @private
   */
  _focusNextQuestion() {
    if (this.currentQuestion + 1 === this.questions.length) {
      return;
    }
    this._setCurrentQuestion(this.currentQuestion + 1);
  }

  /**
   * @private
   */
  _focusPreviousQuestion() {
    if (this.currentQuestion === 0) {
      return;
    }
    this._setCurrentQuestion(this.currentQuestion - 1);
  }

  /**
   * @param {number} index
   * @private
   */
  _setCurrentQuestion(index) {
    this.currentQuestion = index;
    this.questions[index].focus();
  }

  /**
   * @private
   * @param {KeyboardEvent} event
   */
  _handleMovement(event) {
    if (event.key === 'ArrowUp' || (event.shiftKey && event.key === 'Tab')) {
      event.preventDefault();
      this._focusPreviousQuestion();
    } else if (event.key === 'ArrowDown' || event.key === 'Tab') {
      event.preventDefault();
      this._focusNextQuestion();
    }
  }
}

window.QuickAnswerHandler = QuickAnswerHandler;
