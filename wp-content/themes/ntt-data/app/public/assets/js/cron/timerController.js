console.log('> Timer Controller');

class TimerController {
  // Dependences
  timerView = null;
  userStorage = null;

  constructor(props) {
    this.timerView = props.timerView;
    this.userStorage = props.userStorage;
    this.timerView.configureEventSaveTimer(this.onSaveTimer.bind(this));
    this.timerView.configureEventStopTimer();
    return this;
  }

  async onSaveTimer() {
    // const user = this.userStorage.getStorage();
    const user = JSON.parse(localStorage.getItem(COLLECTION_USERS));
    // console.log('onSaveTimer:', localStorage.getItem(COLLECTION_USERS))
    // console.log('timer_states:', this.timerView);
    // console.log('score',this.timerView.points);

    const formData = new FormData();
    formData.append('id_user', user.id_user);
    formData.append('time_stop', this.timerView.startTime + this.timerView.currentTime);
    formData.append('time_start', this.timerView.startTime);
    formData.append('time_score', this.timerView.points);
    formData.append('country', user.country);

    
    // WpBaseUrlAPI "imported" from global.js
    // fetch(``, {
      const homeUrl = document.homePath
    fetch(`${WPBaseUrlAPI}/timer/register`, {
      method: 'POST',
      body: formData
    })
      .then(response => response.json())
      .then(data => console.log('Server repsonse:', data))
      .catch(error => console.error('Error on request:', error));
  }
}