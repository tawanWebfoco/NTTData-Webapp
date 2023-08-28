console.log('> Timer View');

class TimerView {
  // States
  intervalId;
  running = false;
  paused = false;
  currentTime = 0;
  startTime = 0;
  pauseTime = 0;
  pauseStartTime = 0;
  points = 0;
  hasExceededLimit = false;
  incrementTime = 0;

  // constants values
  limitTimePerDay = 7200000; // equivalent a 2 hours, 0 minutes, 0 seconds, 0 milliseconds
  time1hour = 3600000; // equivalent a 1 hours, 0 minutes, 0 seconds, 0 milliseconds
  time30minutes = 1800000; // equivalent a 0 hours, 30 minutes, 0 seconds, 0 milliseconds
  time10minutes = 600000; // equivalent a 0 hours, 10 minutes, 0 seconds, 0 milliseconds
  time1minute = 60000; // equivalent a 0 hours, 10 minutes, 0 seconds, 0 milliseconds

  // Elements
  cronHoursElement = document.querySelector('#cron-hours');
  cronMinutesElement = document.querySelector('#cron-minutes');
  cronSecondsElement = document.querySelector('#cron-seconds');
  cronMilisecondsElement = document.querySelector('#cron-milliseconds');

  startButton = document.querySelector('#cron-play');
  pauseButton = document.querySelector('#cron-pause');
  stopButton = document.querySelector('#cron-stop');
  btnAdd10Minutes = document.querySelector('#btn-add-10-minutes');
  btnAdd30Minutes = document.querySelector('#btn-add-30-minutes');
  btnAdd1Hour = document.querySelector('#btn-add-1-hour');

  // Inject Dependences
  timerStorage = null;
  timerController = null;

  constructor(props) {
    this.timerStorage = props.timerStorage;
    this.timerController = props.timerController;
    return this;
  }

  run() {
    this._loadStorage();
    
    this._configureEventStartTimer();
    this._configureEventStartTimerAfterPaused();
    this._configureEventPauseTimer();

    this._configureEventBtnAddTimeOnTimer(this.btnAdd10Minutes, this.time10minutes);
    this._configureEventBtnAddTimeOnTimer(this.btnAdd30Minutes, this.time30minutes);
    this._configureEventBtnAddTimeOnTimer(this.btnAdd1Hour, this.time1hour);
  }

  _loadStorage() {
    const state = this.timerStorage.getStatesFromLocalStorage();
    // console.log('state',state);

    if (state) {
      this.running = state.running;
      this.paused = state.paused;
      this.pauseStartTime = state.pauseStartTime || 0;
      this.pauseTime = state.pauseTime || 0;
      this.startTime = state.startTime || 0;
      this.currentTime = state.currentTime || 0;
      this.incrementTime = state.incrementTime || 0;

      this._showTimerValues();

      if (this.paused) return;

      if (this.running) {
        this.intervalId = setInterval(this._updateTimer.bind(this), 10);
        return;
      }
    }
  }

  _convertTimestampInObjectTime(timestamp) {
    const hours = Math.floor(timestamp / 3600000);
    const minutes = Math.floor((timestamp % 3600000) / 60000);
    const seconds = Math.floor((timestamp % 60000) / 1000);
    const milliseconds = timestamp % 1000; 

    return {
      hours,
      minutes,
      seconds,
      milliseconds
    }
  }

  debugTimestamp(timestamp) {
    const time = this._convertTimestampInObjectTime(timestamp);
    return `${time.hours.toString().padStart(2, '0')}:${time.minutes.toString().padStart(2, '0')}:${time.seconds.toString().padStart(2, '0')}:${time.milliseconds.toString().padStart(2, '0')}`;
  }

  _updateTimer() {
    // console.log('_updateTimer - new Date:', new Date().getTime());
    // console.log('_updateTimer - this.startTime:', this.startTime);
    // console.log('_updateTimer - this.pauseTime:', this.pauseTime);
    // console.log('_updateTimer - this.currentTime:', this.currentTime);

    this.currentTime = (new Date().getTime() - this.startTime - this.pauseTime) + this.incrementTime;

    this._showTimerValues();
    this._disableButtons();
    
    if (this.currentTime >= this.limitTimePerDay && !this.hasExceededLimit) {
      this._pauseTimer();
      this.hasExceededLimit = true;
      alert('Você excedeu o limite diário de 2 horas, clique em parar para salvar o tempo');
      return;
    } 
  }

  _disableButtons() {
    if (this.currentTime >= this.time1hour) {
      this.btnAdd1Hour.classList.add('btn-disabled');
    }

    if (this.currentTime >= (this.limitTimePerDay - this.time30minutes)) {
      this.btnAdd30Minutes.classList.add('btn-disabled');
    }

    if (this.currentTime >= (this.limitTimePerDay - this.time10minutes)) {
      this.btnAdd10Minutes.classList.add('btn-disabled');
    }
  }

  _enableButtons() {
    this.btnAdd1Hour.classList.remove('btn-disabled');
    this.btnAdd30Minutes.classList.remove('btn-disabled');
    this.btnAdd10Minutes.classList.remove('btn-disabled');
  }

  _addPoints() {
    // const currentTime = this._convertTimestampInObjectTime(this.currentTime);
    // const limitTimePerDay = this._convertTimestampInObjectTime(this.limitTimePerDay);
    // const currentTime = this._convertTimestampInObjectTime(new Date().getTime());
    // const currentTime = Math.floor((this.currentTime % 3600000) / 60000); this.currentTime
    
    const currentTime = Math.floor(this.currentTime / (1000 * 60));

    // const points = this.currentTime > this.limitTimePerDay 
    const points = currentTime > (this.limitTimePerDay - this.time1minute) 
    ? (this.limitTimePerDay - this.time1minute) 
    : currentTime;

    console.log('currentTIME', this.currentTime);
    // console.log('current', currentTime);
    console.log('points', points);

    this.points = points;
  }

  _showTimerValues() {
    const hours = Math.floor(this.currentTime / 3600000);
    const minutes = Math.floor((this.currentTime % 3600000) / 60000);
    const seconds = Math.floor((this.currentTime % 60000) / 1000);
    const milliseconds = this.currentTime % 1000;

    this.cronHoursElement.textContent = hours.toString().padStart(2, '0');
    this.cronMinutesElement.textContent = minutes.toString().padStart(2, '0');
    this.cronSecondsElement.textContent = seconds.toString().padStart(2, '0');
    this.cronMilisecondsElement.textContent = milliseconds.toString().padStart(2, '0');
  }

  _stopTimer() {
    clearInterval(this.intervalId);
    this._addPoints();
  }

  _resetTimer() {
    clearInterval(this.intervalId);

    this.cronHoursElement.textContent = '00';
    this.cronMinutesElement.textContent = '00';
    this.cronSecondsElement.textContent = '00';
    this.cronMilisecondsElement.textContent = '99';
    this.running = false;
    this.paused = false;
    this.pauseStartTime = 0;
    this.pauseTime = 0;
    this.incrementTime = 0;

    this._enableButtons();

    this.timerStorage.removeStatesFromLocalStorage();
  }

  _pauseTimer() {
    clearInterval(this.intervalId);
    this.pauseStartTime = new Date().getTime();
    this.paused = true;
    this.timerStorage.saveStatesOnLocalStorage(this._getStates());
  }

  _getStates() {
    return {
      running: this.running,
      paused: this.paused,
      pauseStartTime: this.pauseStartTime,
      pauseTime: this.pauseTime,
      startTime: this.startTime,
      currentTime: this.currentTime,
      incrementTime: this.incrementTime
    }
  }

  _configureEventStartTimer() {
    this.startButton.addEventListener('click', () => {
      if (!this.running) {
        this.startTime = new Date().getTime() - this.pauseTime;
        this.intervalId = setInterval(this._updateTimer.bind(this), 10); // Atualiza a cada 10 milissegundos
        this.running = true;
        this.paused = false;
        this.timerStorage.saveStatesOnLocalStorage(this._getStates());
      }
    });
  }

  _configureEventStartTimerAfterPaused() {
    this.startButton.addEventListener('click', () => {
      if (this.running && this.paused) {
        this.pauseTime += new Date().getTime() - this.pauseStartTime;
        this.intervalId = setInterval(this._updateTimer.bind(this), 10);
        this.running = true;
        this.paused = false;
        this.timerStorage.saveStatesOnLocalStorage(this._getStates());
      }
    });
  }

  _configureEventPauseTimer() {
    this.pauseButton.addEventListener('click', () => {
      if (this.running && !this.paused) {
        this._pauseTimer();
       
      }
    });
  }

  configureEventStopTimer(onSaveTimer) {
    this.stopButton.addEventListener('click', async () => {
      // if (confirm('Deseja parar e salvar o tempo?')) {
        this._stopTimer();
        await onSaveTimer();
        this._resetTimer();
      // }
    });
  }

  _configureEventBtnAddTimeOnTimer(btn, addTime) {
    btn.addEventListener('click', () => {
      this.incrementTime = this.currentTime + addTime;
      this.currentTime = this.incrementTime;
      this.timerStorage.saveStatesOnLocalStorage(this._getStates());
      this._showTimerValues();
      this._disableButtons();
    });
  }
}