
// console.log('> Timer View');

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
  scoreInsertDataBase = 0

  // constants values
  // limitTimePerDay = 7200000; // equivalent a 2 hours, 0 minutes, 0 seconds, 0 milliseconds
  limitOneDay = 86400000; // equivalent a 1 day
  // limitTimePerDay = 14400000; // equivalent a 4 hours, 0 minutes, 0 seconds, 0 milliseconds
  limitTimePerDay = 86400000; // equivalent a 4 hours, 0 minutes, 0 seconds, 0 milliseconds
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
  saveTimeButton = document.querySelector('#save-time');
  btnAdd10Minutes = document.querySelector('#btn-add-10-minutes');
  btnAdd30Minutes = document.querySelector('#btn-add-30-minutes');
  btnAdd1Hour = document.querySelector('#btn-add-1-hour');

  // Inject Dependences
  timerStorage = null;
  timerController = null;
  language = null
  currentTimeFromDb = 0;

  constructor(props) {
    this.timerStorage = props.timerStorage;
    this.timerController = props.timerController;
    this.currentTimeFromDb = props.currentTimeFromDb
    this.language = props.language
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
      this.currentTimeFromDb = this.currentTimeFromDb || 0;
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
    const limitDay =  parseInt(this.limitTimePerDay / 60000) ;
    const limitInsertDataBase = limitDay - this.currentTimeFromDb;

    // console.log("current / 60000",(this.currentTime / 60000));
    if((this.currentTime / 60000) >= limitInsertDataBase) {
      
      this.hasExceededLimit = true;
      this._pauseTimer();
      switch (this.language.toLowerCase()) {
        case 'pt':
          this.newBoxAlertConfirm(false,'Você excedeu o limite diário de 24 horas, clique em salvar tempo.','','Ok');
          break;
        case 'en':
          this.newBoxAlertConfirm(false,'You have exceeded the daily limit of 24 hours, click on Save time.','','Ok');
          break;
        default:
          this.newBoxAlertConfirm(false,'Has superado el límite diario de 24 horas, haz clic en Confirma tu tiempo.','','Ok');
          break;
      }

      return;
    } 
    this.currentTime = (new Date().getTime() - this.startTime - this.pauseTime) + this.incrementTime;

    this._showTimerValues();
    // this._disableButtons();
    
  
  }


  _enableButtons() {

    const limitDay =  parseInt(this.limitTimePerDay / 60000) ;
    const sumHour = parseInt(this.currentTime) + parseInt(this.time1hour)
    const sum30Min = parseInt(this.currentTime) + parseInt(this.time30minutes)
    const sum10Min = parseInt(this.currentTime) + parseInt(this.time10minutes)
    const limitInsertDataBase = limitDay - this.currentTimeFromDb;

    if (parseInt((sumHour) / 60000)+1 < (limitInsertDataBase)){
      this.btnAdd1Hour.classList.remove('btn-disabled');
    }
    if (parseInt((sum30Min) / 60000)+1 < (limitInsertDataBase)){
      this.btnAdd30Minutes.classList.remove('btn-disabled');
    }
    if (parseInt((sum10Min) / 60000)+1 < (limitInsertDataBase)){
      this.btnAdd10Minutes.classList.remove('btn-disabled');
    }


    // if (btn === this.btnAdd30Minutes && parseInt((sum30Min) / 60000)+1 < (limitInsertDataBase)) {
    //   this.btnAdd30Minutes.classList.remove('btn-disabled');
    //   btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    // }
    
    // if (btn === this.btnAdd10Minutes && parseInt((sum10Min) / 60000)+1 < (limitInsertDataBase)) {
    //   this.btnAdd10Minutes.classList.remove('btn-disabled');
    //   btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    // }

    // this.btnAdd1Hour.classList.remove('btn-disabled');
    // this.btnAdd30Minutes.classList.remove('btn-disabled');
    // this.btnAdd10Minutes.classList.remove('btn-disabled');
  }

  _addPoints() {
    
    const currentTime = Math.floor(this.currentTime / (1000 * 60));

    const points = currentTime > (this.limitTimePerDay - this.time1minute) 
    ? (this.limitTimePerDay - this.time1minute) 
    : currentTime;

    // console.log('currentTIME', this.currentTime);
    // console.log('points', points);

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
    this._resetTimer();
  }
  _saveTimer() {
    clearInterval(this.intervalId);
    this._addPoints();
    this._resetTimer();
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
    this.currentTime = 0;
    this.pauseButton.classList.add('hidden')
    this.startButton.classList.remove('hidden')
    this._enableButtons();
    this._disableButtons();
    this.timerStorage.removeStatesFromLocalStorage();
    this._showTimerValues();
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
      currentTimeFromDb: this.currentTimeFromDb,
        incrementTime: this.incrementTime
    }
  }

  _configureEventStartTimer() {
    this.startButton.addEventListener('click', () => {
      if (!this.running) {
        // console.log(this.limitTimePerDay / 60000);
        // console.log('cuurentTimeDb',this.currentTimeFromDb);
        // console.log('limit',this.limitTimePerDay / 60000);

        if(this.currentTimeFromDb < (this.limitTimePerDay / 60000)){
        this.pauseButton.classList.remove('hidden')
        this.startButton.classList.add('hidden')
        this.startTime = new Date().getTime() - this.pauseTime;
        this.intervalId = setInterval(this._updateTimer.bind(this), 10); // Atualiza a cada 10 milissegundos
        this.running = true;
        this.paused = false;
        this.timerStorage.saveStatesOnLocalStorage(this._getStates());
        }else{
          switch (this.language.toLowerCase()) {
            case 'pt':
              this.newBoxAlertConfirm(false,'Você excedeu o limite diário de 24 horas.','','Ok');
              break;
            case 'en':
              this.newBoxAlertConfirm(false,'You have exceeded the 24 hour daily limit.','','Ok');
              break;
            default:
              this.newBoxAlertConfirm(false,'Ha excedido el límite diario de 24 horas','','Ok');
              break;
          }
        }
      }
    });
  }

  _configureEventStartTimerAfterPaused() {
    this.startButton.addEventListener('click', () => {
      // console.log(this.running);
      // console.log(this.paused);
      if (this.running && this.paused) {
        // console.log('cuurentTimeDb',this.currentTimeFromDb);
        // console.log('limit',this.limitTimePerDay / 60000);
        if(this.currentTimeFromDb < (this.limitTimePerDay / 60000)){
        this.pauseButton.classList.remove('hidden')
        this.startButton.classList.add('hidden')
        this.pauseTime += new Date().getTime() - this.pauseStartTime;
        this.intervalId = setInterval(this._updateTimer.bind(this), 10);
        this.running = true;
        this.paused = false;
        this.timerStorage.saveStatesOnLocalStorage(this._getStates());
        }else{
          switch (this.language.toLowerCase()) {
            case 'pt':
              this.newBoxAlertConfirm(false,'Você excedeu o limite diário de 24 horas.','','Ok');
              break;
            case 'en':
              this.newBoxAlertConfirm(false,'You have exceeded the 24 hour daily limit.','','Ok');
              break;
            default:
              this.newBoxAlertConfirm(false,'Ha excedido el límite diario de 24 horas','','Ok');
              break;
          }
        }
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
    const limitDay =  parseInt(this.limitTimePerDay / 60000) ;
    const sumHour = parseInt(this.currentTime) + parseInt(this.time1hour)
    const sum30Min = parseInt(this.currentTime) + parseInt(this.time30minutes)
    const sum10Min = parseInt(this.currentTime) + parseInt(this.time10minutes)
    const limitInsertDataBase = limitDay - this.currentTimeFromDb;

    if (parseInt((sumHour) / 60000)+3 > (limitInsertDataBase)){
      this.btnAdd1Hour.classList.add('btn-disabled');
    }
    if (parseInt((sum30Min) / 60000)+3 > (limitInsertDataBase)){
      this.btnAdd30Minutes.classList.add('btn-disabled');
    }
    if (parseInt((sum10Min) / 60000)+3 > (limitInsertDataBase)){
      this.btnAdd10Minutes.classList.add('btn-disabled');
    }


    // if (this.currentTime >= (this.limitTimePerDay - this.time1hour)) {
    //   this.btnAdd1Hour.classList.add('btn-disabled');
    // }

    // if (this.currentTime >= (this.limitTimePerDay - this.time30minutes)) {
    //   this.btnAdd30Minutes.classList.add('btn-disabled');
    // }

    // if (this.currentTime >= (this.limitTimePerDay - this.time10minutes)) {
    //   this.btnAdd10Minutes.classList.add('btn-disabled');
    // }
  }
 
  _configureEventBtnAddTimeOnTimer(btn, addTime) {
    function eventBtnAddTimeOnTimer(){
      const self = this
      this.incrementTime = this.currentTime + addTime;
      this.currentTime =  this.incrementTime ;
      // this.currentTime = (this.incrementTime > this.limitOneDay) ? this.currentTime : this.incrementTime ;
      this.currentTime = (this.incrementTime > this.limitTimePerDay) ? this.limitTimePerDay : this.incrementTime ;
      this.timerStorage.saveStatesOnLocalStorage(this._getStates());
      this._showTimerValues();
      this._disableButtons();
    }   

    // this._disableButtons();
    const limitDay =  parseInt(this.limitTimePerDay / 60000) ;
    // const scoreCurrent = parseInt(this.time1hour / 60000);
    // const sumScoreCurrent = parseInt(this.currentTimeFromDb) + parseInt(scoreCurrent)
    const sumHour = parseInt(this.currentTime) + parseInt(this.time1hour)
    const sum30Min = parseInt(this.currentTime) + parseInt(this.time30minutes)
    const sum10Min = parseInt(this.currentTime) + parseInt(this.time10minutes)

    const limitInsertDataBase = limitDay - this.currentTimeFromDb;

    // console.log('LIMITINSERT',limitInsertDataBase );
    // console.log('CURRENT',this.currentTime / 60000);


    // console.log('sumhour',parseInt((sumHour) / 60000)+1);
    if (btn === this.btnAdd1Hour && parseInt((sumHour) / 60000)+1 < (limitInsertDataBase)) {
      this.btnAdd1Hour.classList.remove('btn-disabled');
      btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    }
    
    if (btn === this.btnAdd30Minutes && parseInt((sum30Min) / 60000)+1 < (limitInsertDataBase)) {
      // console.log('sumhour',sum30Min / 60000);
      this.btnAdd30Minutes.classList.remove('btn-disabled');
      btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    }
    
    if (btn === this.btnAdd10Minutes && parseInt((sum10Min) / 60000)+1 < (limitInsertDataBase)) {
      // console.log('sum10Min',sum10Min / 60000);
      this.btnAdd10Minutes.classList.remove('btn-disabled');
      btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    }

    // if (btn === this.btnAdd1Hour && this.currentTime-10 < (this.limitTimePerDay - this.time1hour)) {
    //   this.btnAdd1Hour.classList.remove('btn-disabled');
    //   btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    // }
    
    // if (btn === this.btnAdd30Minutes && this.currentTime-10 < (this.limitTimePerDay - this.time30minutes)) {
    //   this.btnAdd30Minutes.classList.remove('btn-disabled');
    //   btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    // }

    // if (btn === this.btnAdd10Minutes && this.currentTime-10  < (this.limitTimePerDay - this.time10minutes)) {
    //   this.btnAdd10Minutes.classList.remove('btn-disabled');
    //   btn.addEventListener('click', eventBtnAddTimeOnTimer.bind(this))
    // }
    
  }

  configureEventStopTimer() {
    this.stopButton.addEventListener('click', () => {
      // console.log('oi');

      // console.log(this.language.toLowerCase());
      
      let textSaveTime;
      switch (this.language.toLowerCase()) {
        case 'pt':
          textSaveTime = 'Deseja zerar o cronômetro?';
        break;
        case 'en':
          textSaveTime = 'Do you want to reset the timer?';
        break;
        default:
          textSaveTime = '¿Deseas reiniciar el cronómetro?';
        break;
      }

     let textBody = '';
      this.newBoxAlertConfirm(true,textSaveTime,textBody,'Cancelar', ()=>{
        this._stopTimer();
      }) 
      })

  }
  configureEventSaveTimer(onSaveTimer) {
    this.saveTimeButton.addEventListener('click', async () => {
      let currentTimeLimit = this._getLimitToInsertDb().currentTimeLimit;
      let currentRestTime = this._getLimitToInsertDb().currentRestTime;
       
      currentTimeLimit.hours = currentTimeLimit.hours.toString().padStart(2, '0');
      currentTimeLimit.minutes = currentTimeLimit.minutes.toString().padStart(2, '0');
      currentTimeLimit.seconds = currentTimeLimit.seconds.toString().padStart(2, '0');
      
      currentRestTime.hours =   currentRestTime.hours.toString().padStart(2, '0');
      currentRestTime.minutes = currentRestTime.minutes.toString().padStart(2, '0');
      currentRestTime.seconds = currentRestTime.seconds.toString().padStart(2, '0');

      // console.log(this.language.toLowerCase());
      
      let textSaveTime;
      switch (this.language.toLowerCase()) {
        case 'pt':
          textSaveTime = 'Deseja salvar o tempo?';
        break;
        case 'en':
          textSaveTime = 'Do you want to save the time?';
        break;
        default:
          textSaveTime = '¿Deseas confirmar tu tiempo?';
        break;
      }

      let textTime
      let textRestTime
      let hour
      
      switch (this.language.toLowerCase()) {
        case 'pt':
          textTime = 'Tempo contabilizado:';
          textRestTime = 'Tempo restante diário:';
  
          hour = textTime+' ' + currentTimeLimit.hours + 'h' + currentTimeLimit.minutes ;
          hour += '<br>'+ textRestTime+ ' ' + currentRestTime.hours + 'h' + currentRestTime.minutes;
        break;
        case 'en':
          textTime = 'Saved time:';
          textRestTime = 'Remaining daily time:';
  
          hour = textTime+' ' + currentTimeLimit.hours + 'h' + currentTimeLimit.minutes;
          hour += '<br>'+ textRestTime+ ' ' + currentRestTime.hours + 'h' + currentRestTime.minutes;
        break;
        default:
          textTime = 'Tiempo contabilizado:';
          textRestTime = 'Tiempo restante diario:';
  
          hour = textTime+' ' + currentTimeLimit.hours + 'h' + currentTimeLimit.minutes ;
          hour += '<br>'+ textRestTime+ ' ' + currentRestTime.hours + 'h' + currentRestTime.minutes ;
        break;
      }

      // console.log('hour',hour);

     let textBody= '';
      this.newBoxAlertConfirm(true,textSaveTime,hour,'Cancelar', async ()=>{
        this._saveTimer();
        this.currentTimeFromDb = parseInt(this.currentTimeFromDb) + parseInt(this.scoreInsertDataBase)
        this._resetTimer();

        await onSaveTimer();
        
        if(this.scoreInsertDataBase > 0){
        switch (this.language.toLowerCase()) {
          case 'pt':
            this.newBoxAlertConfirm(false,'Tempo salvo com sucesso.','','Ok');
            break;
          case 'en':
            this.newBoxAlertConfirm(false,'Time successfully saved.','','Ok');
            break;
          default:
            this.newBoxAlertConfirm(false,'Tiempo confirmado exitosamente.','','Ok');
            break;
        }
      }else{
        switch (this.language.toLowerCase()) {
          case 'pt':
            this.newBoxAlertConfirm(false,'Erro ao salvar o tempo.','','Ok');
            break;
          case 'en':
            this.newBoxAlertConfirm(false,'Error when saving the time.','','Ok');
            break;
          default:
            this.newBoxAlertConfirm(false,'Error al confirma tu tiempo.','','Ok');
            break;
        }
      }


      }) 
      })

  }

  _getLimitToInsertDb(){
    // const limitDay = this._convertTimestampInObjectTime(this.limitTimePerDay);
    const limitDay =  parseInt(this.limitTimePerDay / 60000) ;
    const scoreCurrent = parseInt(this.currentTime / 60000);
    const sumScoreCurrent = parseInt(this.currentTimeFromDb) + parseInt(scoreCurrent)
    const limitInsertDataBase = limitDay - this.currentTimeFromDb;

    this.scoreInsertDataBase = (scoreCurrent > limitInsertDataBase) ? limitInsertDataBase : scoreCurrent;



    // console.log('this.currentTime ',this.currentTime );
    // console.log('currentTime ',scoreCurrent );
    // console.log('sumScoreCurrent ',sumScoreCurrent );
    // console.log('limitDay ',limitDay );
    // console.log('limitTimePerDay ',this.limitTimePerDay );
    // console.log('this.time1minute ',this.time1minute );
    // console.log('this.currentTimeFromDb ',this.currentTimeFromDb );
    // console.log('this.limitInsertDataBase ',limitInsertDataBase );
    // console.log('scoreInsertDataBase ',this.scoreInsertDataBase );

    const currentTimeLimit = this._convertTimestampInObjectTime(this.scoreInsertDataBase * 60000);
    const currentRestTime = this._convertTimestampInObjectTime(limitInsertDataBase * 60000);
    
  
    return   {
      currentTimeLimit,
      currentRestTime
    }
  }
  newBoxAlertConfirm(confirm,textoHead,textoBody = '',textBtnClose, callback = ()=>{},){
    const bgBoxConfirm = document.createElement("div");
    bgBoxConfirm.id = 'bgBoxConfirm';

    const boxConfirm = document.createElement("div");
    boxConfirm.id = 'newConfirm';
  
    const head = document.createElement("div");
      head.className = 'headConfirm';
      head.innerHTML = textoHead;
      
    const body = document.createElement("div");
    body.className = 'bodyConfirm';
    
    body.innerHTML = textoBody;
    
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
          
          btnConfirmar.onclick = (e)=> {
            callback()
            bgBoxConfirm.parentElement.removeChild(bgBoxConfirm)
          };
      }
      const btnCancelar = document.createElement("button");
        btnCancelar.textContent = textBtnClose;
        btnCancelar.className = 'button light-blue';
        btnCancelar.onclick = function() {
          bgBoxConfirm.parentElement.removeChild(bgBoxConfirm)
        };
      
      footer.insertAdjacentElement("beforeend",btnCancelar);

  
      bgBoxConfirm.insertAdjacentElement("beforeend",boxConfirm);
    
    document.querySelector('html').append(bgBoxConfirm);
  }

 


}
