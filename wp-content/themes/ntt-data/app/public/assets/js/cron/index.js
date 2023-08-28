console.log('Cron.JS');


const timerStorage = new TimerStorage;

const timerView = new TimerView({
  timerStorage,
  timerController: null
});

timerView.run();

const userStorage = new UserStorage;
// console.log(userStorage.getStorage());


const arraUser = document.userWebApp.split(',');

const user = {
  id_user: arraUser[0],
  full_name: arraUser[1],
  email: arraUser[2],
  country: arraUser[3],
}

userStorage.setStorage(user);

const timerController = new TimerController({
  timerView,
  userStorage
});

timerView.timerController = timerController;