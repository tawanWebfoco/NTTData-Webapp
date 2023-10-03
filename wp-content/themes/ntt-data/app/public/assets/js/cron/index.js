console.log('Cron.JS');


const timerStorage = new TimerStorage;
// var newConfirm = new NewConfirm;

const currentTimeFromDb = parseInt(document.currentTimeFromDb);

const arraUser = document.userWebApp.split(',');


const timerView = new TimerView({
  timerStorage,
  timerController: null,
  currentTimeFromDb,
  language: arraUser[3]
});

timerView.run();

const userStorage = new UserStorage;
// console.log(userStorage.getStorage());

// const user = {
//   id_user: arraUser[0],
//   full_name: arraUser[1],
//   email: arraUser[2],
//   language: arraUser[3],
// }

// userStorage.setStorage(user);

const timerController = new TimerController({
  timerView,
  userStorage
});

timerView.timerController = timerController;

// const msg = localStorage.getItem('@webapp-msg')
// if(!msg){
//   localStorage.setItem('@webapp-msg', JSON.stringify(true));

// switch (timerView.language.toLowerCase()) {
//   case 'pt':
//     timerView.newBoxAlertConfirm(false,'ATENÇÃO','No dia 30/09 tive uma instabilidade para enviar novas publicações','Ok');
//     break;
//   case 'en':
//     timerView.newBoxAlertConfirm(false,'Time successfully saved.','','Ok');
//     break;
//   default:
//     timerView.newBoxAlertConfirm(false,'Tiempo confirmado exitosamente.','','Ok');
//     break;
// }
// }