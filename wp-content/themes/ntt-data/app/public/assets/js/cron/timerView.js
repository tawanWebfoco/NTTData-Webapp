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
  cronMilisecondsElement = document.querySelector('#cron-centseconds');

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
        this.pauseButton.classList.remove('hidden')
        this.startButton.classList.add('hidden')
        this.intervalId = setInterval(this._updateTimer.bind(this), 10);
        return;
      }
    }
  }

  _convertTimestampInObjectTime(timestamp) {
    const hours = Math.floor(timestamp / 3600000);
    const minutes = Math.floor((timestamp % 3600000) / 60000);
    const seconds = Math.floor((timestamp % 60000) / 1000);
    const milliseconds = timestamp % 100; 

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
    if(this.currentTime >= this.limitTimePerDay) this.hasExceededLimit = true;
    if (this.hasExceededLimit) {
      this._pauseTimer();
      this.hasExceededLimit = true;
      this.newBoxAlertConfirm(false,'Você excedeu o limite diário de 2 horas, clique em parar para salvar o tempo');
      return;
    } 
    this.currentTime = (new Date().getTime() - this.startTime - this.pauseTime) + this.incrementTime;

    this._showTimerValues();
    this._disableButtons();
    
  
  }


  _enableButtons() {
    this.btnAdd1Hour.classList.remove('btn-disabled');
    this.btnAdd30Minutes.classList.remove('btn-disabled');
    this.btnAdd10Minutes.classList.remove('btn-disabled');
  }

  _addPoints() {
    
    const currentTime = Math.floor(this.currentTime / (1000 * 60));

    const points = currentTime > (this.limitTimePerDay - this.time1minute) 
    ? (this.limitTimePerDay - this.time1minute) 
    : currentTime;

    console.log('currentTIME', this.currentTime);
    console.log('points', points);

    this.points = points;
  }
  _hiddenTimerZero(){
    this.cronHoursElement.classList.remove('hidden')
    this.cronMinutesElement.classList.remove('hidden')
    document.querySelector('.separate.hour').classList.remove('hidden')
    document.querySelector('.separate.min').classList.remove('hidden')
    document.querySelector('.separate.sec').classList.add('hidden')
    document.querySelector('.numberCenter .numbers').classList.remove('line')
    
    if(this.cronHoursElement.textContent == '00'){
      this.cronHoursElement.classList.add('hidden')
      document.querySelector('.separate.hour').classList.add('hidden')
      document.querySelector('.separate.sec').classList.remove('hidden')
      document.querySelector('.numberCenter .numbers').classList.add('line')

    }
    if(this.cronMinutesElement.textContent == '00' && this.cronHoursElement.textContent == '00'){
      this.cronMinutesElement.classList.add('hidden')
      document.querySelector('.separate.min').classList.add('hidden')
    }
  }
  _showTimerValues() {
    const hours = Math.floor(this.currentTime / 3600000);
    const minutes = Math.floor((this.currentTime % 3600000) / 60000);
    const seconds = Math.floor((this.currentTime % 60000) / 1000);
    const milliseconds = Math.floor((this.currentTime % 1000) / 10)
    
    
    this.cronHoursElement.textContent = hours.toString().padStart(2, '0');
    this.cronMinutesElement.textContent = minutes.toString().padStart(2, '0');
    this.cronSecondsElement.textContent = seconds.toString().padStart(2, '0');
    this.cronMilisecondsElement.textContent = milliseconds.toString().padStart(2, '0');
    this._hiddenTimerZero()
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
    this.cronMilisecondsElement.textContent = '00';
    this.running = false;
    this.paused = false;
    this.pauseStartTime = 0;
    this.pauseTime = 0;
    this.incrementTime = 0;
    this.pauseButton.classList.add('hidden')
    this.startButton.classList.remove('hidden')

    this._enableButtons();

    this.timerStorage.removeStatesFromLocalStorage();
  }

  _pauseTimer() {
    clearInterval(this.intervalId);
    this.pauseButton.classList.add('hidden')
    this.startButton.classList.remove('hidden')
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
        this.pauseButton.classList.remove('hidden')
        this.startButton.classList.add('hidden')
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
        this.pauseButton.classList.remove('hidden')
        this.startButton.classList.add('hidden')
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
 
  _configureEventBtnAddTimeOnTimer(btn, addTime) {
    function eventBtnAddTimeOnTimer(){
      const self = this
      this.incrementTime = this.currentTime + addTime;
      this.currentTime = (this.incrementTime > this.limitTimePerDay) ? this.limitTimePerDay : this.incrementTime ;
      this.timerStorage.saveStatesOnLocalStorage(this._getStates());
      this._showTimerValues();
      this._disableButtons();
    }   

    if (btn === this.btnAdd1Hour && this.currentTime-10 < this.time1hour) {
      this.btnAdd1Hour.classList.remove('btn-disabled');
      btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    }
    
    if (btn === this.btnAdd30Minutes && this.currentTime-10 < (this.limitTimePerDay - this.time30minutes)) {
      this.btnAdd30Minutes.classList.remove('btn-disabled');
      btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    }

    if (btn === this.btnAdd10Minutes && this.currentTime-10  < (this.limitTimePerDay - this.time10minutes)) {
      this.btnAdd10Minutes.classList.remove('btn-disabled');
      btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
      this._disableButtons();
    }
    
  }

  configureEventStopTimer(onSaveTimer) {
    this.stopButton.addEventListener('click', () => {

      this.newBoxAlertConfirm(true,'Deseja parar e salvar o tempo?',onSaveTimer, async ()=>{
        this._stopTimer();
        await onSaveTimer();
        this._resetTimer();
      }) 
      })

  }
  newBoxAlertConfirm(confirm,texto,callback = ()=>{}){
    const boxConfirm = document.createElement("div");
    boxConfirm.id = 'newConfirm';
  
    const head = document.createElement("div");
      head.className = 'headConfirm';
      head.innerHTML = texto;
      
    const body = document.createElement("div");
    body.className = 'bodyConfirm';
    let currentDate = this._convertTimestampInObjectTime(this.currentTime)
    currentDate.hours = currentDate.hours.toString().padStart(2, '0');
    currentDate.minutes = currentDate.minutes.toString().padStart(2, '0');
    currentDate.seconds = currentDate.seconds.toString().padStart(2, '0');

      body.innerHTML = 'Tempo: ' + currentDate.hours + ':' + currentDate.minutes + ':' + currentDate.seconds
      

    const footer = document.createElement("div");
    footer.className = 'footerConfirm';
      footer.innerHTML = '';

      boxConfirm.insertAdjacentElement("beforeend",head);
      boxConfirm.insertAdjacentElement("beforeend",body);
      boxConfirm.insertAdjacentElement("beforeend",footer);
      
      if(confirm){
        const btnConfirmar = document.createElement("button");
          btnConfirmar.textContent = 'Confirmar';
          btnConfirmar.className = 'button dark-blue';
          footer.insertAdjacentElement("beforeend",btnConfirmar);
          
          btnConfirmar.onclick = async (e)=> {
            callback()
            boxConfirm.parentElement.removeChild(boxConfirm)
          };
      }
      const btnCancelar = document.createElement("button");
        btnCancelar.textContent = 'Cancelar';
        btnCancelar.className = 'button light-blue';
        btnCancelar.onclick = function() {
          boxConfirm.parentElement.removeChild(boxConfirm)
        };
      
      footer.insertAdjacentElement("beforeend",btnCancelar);

  

    
    document.querySelector('html').append(boxConfirm);
  }

 


}